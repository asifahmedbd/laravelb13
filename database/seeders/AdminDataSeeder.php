<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => "Asif BJIT",
            'username' => "asifahmedbd",
            'email' => 'asifahmed.mist@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('superadmin123'),
            'role' => 'admin'
        ]);
        
        $role = Role::create(['name' => 'admin']);
         
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}
