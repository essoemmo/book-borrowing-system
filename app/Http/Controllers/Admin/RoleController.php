<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Requests\Admin\StoreRole;
use App\Http\Requests\Admin\UpdateRole;
use App\Models\Setting\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RoleController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('roles', true, true, true, true);
    }

    public function index(RoleDataTable $roles)
    {
        $models = [
            'admins',
            'roles',
            'users',
            'daycares',
            'cities',
            'states',
            'features',
            'stages',
            'messages',
            'settings',
            'contactus',
        ];
        $actions = ['read', 'create', 'update', 'delete'];

        return $roles->render('admin.roles.index', compact('models', 'actions'));
    }

    public function store(StoreRole $request): JsonResponse
    {
        $role = Role::create($request->only('name'));
        $role->givePermissions($request->permissions);

        return response()->json(['status' => 'success']);
    }

    public function edit(Role $role): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $models = [
            'admins',
            'roles',
            'users',
            'daycares',
            'cities',
            'states',
            'features',
            'stages',
            'messages',
            'settings',
            'contactus',
        ];
        $actions = ['read', 'create', 'update', 'delete'];

        return view('admin.roles.edit', compact('role', 'models', 'actions'));
    }

    public function update(UpdateRole $request, Role $role): JsonResponse
    {
        $role->update($request->safe()->except('permissions'));
        $role->syncPermissions($request->permissions);

        return response()->json(['status' => 'success']);
    }

    public function destroy(Role $role): JsonResponse
    {
        $role->delete();

        return response()->json(['status' => 'success']);
    }
}
