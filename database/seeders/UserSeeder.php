<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $name = ['Александр Петров','Денис Иванов','Юрий Сафонов','Андрей Сидоров','Павел Чепиков',
            'Юрий Антонов','Иван Гусев','Николай Иванов','Андрей Степашин','Владимир Жилин'];
        foreach ($name as $value) {
            $users[] = ['name' => $value];
        }
        DB::table('users')->insert($users);
    }
}
