<?php

use App\Entity\Source\Type;
use App\Repository\SourcesRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class LoadComponents
 */
class LoadComponents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getData() as $data) {
            \DB::table('components')->insert($data);
        }
    }

    /**
     * @return iterable
     */
    private function getData(): iterable
    {
        /** @var SourcesRepository $sources */
        $sources = $this->container->make(SourcesRepository::class);

        foreach ($sources->findByType(Type::COMPONENT) as $source) {
            yield [
                'source_id' => $source->getId(),
                'title'     => Str::title($source->getName()),
            ];
        }
    }
}
