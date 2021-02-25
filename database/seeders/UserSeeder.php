<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;
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
        $divisionsName = ['admin', 'finance', 'payment', 'procurement', 'it'];

        foreach($divisionsName as $divName) {
            $division = new Division;
            $division->name = $divName;
            $division->save();

            $userCount = 10;
            $role = 'user';
            
            if($divName == 'admin') {
                $userCount = 2;
                $role = 'admin';
            }

            for($i=1; $i<=$userCount; $i++) {
                $user = new User;
                $user->username = $divName.$i;
                $user->password = Hash::make('rahasia');
                $user->role = $role;
                $user->division_id = $division->id;
                $user->save();
            }
        }
    }
}
