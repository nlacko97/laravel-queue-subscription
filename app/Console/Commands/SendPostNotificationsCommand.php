<?php

namespace App\Console\Commands;

use App\Mail\PostCreatedMail;
use App\Models\Post;
use App\Models\SentNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostNotificationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notify {post?} {--latest}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to all users subscribed to the website with the new post details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('latest')) {
            $post = Post::latest()->first();
        } elseif ($this->argument('post'))  {
            $post = Post::find($this->argument('post'));
        } else {
            $this->error('Specify either post id or --latest option to run for the latest post');
            return 1;
        }
        $website = $post->website;
        $subscribers = $website->users;
        foreach ($subscribers as $subscriber) {
            if (SentNotification::where(['user_id' => $subscriber->id, 'post_id' => $post->id])->get()->isEmpty()) {
                Mail::to($subscriber)->send(new PostCreatedMail($post, $subscriber));
                SentNotification::create([
                    'user_id' => $subscriber->id,
                    'post_id' => $post->id
                ]);
            }
        }
        return 0;
    }
}
