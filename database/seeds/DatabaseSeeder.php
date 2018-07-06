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
                    'name'   => 'Цифры пагинации',
                    'value'  => '4',
                    'desc'   => 'Количество цифр видимых для листания страниц',
                    'type'   => 'input'
                ],

                [
                    'option' => 'CountProductCatalog',
                    'name'   => 'Количество товаров',
                    'value'  => '18',
                    'desc'   => 'Количество выводимых товаров на странице',
                    'type'   => 'input'
                ],

                [
                    'option' => 'CountOrder',
                    'name'   => 'Количество заказов',
                    'value'  => '25',
                    'desc'   => 'Количество выводимых заказов в таблице на странице заказов от клиентов',
                    'type'   => 'input'

                ],

                [
                    'option' => 'telephoneLife',
                    'name'   => 'Телефон МТС',
                    'value'  => '099 378 33 31',
                    'desc'   => 'Телефон МТС сайта',
                    'type'   => 'input'
                ],

                [
                    'option' => 'telephoneKiev',
                    'name'   => 'Телефон Киевстара',
                    'value'  => '099 378 33 31',
                    'desc'   => 'Телефон Киевстара сайта',
                    'type'   => 'input'
                ],

                [
                    'option' => 'MetaKeySite',
                    'name'   => 'Meta keywords категорий',
                    'value'  => '',
                    'desc'   => 'Meta keywords категорий/сайта на главной странице',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'MetaDescSite',
                    'name'   => 'Meta desc категорий',
                    'value'  => '',
                    'desc'   => 'Meta desc категорий/сайта на главной странице',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'TitleSite',
                    'name'   => 'Тайтл сайта',
                    'value'  => '',
                    'desc'   => 'Тайтл сайта на главной странице',
                    'type'   => 'input'
                ],

                [
                    'option' => 'MetaKeyContact',
                    'name'   => 'Meta keywords контактов',
                    'value'  => '',
                    'desc'   => 'Meta keywords страницы контактов',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'MetaDescContact',
                    'name'   => 'Meta desc контактов',
                    'value'  => '',
                    'desc'   => 'Meta desc страницы контактов',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'TitleContact',
                    'name'   => 'Тайтл контактов',
                    'value'  => '',
                    'desc'   => 'Тайтл сайта траницы контактов',
                    'type'   => 'input'
                ],

                [
                    'option' => 'MetaKeyDelivery',
                    'name'   => 'Meta keywords доставки',
                    'value'  => '',
                    'desc'   => 'Meta keywords страницы доставки',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'MetaDescDelivery',
                    'name'   => 'Meta desc доставки',
                    'value'  => '',
                    'desc'   => 'Meta desc страницы доставки',
                    'type'   => 'textaria'
                ],

                [
                    'option' => 'TitleDelivery',
                    'name'   => 'Тайтл доставки',
                    'value'  => '',
                    'desc'   => 'Тайтл сайта траницы доставки',
                    'type'   => 'input'
                ]







            ]);


    }
}
