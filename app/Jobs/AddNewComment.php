<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddNewComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    protected $body;
    protected $subject;
    protected $article_id;

    public function __construct($subject, $body, $article_id)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->article_id = $article_id;
    }

    public function handle()
    {
        Comment::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'article_id' => $this->article_id,
        ]);
    }

}
