<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\StoreUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Models\User\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('users', true, true, true, true);
    }

    public function index(UserDataTable $users)
    {
        return $users->render('admin.users.index');
    }

    public function store(StoreUser $request): JsonResponse
    {
        $userData = $request->safe()->except('password');
        $userData['password'] = bcrypt($request->password);
        $userData['code'] = generate_verification_code();
        $userData['is_complete'] = 1;
        $userData['is_verified'] = 1;
        User::create($userData);

        return response()->json(['status' => 'success']);
    }

    public function edit(
        $id
    ): View|\Illuminate\Foundation\Application|Factory|Application {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUser $request, $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $userData = $request->safe()->except('password');

        if ($request->password) {
            $userData['password'] = bcrypt($request->password);
        }
        $user->update($userData);

        return response()->json(['status' => 'success']);
    }

    public function destroy($id): JsonResponse
    {
        User::whereId($id)->forceDelete();

        return response()->json(['status' => 'success']);
    }

    public function userStatus(Request $request, User $user): JsonResponse
    {
        $user->update(['is_active' => $request->active]);

        return response()->json(['status' => 'success', 'data' => $user]);
    }
}
