<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'login' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role_id' => '1',
                'balance' => '1000',
                'volume' => '35000',
                'participations' => '5',
                'invested_sum' => '2500',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'login' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('user1'),
                'role_id' => '2',
                'balance' => '300',
                'volume' => '7550',
                'participations' => '5',
                'invested_sum' => '500',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'login' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('user2'),
                'role_id' => '2',
                'balance' => '100',
                'volume' => '3500',
                'participations' => '3',
                'invested_sum' => '800',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],

            [
                'login' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('user3'),
                'role_id' => '2',
                'balance' => '800',
                'volume' => '15555',
                'participations' => '1',
                'invested_sum' => '5000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],

            [
                'login' => 'user4',
                'email' => 'user4@gmail.com',
                'password' => bcrypt('user4'),
                'role_id' => '2',
                'balance' => '70',
                'volume' => '1500',
                'participations' => '2',
                'invested_sum' => '300',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
        ];
        DB::table('users')->insert($users);
    }

}
