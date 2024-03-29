<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =  User::create([
            'name' => "Engr. Rosemarie C. Lopez",
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('admin');
    }
}
