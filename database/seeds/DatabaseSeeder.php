<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(LoadSources::class);
        $this->call(LoadLanguages::class);
        $this->call(LoadDocumentations::class);
        $this->call(LoadComponents::class);
    }
}
