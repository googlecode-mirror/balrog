<?php
require_once 'php/facebook.php';
require_once 'lib/SocialController.class.php';
abstract class FacebookController extends SocialController
{
    private $facebook;    
    public function __construct()
    {
        $this->facebook = new Facebook(Settings::get('blrg:facebook/blrg:apikey'), Settings::get('blrg:facebook/blrg:secret'));
        $this->facebook->require_frame();
        $this->uid = $this->facebook->require_login();
    }
    public function getFriendsAppUsers()
    {
        return $this->facebook->api_client->friends_getAppUsers();
    }
    public function isFriend($uid1, $uid2 = NULL)
    {
    	if(empty($uid2)){
    		$uid2 = $this->uid;
    	}
        return $this->facebook->api_client->friends_areFriends($uid1, $uid2);
    }
	public function notify($to, $message, $mode = 'user_to_user'){
		$this->facebook->api_client->notifications_send($to, $message, $mode);
	}
}
