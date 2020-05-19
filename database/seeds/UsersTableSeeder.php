<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "M Awais";
        $user->email = "mawaisnow@gmail.com";
        $user->businessName = "M Awais Technologies";
        $user->phone = "+923024543609";
        $user->role = 9;
        $user->password = bcrypt('mawaisnow@gmail.com1122');
        $user->save();

        


    }
}
