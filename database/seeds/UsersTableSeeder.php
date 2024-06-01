<?php

use Illuminate\Database\Seeder;

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
        DB::table('Users')->insert([
            ['username' => 'ユーザー名',
            'mail' => 'atlas@sns.com',
            'password' => Crypt::encryptString('12345abc')]
        ]);
    }
}
