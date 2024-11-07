<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UpdatePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validate([
                'current_password' => ['required', 'current_password'],
                'new_password' => ['required', 'confirmed'],
            ]);
            $request->user()->update([
                'password' => Hash::make($data['new_password']),
            ]);
            DB::commit();
            return back()->with('status', 'Пароль обновлён!');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with('status', 'Ошибка.');
        }
    }
}
