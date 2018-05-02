<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [//password 123456
                [
                    'name'     => 'admin',
                    'email'    => 'admin@gmail.com',
                    'password' => '$2y$10$UN/QeftQP5ONnnKoyfRxPui3hnyP5.8fIlgT1QBUsSjYWAHy0Uv0W'
                ]
            ]);
    }
}
