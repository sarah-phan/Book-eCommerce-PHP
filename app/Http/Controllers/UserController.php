<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'user_phone' => ['required', 'regex:/^(0|\+84)(3|5|7|8|9)\d{8}$/'],
            'password' => [
                'required',
                'string',
                'min:8', // Minimum 8 characters
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*#?&]/', // At least one special character
            ],
        ]);

        // Create a new user with validated data
        $data = new User;
        $data->user_id = (string) Str::uuid();
        $data->user_name = $validatedData['user_name'];
        $data->email = $validatedData['email'];
        $data->password = Hash::make($validatedData['password']);
        $data->user_phone = $validatedData['user_phone'];
        $data->save();

        return redirect('/admin-user-main')
            ->with('message', 'Add successfully');
    }

    public function showUserList (){
        $data = user::all();
        return view('admin.admin-list', compact('data'));
    }

    public function getUserWithIdInfor($user_id){
        $user_with_id = user::find($user_id);
        return view('admin.editFunction.admin-edit-user', compact('user_with_id'));
    }

    public function updateUserWithIdInfor(Request $request, $user_id){
        $validatedData = $request->validate([
            'user_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'user_phone' => ['required', 'regex:/^(0|\+84)(3|5|7|8|9)\d{8}$/'],
        ]);

        $user_with_id = user::find($user_id);
        $user_with_id->user_name = $validatedData['user_name'];
        $user_with_id->email = $validatedData['email'];
        $user_with_id->user_phone = $validatedData['user_phone'];

        $user_with_id->save();

        return redirect('/admin-user-main')->with('message', "Edit successfully");
    }

    public function deleteUser($user_id){
        $user_with_id = user::find($user_id);
        $user_with_id->delete();
        return redirect('/admin-user-main')->with('message', "Delete successfully");
    }
}
