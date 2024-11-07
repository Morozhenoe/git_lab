<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Http\Requests\Holiday\StoreRequest;
use App\Models\Holiday;
use App\Models\Supervisor;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $data['status'] = true;
            $data['priority'] = 1;
            $data['supervisor_id'] = Supervisor::all()->random()->id;
            $holiday = Holiday::create($data);
            DB::commit();
            return redirect()->route('home');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('status', 'Ошибка создания заявки.');
        }
    }
}
