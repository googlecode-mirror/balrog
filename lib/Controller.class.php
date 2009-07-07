<?php
abstract class Controller
{
	protected function requestParam($name)
	{
		return isset ($_REQUEST[$name])?$_REQUEST[$name]:NULL;
	}
}