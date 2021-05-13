<?php
namespace App\Mail;
use App\Division;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class Email extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subj;
    public $division;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,Division $division)
    {
        $this->subj = $subject;
        $this->division = $division;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Marks Updated For '.$this->subj)->view('mails.demo');
        
    }
}