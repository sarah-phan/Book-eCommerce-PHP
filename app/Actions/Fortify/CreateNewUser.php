<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
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
            'password_confirmation' => ['required_with:password', 'same:password']
        ])->validate();

        $user=[
            'user_id' => (string) Str::uuid(),
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'user_phone' => $input['user_phone'],
            'password' => Hash::make($input['password']),
        ];
        dd($user);
        return User::create($user);
    }
}
