<?php
require_once 'lib/Controller.class.php';
abstract class SocialController extends Controller
{
    protected $uid;
    abstract function isFriend($friend, $user = NULL);
    abstract function getFriendsAppUsers();
    abstract function notify($to, $msg, $mode = NULL);
}