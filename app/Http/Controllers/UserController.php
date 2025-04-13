<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $userListRoute = '/users';
    public function user(Request $request)
    {
        return view ('users.index', ['users' => User::getUserList($request->all())]);
    }

    public function addUser()
    {
        $user = new User;
        $roles = Role::getRoleListAsSelect();
        return view('users.user-form', ['user' => $user, 'roles'=>$roles]);
    }

    public function editUser($id)
    {
        $roles = Role::getRoleListAsSelect();
        $user = User::getUserById($id);
        if (empty($user))
            abort(404);
        return view('users.user-form', ['user'=> $user, 'roles'=>$roles]);
    }

    public function saveUser(Request $request)
    {
        $rules =  [
            'name' => 'required|min:1|max:100',
            'email' => 'required|email:rfc,dns|max:100|unique:users,email,' . $request->get('id'),
            'mobile' => 'required|min:10|max:10|unique:users,mobile,' . $request->get('id'),
        ];
        $messages = [
            'name.required' => 'Please enter name!',
            'name.min' => 'Name should be minimum of 1 characters!',
            'name.max' => 'Name should be maximum of 100 characters!',
            'email.required' => 'Please enter an email!',
            'email.email' => 'Please enter a valid email!',
            'email.max' => 'Email should be maximum of 100 characters!',
            'email.unique' => 'Email already exist!',
            'mobile.required' => 'Please enter mobile number!',
            'mobile.min' => 'Mobile number should be 10 digits!',
            'mobile.max' => 'Mobile number should be 10 digits!',
            'mobile.unique' => 'Mobile number already exist!',                                                                                          
        ];
        if (empty($request->get('id'))) {
            $rules['password'] =  'required|min:8|max:15';
            $messages['password.required'] = 'Please enter password!';
            $messages['password.min'] = 'Password must be 8-15 characters long!!';
            $messages['password.max'] = 'Password must be 8-15 characters long!!';
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->withError($errorMessage)->withInput();
        }
        if (!empty($request->get('id'))) {
            $user = User::getUserById($request->get('id'));
            if (empty($user))
                abort(404);
            $redirect = [
                'url' => redirect()->back(),
                'msg' => 'User updated successfully'
            ];
        } else {
            $user = new User;
            $redirect = [
                'url' => redirect($this->userListRoute),
                'msg' => 'User created successfully'
            ];
            $user->password = Hash::make($request->get('password'));
        }
        $user->name = trim($request->get('name'));
        $user->email = trim($request->get('email'));
        $user->mobile = trim($request->get('mobile'));
        try {
            $user->save();
            $user->roles()->sync($request->get('roles'));
            return $redirect['url']->with('success', $redirect['msg']);
        } catch (\Exception $e) {
            echo($e->getMessage());exit;
            return redirect()->back()->withError('Something went wrong please try again later!');
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (empty($user))
            abort(404);
        try {
            $user->delete();
            return redirect()->back()->with('success', 'User has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }

}
