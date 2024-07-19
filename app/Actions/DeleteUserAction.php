<?php

namespace App\Actions;

use App\Jobs\SendFarewellEmailJob;
use App\Models\User;

class DeleteUserAction
{
    public static function execute(User $user): void
    {
        SendFarewellEmailJob::dispatch($user);

        $user->delete();
    }
}
