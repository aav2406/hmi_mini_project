<?php
namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class TestThreeStatus extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $student;
    public $subj;
    public $reason;
    public $status;
    public function __construct($reason,User $student,$status,$subject)
    {
        $this->reason = $reason;
        $this->student = $student;
        $this->status = $status;
        $this->subj = $subject;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test Three Application '.$this->status)->view('mails.testThree');
    }
}