<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $requests = [

            [
                'user_id' => '2',
                'project_id' => '1',
                'status_id' => '2'
            ],

            [
                'user_id' => '2',
                'project_id' => '2',
                'status_id' => '2'
            ],

            [
                'user_id' => '3',
                'project_id' => '2',
                'status_id' => '2'
            ],

            [
                'user_id' => '4',
                'project_id' => '3',
                'status_id' => '2'
            ],

            [
                'user_id' => '5',
                'project_id' => '5',
                'status_id' => '2'
            ],

        ];


        DB::table('requests')->insert($requests);

    }
}
