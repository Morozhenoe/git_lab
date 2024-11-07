<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use Illuminate\Console\Command;

class HaveHolidayHistoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'HaveHolidayHistory';

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
            if ($user->holidaysHistory->count() > 0)
                print('Были ранее аказы');
            else
                print('Нет истории заказов');
        }
        catch (\Exception $e)
        {
            $this->error('Пользователя с Id '.$userId.' нет');
        }
    }
}
