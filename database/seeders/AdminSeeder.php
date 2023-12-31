<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "id" => Str::uuid(),
            'name' => "Hakima Elhani",
            'location' => 'Morocco, Tetouan',
            'role' => Role::where('name',"admin")->first(),
            'email' => "hakima@gmail.com",
            'phoneNumber' => '0998989889',
            'password' => Hash::make("password"),
        ]);

        


    }
}
