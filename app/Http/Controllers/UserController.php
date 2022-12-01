<?php

namespace App\Http\Controllers;
use App\Models\User;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function destroy($id)
    {
        try {
            DB::table('users')->where('id','=', $id)->delete();
        }  catch (Throwable $e) {
             report($e);
             return response()->json($e);
        }
        return response()->json('The user is deleted');
    }


    public function santa($id)
    {
        $s = User::santa($id);
        $a = User::accountable($id);
        return response()->json([
            'santa' => $s,
            'accountable' => $a
            ]);
    }

    public function all()
    {
        $all = User::alltable();
        return response()->json([
            'result' => $all
        ]);
    }
}
