<?php 
class Settings {
    private $xml;
    private $xpath;
    static $instance;
    /**
     * The constructor loads the XML file which path is defined as
     * the constant CONFILE, which has to be defined at the index
     * file of the application.
     *
     * e.g.: define('CONFILE', 'myapp.settings.xml');
     *
     * @return
     */
    private function __construct() {
        $this->xml = new DOMDocument();
        $this->xml->load(CONFILE);
        $this->xpath = new DOMXPath($this->xml);
        $this->xpath->registerNamespace('blrg', 'http://fabricademagia.com.ar/balrog');
    }
    /**
     * Singleton method that returns a unique instance of the class.
     *
     * @return
     */
    private static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Gets a specific value from the settings XML file.
     *
     * @param object $query
     * @return
     */
    public static function get($query) {
        $settings = self::getInstance();
        $result = $settings->xpath->query('/blrg:settings/'.$query);
        return $result->item(0)->nodeValue;
    }
}
