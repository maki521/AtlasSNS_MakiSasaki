<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期データ
        DB::table('users')->insert([
            ['username' => 'ユーザー名',
            'mail' => 'atlas@sns.com',
            'password' => bcrypt('12345abc')]
        ]);
    }
}
