<?php

namespace App\Console\Commands\Test;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSupervisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateSupervisor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $data = [
                'first_name' => 'John Doe',
                'last_name' => 'Doe',
                'father_name' => 'John Doe',
                'contact_info' => 'john.doe@example.com',
            ];
            Supervisor::create($data);
            print('Успех!');
        }
        catch (\Exception $e)
        {
            $this->error('Ошибка создания супервайзера');
        }
    }
}
