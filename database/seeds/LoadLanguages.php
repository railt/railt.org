<?php

use Illuminate\Database\Seeder;

class LoadLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getData() as $data) {
            \DB::table('languages')->insert($data);
        }
    }

    /**
     * @return iterable
     */
    private function getData(): iterable
    {
        yield ['code'  => 'ru', 'title' => 'Русский', 'is_default' => true];
        yield ['code'  => 'en', 'title' => 'English'];
    }

}
