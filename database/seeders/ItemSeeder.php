<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [];
        $name = ['Книги','Конфеты','Телефон'];
        foreach ($name as $value) {
            $items[] = ['name' => $value];
        }
        DB::table('order_items')->insert($items);
    }
}
