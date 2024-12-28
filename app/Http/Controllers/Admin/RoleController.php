<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Models\Role;
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
        $models = ['admins', 'roles', 'users', 'books', 'loans'];
        $actions = ['read', 'create', 'update', 'delete'];

        return $roles->render('admin.roles.index', compact('models', 'actions'));
    }

    public function store(StoreRole $request): JsonResponse
    {
        $role = Role::create($request->only('name'));
        $role->givePermissions($request->permissions);

        return response()->json(['status' => 'success']);
    }

    public function edit($id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $role = Role::findOrFail($id);
        $models = ['admins', 'roles', 'users', 'books', 'loans'];
        $actions = ['read', 'create', 'update', 'delete'];

        return view('admin.roles.edit', compact('role', 'models', 'actions'));
    }

    public function update(UpdateRole $request, $id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->update($request->safe()->except('permissions'));
        $role->syncPermissions($request->permissions);

        return response()->json(['status' => 'success']);
    }

    public function destroy($id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['status' => 'success']);
    }
}
