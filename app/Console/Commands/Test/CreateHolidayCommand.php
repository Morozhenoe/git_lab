<?php

namespace App\Console\Commands\Test;

use App\Models\Holiday;
use App\Models\HolidayHistory;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Console\Command;

class CreateHolidayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateHoliday';

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
                'user_id' => User::all()->random()->id,
                'contact_info' => '41234fsdfas',
                'date_of_holiday' => '2023-01-10',
                'count_of_guests' => 100,
                'place' => 'dfgdfghgfdgfd',
                'status' => 1,
                'priority' => 1,
                'supervisor_id' => Supervisor::all()->random()->id,
            ];
            Holiday::create($data);
            print('Успех!');
        }
        catch (\Exception $e)
        {
            $this->error('Ошибка создания праздника!');
        }
    }
}
