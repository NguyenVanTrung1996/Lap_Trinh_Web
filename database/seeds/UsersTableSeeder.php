<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                [
                    'email'         => 'admin@gmail.com',
                    'password'      => bcrypt('123456'),
                    'name'          => 'admin',
                    'date_of_birth' => '19961104',
                    'gender'        => '1',
                    'phone'         => '0943901988',
                    'address'       => '117 Hang Bong, Hoan Kiem, Ha Noi',

                ],
                [
                    'email'         => 'duong@gmail.com',
                    'password'      => bcrypt('123456'),
                    'name'          => 'duong',
                    'date_of_birth' => '19961105',
                    'gender'        => '1',
                    'phone'         => '0943966988',
                    'address'       => '119 Hang Ma, Hoan Kiem, Ha Noi',

                ],
                [
                    'email'         => 'pho.duc.dat@framgia.com',
                    'password'      => bcrypt('167456'),
                    'name'          => 'Pho Duc Dat',
                    'date_of_birth' => '19801005',
                    'gender'        => '1',
                    'phone'         => '0915966988',
                    'address'       => '200 Nghia Tan, Cau Giay, Ha Noi',

                ],
                [
                    'email'         => 'minhth@yahoo.com',
                    'password'      => bcrypt('abc12345'),
                    'name'          => 'Tran Hoang Minh',
                    'date_of_birth' => '19961212',
                    'gender'        => '1',
                    'phone'         => '0915136988',
                    'address'       => '420 Quan Hoa, Cau Giay, Ha Noi',

                ],
                [
                    'email'         => 'NhanNT@gmail.com',
                    'password'      => bcrypt('qwerty123'),
                    'name'          => 'Nguyen Thanh Nhan',
                    'date_of_birth' => '19960606',
                    'gender'        => '1',
                    'phone'         => '0915136555',
                    'address'       => '300 Dich Vong, Cau Giay, Ha Noi',

                ],
                [
                    'email'         => 'ThaoPN@gmail.com',
                    'password'      => bcrypt('666666'),
                    'name'          => 'Pham Ngoc Thao',
                    'date_of_birth' => '19960608',
                    'gender'        => '0',
                    'phone'         => '0915133355',
                    'address'       => '15 Nguyen Van Huong, Thao Dien, Ho Chi Minh',

                ],
                [
                    'email'         => 'AnhNH@gmail.com',
                    'password'      => bcrypt('ngohaianh'),
                    'name'          => 'Ngo Hai Anh',
                    'date_of_birth' => '19950708',
                    'gender'        => '0',
                    'phone'         => '0915233254',
                    'address'       => '34 Nghia Do, Cau Giay, Ha Noi',

                ],
                [
                    'email'         => 'HoangDucQuan@gmail.com',
                    'password'      => bcrypt('123123'),
                    'name'          => 'Hoang Duc Quan',
                    'date_of_birth' => '19961208',
                    'gender'        => '1',
                    'phone'         => '0911233355',
                    'address'       => '300 Mai Dich, Cau Giay, Ha Noi',

                ],
                [
                    'email'         => 'HungNM@gmail.com',
                    'password'      => bcrypt('hung123'),
                    'name'          => 'Nguyen Manh Hung',
                    'date_of_birth' => '19701208',
                    'gender'        => '1',
                    'phone'         => '0932956355',
                    'address'       => '77 Mai Dich, Cau Giay, Ha Noi',

                ],

            ]
        );
    }
}