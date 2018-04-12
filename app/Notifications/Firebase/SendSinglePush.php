<?php

namespace App\Notifications\Firebase;
use App\Notifications\Firebase\FirebaseNotification;
use App\Notifications\Firebase\Push;
use App\Notifications\Firebase\Devicetoken;
use App\TaiXe;

class SendSinglePush
{   
    //creating a new push
    private $title;
    //notification message 
    private $message;
    //notification image url 
    private $image;
    private $code;
    private $key;
    
    //initializing values in this constructor
    function __construct($key, $code, $title, $message, $image=null) {
         $this->title = $title;
         $this->message = $message; 
         $this->image = $image; 
         $this->code = $code; 
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
        $devicetoken = $devicetoken->getTokenByCode($this->code);
        if ($devicetoken) {
            //creating firebase class object 
            $firebase = new FirebaseNotification(); 
            //sending push notification and displaying result 
            return $firebase->send($this->key, $devicetoken, $mPushNotification);
        }
       return false;
    }
}
