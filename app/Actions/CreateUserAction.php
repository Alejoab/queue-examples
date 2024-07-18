<?php

namespace App\Actions;

use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;

class CreateUserAction
{
    public static function execute(array $data): void
    {
        $user = User::query()->create($data);

        SendWelcomeEmailJob::dispatchSync($user);
    }
}
