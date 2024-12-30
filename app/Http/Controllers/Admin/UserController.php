<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Models\User;
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


    public function edit(
        $id
    ): View|\Illuminate\Foundation\Application|Factory|Application {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function userStatus(Request $request, $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => $request->active]);

        return response()->json(['status' => 'success', 'data' => $user]);
    }
}
