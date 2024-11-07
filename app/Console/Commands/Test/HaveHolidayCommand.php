<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use Illuminate\Console\Command;

class HaveHolidayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'HaveHoliday';

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
            if ($user->holidays->count() > 0)
                print('Есть заказанные праздники');
            else
                print('Нет заказанных праздников');
        }
        catch (\Exception $e)
        {
            $this->error('Пользователя с Id '.$userId.' нет');
        }
    }
}
