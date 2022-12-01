<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{


    public static function santa($id) {
        $santa = DB::table('orders')
            ->join('user_carts','orders.id', '=', 'user_carts.order_id')
            ->join('users','user_carts.user_id', '=', 'users.id')
            ->where('orders.user_id', '=',$id)
            ->select('users.name')
            ->first();
        return $santa;
    }

    public static function accountable($id) {
        $account = DB::table('user_carts')
            ->join('orders', 'orders.id', '=', 'user_carts.order_id')
            ->join('users','orders.user_id', '=', 'users.id')
            ->where('user_carts.user_id','=', $id)
            ->select('users.name')
            ->first();
        return $account;
    }

    public static function alltable() {
        return DB::table('users')
            ->join('orders','users.id','orders.user_id')
            ->join('order_items','order_item_id','=','order_items.id')
            ->select(DB::raw('*'))
            ->get();
    }


}
