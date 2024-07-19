<?php

namespace App\Jobs;

use App\Mail\DeletedUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFarewellEmailJob implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(private readonly User $user)
    {
    }

    public function handle(): void
    {
        Mail::send(new DeletedUser($this->user));
    }
}
