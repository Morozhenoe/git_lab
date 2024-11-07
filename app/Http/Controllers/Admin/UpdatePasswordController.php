<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validate([
                'new_password' => ['required', 'confirmed'],
            ]);
            $request->user()->update([
                'password' => Hash::make($data['new_password']),
            ]);
            DB::commit();
            return back()->with('pasSuccess', 'Пароль обновлён!');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with('pasFailure', 'Ошибка.');
        }
    }

}
