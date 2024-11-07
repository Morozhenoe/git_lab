<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $user->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Профиль успешно обновлён!');
        }
        catch (\Exception $e) {
        }
        DB::rollBack();
        return redirect()->back()->with('failure', 'Ошибка обновления профиля!');
        }
}
