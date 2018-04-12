<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class PushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $book_id;
    protected $vip_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($book_id,$vip_id)
    {
        $this->book_id = $book_id;
        $this->vip_id = $vip_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webapp-77e52-firebase-adminsdk-9jhj1-0fdbddb1c7.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();
        $url = 'Notification/TaiXe/Book/New/'.$this->vip_id;
        $reference = $db->getReference($url);
        $date = date('Y-d-m H:i:s');
        $postRef = $reference->push([
            'message'=>'Có lịch đặt xe mới',
            'time'=>$date
        ]);
    }
}
