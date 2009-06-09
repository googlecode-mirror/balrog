<?php
require_once '../lib/Controller.class.php';
abstract class SocialController extends Controller
{
    protected $uid;
    abstract function isFriend();
    abstract function getFriendsAppUsers();
    abstract function notify();
}
