<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@123.com',
            'address' => 'Ha Noi',
            'password' => bcrypt('admin'),
            'avatar' => 'http://i.9mobi.vn/cf/images/2015/03/nkk/anh-gai-dep-13.jpg',
            'level' => '1',
        ]);
        //
    }
}
