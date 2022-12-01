<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordersId = [];
        $usersId = [];
        $userCarts = [];
        $orders = DB::table('orders')->get();
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $usersId[] = $user->id;
        }
        foreach ($orders as $order) {
            $ordersId[] = $order->id;
        }
        shuffle($usersId);
        shuffle($ordersId);
        $i = 0;
        foreach ($usersId as $userId) {
            $userCarts[] = [
                'order_id' => $ordersId[$i],
                'user_id' => $userId
            ];
            $i++;
        }
        DB::table('user_carts')->insert($userCarts);
    }
}
