<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories =
            [
                [
                    'title' => 'Биткоин',
                    'alias' => 'Bitcoin'
                ],

                [
                    'title' => 'Альткоин',
                    'alias' => 'Altcoin'
                ],

                [
                    'title' => 'Шиткоин',
                    'alias' => 'Shitcoin'
                ],

                [
                    'title' => 'Стейблкоин',
                    'alias' => 'Stablecoin'
                ],

                [
                    'title' => 'Метавселенная',
                    'alias' => 'Metaverse'
                ],

            ];

        DB::table('categories')->insert($categories);

    }
}
