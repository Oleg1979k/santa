<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersId = [];
        $orderItemId = [];
        $users = DB::table('users')->get();
        $items = DB::table('order_items')->get();
        foreach ($users as $user) {
            $usersId[] = $user->id;
        }
        foreach ($items as $item) {
            $orderItemId[] = $item->id;
        }
        shuffle($usersId);
        $orders = [];
        foreach ($usersId as $userId) {
            $orders[] = [
                'order_item_id' => array_rand($orderItemId,1) + 1,
                'user_id' => $userId
            ];
        }
        DB::table('orders')->insert($orders);
    }
}
