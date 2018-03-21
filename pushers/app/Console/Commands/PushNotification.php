<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class PushNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = ' bba:notify {message?} {--u : 指定用户将收到消息} {email?} {--broadcast : 通知全部用户}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '推送消息给指定用户或者全部用户';

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
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $message = $this->argument('message');
        $specifyUser = $this->option('u');
        $allUser = $this->option('broadcast');
        if ($email && $specifyUser) {
            $this->comment("pushing $message to $email ...");
            $user = User::where('email', $email)->first();
            if (!$user) {
                $this->error("$email not found");
                return;
            }
            event(new \App\Events\PushPersonalNotice($user, $message));
        }

        if ($allUser && $message) {
            $this->comment("pushing $message to all user ...");
            event(new \App\Events\PushNoticeToAllUsers($message));
            // $users = User::all();
            // foreach ($users as $user) {
            //     event(new \App\Events\PushNoticeToAllUsers($user, $message));
            // }
        }
    }
}
