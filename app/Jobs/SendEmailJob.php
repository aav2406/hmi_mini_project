<?php
 

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendUpdateEmail;

use Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 5;
    public $subject,$email,$name,$teacheremail;
    public function __construct($teacheremail,$email,$subject,$name)
    {
        $this->teacheremail = $teacheremail;
        $this->subject = $subject;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)
        ->cc($this->teacheremail)
        ->send(new SendUpdateEmail($this->email,$this->subject,$this->name));  
    
    }
}
