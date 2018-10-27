<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use App\Entity\Repositories\DocumentRepository;
use DavidBadura\FakerMarkdownGenerator\FakerProvider;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;

/**
 * Class DocumentSeeder
 */
class DocumentSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @param DocumentRepository $docs
     * @param EntityManagerInterface $em
     * @return void
     * @throws Exception
     */
    public function run(Generator $faker, DocumentRepository $docs, EntityManagerInterface $em): void
    {
        $faker->addProvider(new FakerProvider($faker));

        $this->truncate('docs');

        for ($i = 0, $len = \random_int(10, 100); $i < $len; $i++) {
            DB::table('docs')->insert([
                'title'            => $faker->words(\random_int(1, 3), true),
                'language_id'      => \random_int(1, 2),
                'nav'              => '{}',
                'urn'              => \implode('/', $faker->words(\random_int(1, 4))),
                'hash'             => \sha1((string)\random_bytes(50)),
                'content_original' => $faker->markdown(\random_int(10, 2000)),
                'content_rendered' => ''
            ]);
        }

        /** @var \App\Entity\Document $doc */
        foreach ($docs->findAll() as $doc) {
            $doc->touch();
            $em->persist($doc);
        }

        $em->flush();
    }
}
