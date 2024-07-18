<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un usario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get(route('users.create'));

        if ($response->successful()) {
            $this->info('Usuario creado exitosamente');
        } else {
            $this->error('Hubo un error al enviar el email');
        }
    }
}
