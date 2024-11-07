<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use Illuminate\Console\Command;

class CheckAccssAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkAdmin';

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
            $userId = $this->ask('Введите Id пользователя');
            $user = User::findOrFail($userId);
            if ($user->role_id >= 4)
                print('Есть доступ к адмистрированию.');
            else
                print('Доступа к администрированию нет');
        }
        catch (\Exception $e)
        {
            $this->error('Пользователя с Id '.$userId.' нет');
        }
    }
}
