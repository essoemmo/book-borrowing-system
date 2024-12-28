<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminsController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('admins', true, true, true, true);
    }

    public function index(AdminDataTable $admins)
    {
        $roles = Role::WithoutRoleSuperAdmin(['super_admin'])->get();

        return $admins->render('admin.admins.index', compact('roles'));
    }

    public function store(StoreAdmin $request): JsonResponse
    {
        $adminData = $request->safe()->except('password', 'role_id');
        $adminData['password'] = bcrypt($request->password);
        $admin = Admin::create($adminData);
        $admin->syncRoles([$request->role_id]);

        return response()->json(['status' => 'success', 'data' => $admin]);
    }

    public function edit(
        $id
    ): View|\Illuminate\Foundation\Application|Factory|Application {
        $roles = Role::whereRoleNot(['super_admin'])->get();
        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    public function adminStatus(Request $request, Admin $admin): JsonResponse
    {
        $admin->update(['active' => $request->active]);

        return response()->json(['status' => 'success', 'data' => $admin]);
    }

    public function update(UpdateAdmin $request, $id): JsonResponse
    {
        $admin = Admin::findOrFail($id);
        $adminData = $request->safe()->except('password', 'role_id');

        if ($request->password) {
            $adminData['password'] = bcrypt($request->password);
        }

        $admin->update($adminData);
        $admin->syncRoles([$request->role_id]);

        return response()->json(['status' => 'success']);
    }

    public function destroy($id): JsonResponse
    {
        Admin::whereId($id)->delete();

        return response()->json(['status' => 'success']);
    }
}
