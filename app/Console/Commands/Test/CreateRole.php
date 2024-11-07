<?php

namespace App\Console\Commands\Test;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateRole';

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
                'title' => 'super admin',
            ];
            Role::create($data);
            print('Успех!');
        }
        catch (\Exception $e)
        {
            $this->error('Ошибка создания роли!');
        }
    }
}
