<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Bitcoin',
                'description' => 'Первая в мира криптовалюта. Цифровое золото, даже лучше.',
                'img_url' => 'img/projects/bitcoin.png',
                'category_id' => '1',
                'supply' => '7000',
                'max_supply' => '25000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Ethereum',
                'description' => 'Первый в мире альткоин. Замена реальных денег.',
                'img_url' => 'img/projects/ethereum.png',
                'category_id' => '2',
                'supply' => '7000',
                'max_supply' => '25000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Shitcoin',
                'description' => 'Таких шитков тьма, созданы для мамонтов.',
                'img_url' => 'img/projects/shitcoin.png',
                'category_id' => '3',
                'supply' => '7000',
                'max_supply' => '25000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Stablecoin',
                'description' => 'Просто стейблкоин. Вложись в доллар',
                'img_url' => 'img/projects/stablecoin.png',
                'category_id' => '4',
                'supply' => '7000',
                'max_supply' => '25000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Metaverse',
                'description' => 'Метавселенная, в которую играте Snoop Dog',
                'img_url' => 'img/projects/metaverse.png',
                'category_id' => '5',
                'supply' => '7000',
                'max_supply' => '25000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('projects')->insert($projects);
    }
}
