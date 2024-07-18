<?php

namespace App\Jobs;

use App\Mail\CreatedUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Queueable;
    use SerializesModels;


    public function __construct(private readonly User $user)
    {
    }


    public function handle(): void
    {
        Mail::send(new CreatedUser($this->user));
    }
}
