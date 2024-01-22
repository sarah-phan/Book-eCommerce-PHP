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
        Validator::make(
            $input,
            [
                'user_name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
                'user_phone' => ['required', 'regex:/^(0|\+84)(3|5|7|8|9)\d{8}$/'],
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/'],
                'password_confirmation' => ['required_with:password', 'same:password']
            ],
            [
                'user_phone.regex' => 'Wrong phone number format',
                'password_confirmation.same' => 'Password not the same',
                'password.regex' => "Password must have at least 8 character, at least one uppercase letter, one number, and one special character"
            ]
        )->validate();

        return User::create([
            'user_id' => (string) Str::uuid(),
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'user_phone' => $input['user_phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
