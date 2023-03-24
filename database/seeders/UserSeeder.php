<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Victor',
            'email' => 'victorm@mombasait.co.ke',
            'password' => bcrypt('victorm@mombasait.co.ke'),
            'role_id' =>'2',
            'department' => 'Web Development',
            'education' =>'Graduate',
            'description' =>'Web developer for Mombasa IT Company',
            'address' =>'Mvita',
            'phone_number' =>'0718485211',
            'image' =>'admin.jpg',
        ]);
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@mombasait.co.ke',
            'password' => bcrypt('admin@mombasait.co.ke'),
            'role_id' =>'2',
            'department' => 'Web Development',
            'education' =>'Graduate',
            'description' =>'Web developer for Mombasa IT Company',
            'address' =>'Mvita',
            'phone_number' =>'0718485222',
            'image' =>'admin2.jpg',
        ]);
        User::insert([
            'name' => 'Staff',
            'email' => 'staff@mombasait.co.ke',
            'password' => bcrypt('staff@mombasait.co.ke'),
            'role_id' =>'1',
            'department' => 'Service Provider',
            'education' =>'Graduate',
            'description' =>'Technician for Mombasa IT Company',
            'address' =>'Jomvu',
            'phone_number' =>'0788112233',
            'image' =>'technician.jpg',
        ]);
        User::insert([
            'name' => 'Staff2',
            'email' => 'staff2@mombasait.co.ke',
            'password' => bcrypt('staff2@mombasait.co.ke'),
            'role_id' =>'1',
            'department' => 'Service Provider',
            'education' =>'Graduate',
            'description' =>'Technician for Mombasa IT Company',
            'address' =>'   Kwa Shibu',
            'phone_number' =>'07881109233',
            'image' =>'staff2.jpg',
        ]);
        User::insert([
            'name' => 'Client',
            'email' => 'client@mombasait.co.ke',
            'password' => bcrypt('client@mombasait.co.ke'),
            'role_id' =>'3',
        ]);
        User::insert([
            'name' => 'Client2',
            'email' => 'client2@mombasait.co.ke',
            'password' => bcrypt('client2@mombasait.co.ke'),
            'role_id' =>'3',
        ]);
    }
}
