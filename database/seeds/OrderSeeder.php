<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(
            [
                [
                    'user_id'       => '1',
                    'product_count' => '2',
                    'status'        => 'waiting',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '2',
                    'product_count' => '2',
                    'status'        => 'inprogress',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '3',
                    'product_count' => '2',
                    'status'        => 'completed',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '4',
                    'product_count' => '3',
                    'status'        => 'waiting',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '5',
                    'product_count' => '2',
                    'status'        => 'inprogress',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '6',
                    'product_count' => '2',
                    'status'        => 'completed',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '7',
                    'product_count' => '3',
                    'status'        => 'waiting',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '8',
                    'product_count' => '2',
                    'status'        => 'inprogress',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '9',
                    'product_count' => '2',
                    'status'        => 'completed',
                    'sum'           => '0',
                ],
                [
                    'user_id'       => '10',
                    'product_count' => '2',
                    'status'        => 'waiting',
                    'sum'           => '0',
                ],
            ]

        );
    }
}
