<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = [
			[
        	'name'    => 'Автор неизвестен',
			'email'   => 'author_unknown@g.g',
			'password'=> bcrypt(Str::random(16)),
			],
			[
				'name' => 'Автор',
				'email'=> 'author1@g.g',
				'password'=> bcrypt(123123),
			]
		];
        DB::table('users')->insert($date);

    }
}