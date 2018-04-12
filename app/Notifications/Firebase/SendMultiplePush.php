<?php

namespace App\Notifications\Firebase;
use App\Notifications\Firebase\FirebaseNotification;
use App\Notifications\Firebase\Push;

class SendMultiplePush
{
    //creating a new push
    private $title;
    //notification message 
    private $message;
    //notification image url 
    private $image;
    private $key;
    //initializing values in this constructor
    function __construct($key, $title, $message, $image=null) {
         $this->title = $title;
         $this->message = $message; 
         $this->image = $image; 
         $this->key = $key; 
    }
    public function send()
    {
        $push = new Push(
            $this->title,
            $this->message,
            $this->image
        );
        $mPushNotification = $push->getPush(); 
        //getting the token from database object 
        $devicetoken = new Devicetoken();
        $devicetoken = $devicetoken->getAllTokens();
        if ($devicetoken) {
            //creating firebase class object 
            $firebase = new FirebaseNotification(); 
            //sending push notification and displaying result 
            return $firebase->send($this->key, $devicetoken, $mPushNotification);
        }
       return false;
    }
}
