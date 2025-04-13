<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    private $roleListRoute = '/role-with-permissions';
    public function roleWithPermission(Request $request)
    {
        return view('users.roles-&-permissions.index', ['roles' => Role::getRoleList($request->all())]);
    }

    public function addRoleWithPermission()
    {
        $role = new Role();
        $permissions = Permission::all()->groupBy(function ($perm) {
            return preg_replace('/^(create|edit|view|delete)_/', '', $perm->tag);
        });
        return view('users.roles-&-permissions.role-with-permissions-form', ['role' => $role, 'permissions' => $permissions]);
    }

    public function saveRoleWithPermission(Request $request)
    {
        $rules =  [
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|max:256',
        ];
        $messages = [
            'name.required' => 'Please enter role!',
            'name.min' => 'Role should be minimum of 2 characters!',
            'name.max' => 'Role should be maximum of 50 characters!',
            'description.max' => 'Description should be a maximum of 256 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->withError($errorMessage)->withInput();
        }
        if (!empty($request->get('id'))) {
            $role = Role::getRoleById($request->get('id'));
            if (empty($role))
                abort(404);
            $redirect = [
                'url' => redirect()->back(),
                'msg' => 'Role updated successfully'
            ];
        } else {
            $role = new Role;
            $redirect = [
                'url' => redirect($this->roleListRoute),
                'msg' => 'Role created successfully'
            ];
        }
        $role->name = trim($request->get('name'));
        $role->description = trim($request->get('description'));
        try {
            $role->save();
            $role->permissions()->sync($request->get('permissions'));
            return $redirect['url']->with('success', $redirect['msg']);
        } catch (\Exception $e) {
            echo ($e->getMessage());
            exit;
            return redirect()->back()->withError('Something went wrong please try again later!');
        }
    }

    public function editRoleWithPermission($id)
    {
        $role = Role::getRoleById($id);
        $permissions = Permission::all()->groupBy(function ($perm) {
            return preg_replace('/^(create|edit|view|delete)_/', '', $perm->tag);
        });
        if (empty($role))
            abort(404);
        return view('users.roles-&-permissions.role-with-permissions-form', ['role'=> $role, 'permissions' => $permissions]);
    }

    public function viewRoleWithPermission($id)
    {
        $role = Role::getRoleById($id);
        $permissions = Permission::all()->groupBy(function ($perm) {
            return preg_replace('/^(create|edit|view|delete)_/', '', $perm->tag);
        });
        if (empty($role))
            abort(404);
        return view('users.roles-&-permissions.view-role-with-permissions', ['role'=> $role, 'permissions' => $permissions]);
    }

    public function deleteRoleWithPermission($id)
    {
        $role = Role::find($id);
        if (empty($role))
            abort(404);
        try {
            $role->delete();
            return redirect()->back()->with('success', 'Role has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }
}
