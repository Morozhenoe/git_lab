<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\HolidayHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(User $user, Request $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validate(['is_finished'=>'array']);
            $data = $data['is_finished'];
            foreach ($data as $key => $value)
            {
                $holiday = Holiday::findOrFail($key);
                $create = [
                    'user_id' => $user->id,
                    'start_date' => $holiday->created_at->format('Y-m-d'),
                    'end_date' => now()->format('Y-m-d'),
                ];
//                dd($create);
                HolidayHistory::create($create);
                $holiday->delete();
            }
            DB::commit();
            return redirect()->route('moderator.index');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back();
        }
    }
}
