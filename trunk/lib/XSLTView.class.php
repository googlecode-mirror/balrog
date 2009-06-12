<?php
require_once 'Settings.class.php';
require_once '../lib/View.class.php';
class XSLTView extends View
{
	private $view;
	private $stylesheet;
	public function __construct($filename, $stylesheet)
	{
		parent::__construct($filename);
		$this->setView($this->filename);
		$this->setStylesheet($stylesheet);
	}
	private function setStylesheet($path)
	{
		$this->stylesheet = new DOMDocument();
		$this->stylesheet->load($path);
	}
	private function setView($path)
	{
		$this->view = new DOMDocument();
		$this->view->load($path);
	}
	public function process()
	{
		$xpath = new DOMXPath($this->view);
		foreach ($this->data as $key=>$item)
		{			
			$nodes = $xpath->query("//*[@uvcms:databind='$key']");
			for ($i = 0; $i < $nodes->length; $i++)
			{
				$node = new DOMElement($nodes->item($i)->nodeName, NULL, 'http://www.uvcms.com/views');
				$nodes->item($i)->parentNode->appendChild($node);
				$nodes->item($i)->parentNode->removeChild($nodes->item($i));
				$this->processItem($node, $item);
			}
		}
		$proc = new XSLTProcessor();
		$proc->importStylesheet($this->stylesheet);
		$this->output = $proc->transformToXML($this->view);
	}
	public function processItem($node, $item)
	{
		if (is_object($item))
		{
			$this->processObject($node, $item);
		} elseif (is_array($item))
		{
			$this->processSet($node, $item);
		} else
		{
			$this->processValue($node, $item);
		}
	}
	public function processSet($node, $set)
	{
		$parent = $node->parentNode;
		$nodename = $node->nodeName;
		$parent->removeChild($node);
		foreach ($set as $item)
		{
			$node = new DOMElement($nodename, NULL, 'http://www.uvcms.com/views');
			$parent->appendChild($node);
			$this->processItem($node, $item);
		}
	}
	public function processObject($node, $item)
	{
		foreach (get_object_vars($item) as $key=>$value)
		{
			$element = new DOMElement('uvcms:'.$key, NULL, 'http://www.uvcms.com/views');
			$node->appendChild($element);
			$this->processItem($element, $value);
		}
	}
	public function processValue($node, $item)
	{
		$text = new DOMText($item);
		$node->appendChild($text);
	}
}