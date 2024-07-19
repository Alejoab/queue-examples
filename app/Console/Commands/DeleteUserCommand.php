<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DeleteUserCommand extends Command
{
    protected $signature = 'app:delete-user {id}';

    protected $description = 'Eliminar un usuario';

    public function handle()
    {
        $userId = $this->argument('id');

        $response = Http::get(route('users.delete', $userId));

        if ($response->successful()) {
            $this->info('Usuario eliminado exitosamente');
        } else {
            $this->error('Hubo un error al enviar el email');
        }
    }
}
