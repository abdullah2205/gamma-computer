<?php
 
 namespace App\Mail; //import
 use Illuminate\Support\Facades\Auth; // import dulu gaes
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class CheckoutNotification extends Mailable
{
    use Queueable, SerializesModels;
 
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('ma22052000@gmail.com')
                   ->view('emailku')
                   ->with(
                    [
                        'admin' => 'Admin',
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ]);
    }
}