<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$users = DB::table('users')->get();

		foreach ($users as $user) {
			DB::table('friends')->insert([
				'name' => Str::random(10),
				'email' => Str::random(10).'@gmail.com',
				'password' => Hash::make('password'),
			]);
		}
    }
}
