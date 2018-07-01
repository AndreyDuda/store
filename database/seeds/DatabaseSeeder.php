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
                    'name'     => 'admin1',
                    'email'    => 'admin1@gmail.com',
                    'password' => '$2y$10$UN/QeftQP5ONnnKoyfRxPui3hnyP5.8fIlgT1QBUsSjYWAHy0Uv0W'
                ]
            ]);

        DB::table('setting')->insert(
            [
                [
                    'option' => 'PaginateCatalog',
                    'name'   => 'Цыфры пагинации',
                    'value'  => '4',
                    'desc'   => 'Количество цыфр видимых для листания страниц с товаром (для клиента в магазине) '
                ],

                [
                    'option' => 'CountProductCatalog',
                    'name'   => 'Количество товаров',
                    'value'  => '18',
                    'desc'   => 'Количество выводимых товаров на странице'
                ],


            ]);


    }
}
