<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
        try
        {
            DB::beginTransaction();
            $user->holidays()->delete();
            $user->holidaysHistory()->delete();
            $user->forceDelete();
            DB::commit();
            return redirect()->route('admin.index');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ошибка удаления');
        }
    }

}
