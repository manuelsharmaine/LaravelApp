<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
class SharePostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $post;
    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $name = User::find(Auth::id())->get();
        // $email = User::find(Auth::id())->get();
        return $this->from('manuel.sharmaine@gordoncollege.edu.ph', 'Laravel Admin')->subject('New Blog Post')->view('email.share-post');
    }
}
