<?php

namespace App\Services;

use App\Contracts\User\UserContract;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class UserService implements UserContract
{
    public function getUsers(Request $request): LengthAwarePaginator
    {
        $model = (new User())->where('id', '!=', Auth::user()->id);

        $model->when($request->has('text'), function ($query) use ($request) {
            $query->where('firstname', 'like', '%' . $request->text . '%')
                ->orWhere('lastname', 'like', '%' . $request->text . '%')
                ->orWhere('email', 'like', '%' . $request->text . '%');
        });

        $model->when($request->has('phone'), function ($query) use ($request) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        });

        $model->when($request->has('city'), function ($query) use ($request) {
            $query->where('city', 'like', '%' . $request->city . '%');
        });

        $model->when($request->has('sex') && $request->sex !== 'all', function ($query) use ($request) {
            $query->where('sex', $request->sex);
        });

        return $model->paginate(20);
    }

    public function update(array $data)
    {
        $user = User::find(Auth::user()->id);
        $user->update($data);

        return response()->json($user, 200);
    }
}
