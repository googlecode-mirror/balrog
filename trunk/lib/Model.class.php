<?php
abstract class Model
{
    protected $conn;
    abstract function _connect();
    abstract function _query();
}