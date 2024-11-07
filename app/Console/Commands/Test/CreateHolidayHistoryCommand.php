<?php

namespace App\Console\Commands\Test;

use App\Models\Holiday;
use App\Models\HolidayHistory;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Console\Command;

class CreateHolidayHistoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateHolidayHistory';

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
                'start_date' => '2023-01-10',
                'end_date' => '2023-01-10',
            ];
            HolidayHistory::create($data);
            print('Успех!');
        }
        catch (\Exception $e)
        {
            $this->error('Ошибка создания истории праздника!');
        }
    }
}
