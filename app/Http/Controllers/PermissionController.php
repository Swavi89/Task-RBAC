<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission(Request $request)
    {
        return view('users.permission.index',['permissions'=> Permission::getPermissionList($request->all())]);
    }
    public function addPermission()
    {
        $permission = new Permission();
        return view('users.permission.permission-form',['permission'=>$permission]);
    }
    public function savePermission(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:50|unique:permissions,name,' . $request->get('id'),
            'tag' => 'required|string|min:1|max:50|unique:permissions,tag,' . $request->get('id'),
            'description' => 'nullable|max:500',
        ];
        $messages = [
            'name.required' => 'Please enter permission name',
            'name.min' => 'Permission name should be a minimum of 1 characters',
            'name.max' => 'Permission name should be a maximum of 50 characters',
            'name.unique' => 'Permission name is already exists!',
            'tag.required' => 'Please enter tag',
            'tag.min' => 'Tag should be a minimum of 1 characters',
            'tag.max' => 'Tag should be a maximum of 50 characters',
            'tag.unique' => 'Tag is already exists!',
            'description.max' => 'Description should be a maximum of 500 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->withError($errorMessage)->withInput();
        }

        if (!empty($request->get('id'))) {
            $permission = Permission::find($request->get('id'));
            $redirect = [
                'url' => redirect()->back(),
                'msg' => 'Permission updated successfully'
            ];
        } else {
            $permission = new Permission();
            $redirect = [
                'url' => redirect('permissions'),
                'msg' => 'Permission created successfully'
            ];
        }

        $permission->name = trim($request->get('name'));
        $permission->tag = trim($request->get('tag'));
        $permission->description = trim($request->get('description'));

        try {
            $permission->save();
            return $redirect['url']->with('success', $redirect['msg']);
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong, please try again later');
        }
    }
    public function editPermission($id)
    {
        $permission = Permission::getPermissionById($id);
        if (empty($permission))
            abort(404);
        return view('users.permission.permission-form', ['permission'=> $permission]);
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        if (empty($permission))
            abort(404);
        try {
            $permission->delete();
            return redirect()->back()->with('success', 'Permission has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }
}
