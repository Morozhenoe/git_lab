<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateUser';

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
        try
        {
            $data = [
                'first_name' => 'John Doe',
                'last_name' => 'Doe',
                'father_name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone_number' => '0123456789',
                'password' => Hash::make('123123'),
            ];
            User::create($data);
            print('Успех!');
        }
        catch (\Exception $e)
        {
            $this->error('Неудалось создать пользавееля');
        }
    }
}
