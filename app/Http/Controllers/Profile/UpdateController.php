<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $user->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Профиль успешно обновлён!');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('failure', 'Ошибка обновления профиля!');
        }
    }
}
