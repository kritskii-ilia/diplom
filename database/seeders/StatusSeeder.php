<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses =
            [
                [
                    'title' => 'Запрошено'
                ],

                [
                    'title' => 'Одобрено'
                ],

                [
                    'title' => 'Отклонено'
                ]

            ];

        DB::table('statuses')->insert($statuses);
    }
}
