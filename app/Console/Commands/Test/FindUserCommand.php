<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use Illuminate\Console\Command;

class FindUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestUser';

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
            $userId = $this->ask('Введите id пользователя?');
            $user = User::findOrFail($userId);
            print_r($user);
        }
        catch (\Exception $e)
        {
            $this->error('Пользователя с i'.$userId.' нет');
        }
    }
}
