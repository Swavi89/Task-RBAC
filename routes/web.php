<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

/* Dashboard */
Route::get('/', 'LoginController@dashboard')->middleware('auth');

/* Login & Logout */
Route::get('login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');

/* Users */
Route::get('/users', 'UserController@user')->middleware('auth');
Route::get('/users/add', 'UserController@addUser')->middleware('auth');
Route::post('/users/save', 'UserController@saveUser');
Route::post('/user/status/update', 'UserController@updateStatus');
Route::get('/users/{id}/edit', 'UserController@editUser')->middleware('auth');
Route::get('/users/{id}/view', 'UserController@viewUser')->middleware('auth');
Route::get('/users/{id}/delete', 'UserController@deleteUser')->middleware('auth');

/* Permissions */
Route::get('/permissions', 'PermissionController@permission')->middleware('auth');
Route::get('/permissions/add', 'PermissionController@addPermission')->middleware('auth');
Route::post('/permissions/save', 'PermissionController@savePermission');
Route::get('/permissions/{id}/edit', 'PermissionController@editPermission')->middleware('auth');
Route::get('/permissions/{id}/view', 'PermissionController@viewPermission')->middleware('auth');
Route::get('/permissions/{id}/delete', 'PermissionController@deletePermission')->middleware('auth');

/*Roles With Permissions */
Route::get('/role-with-permissions', 'RoleController@roleWithPermission')->middleware('auth');
Route::get('/role-with-permissions/add', 'RoleController@addRoleWithPermission')->middleware('auth');
Route::post('/role-with-permissions/save', 'RoleController@saveRoleWithPermission');
Route::get('/role-with-permissions/{id}/edit', 'RoleController@editRoleWithPermission')->middleware('auth');
Route::get('/role-with-permissions/{id}/view', 'RoleController@viewRoleWithPermission')->middleware('auth');
Route::get('/role-with-permissions/{id}/delete', 'RoleController@deleteRoleWithPermission')->middleware('auth');

/* Blogs */
Route::get('/blogs', 'BlogController@blogs')->middleware('auth', 'permission:view_blogs');
Route::get('/blogs/add', 'BlogController@addBlog')->middleware('auth', 'permission:create_blogs');
Route::get('/blogs/{id}/edit', 'BlogController@editBlog')->middleware('auth', 'permission:edit_blogs');
Route::post('/blogs/save', 'BlogController@saveBlog')->middleware('auth');
Route::get('/blogs/{id}/delete', 'BlogController@deleteBlog')->middleware('auth', 'permission:delete_blogs');
