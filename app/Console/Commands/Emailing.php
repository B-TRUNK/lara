<?php

namespace App\Console\Commands;

use App\Mail\MailNotify;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Emailing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emailing Users with approaching subscription expiry';

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
        //$users = User::select('email') -> get();
        $emails = User::pluck('email') -> toArray();
        $data = ['title' => 'new mail' ,'body' => 'our new body'];

        foreach ($emails as $email) {
            //how to send emails in Laravel
            Mail::To($email) -> send(new MailNotify($data));
        }
    }
}
