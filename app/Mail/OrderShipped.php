<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $user;
    protected $tel;
    protected $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $tel, $email, $user, $product = false)
    {
        $this->name    = $name;
        $this->email   = $email;
        $this->user    = $user;
        $this->tel     = $tel;
        $this->product = $product;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

            $data = [
                'name'     => $this->name,
                'email'    => $this->email,
                'user'     => $this->user,
                'tel'      => $this->tel,
                'products' => $this->product
            ];

            return $this->from('credonull@gmail.com', 'story jeans')->view(env('THEME') . '.mail.order')->with($data)->subject('StoryJeans');

    }

}
