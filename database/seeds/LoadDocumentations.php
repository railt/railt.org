<?php

use Illuminate\Database\Seeder;

class LoadDocumentations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getData() as $data) {
            \DB::table('docs')->insert($data);
        }
    }

    /**
     * @return iterable
     */
    private function getData(): iterable
    {
        yield [
            'language_id' => $this->findLanguage('ru'),
            'source_id'   => $this->findRepository('ru'),
        ];

        yield [
            'language_id' => $this->findLanguage('en'),
            'source_id'   => $this->findRepository('en'),
        ];
    }

    /**
     * @param string $lang
     * @return int
     */
    private function findLanguage(string $lang): int
    {
        return \DB::table('languages')
            ->where('code', $lang)
            ->latest('id')
            ->first()->id;
    }

    /**
     * @param string $lang
     * @return int
     */
    private function findRepository(string $lang): int
    {
        return \DB::table('sources')
            ->where('path', '/' . $lang)
            ->latest('id')
            ->first()->id;
    }
}
