<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Services\NotificationService;
 
class SendOrderNotifToDrivers extends NotificationService implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    
     public $data;
     public $order_id;

    public function __construct($data , $order_id)
    {
        $this->data = $data;
        $this->order_id = $order_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->notifyCreateOrder(
            ['fcm', 'db'],
            ['order_id' => $this->order_id, 'users' => $this->data]
        );
    }
}
