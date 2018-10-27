<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use DavidBadura\FakerMarkdownGenerator\FakerProvider;
use Faker\Generator;

/**
 * Class ArticlesSeeder
 */
class ArticlesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @return void
     * @throws Exception
     */
    public function run(Generator $faker): void
    {
        $faker->addProvider(new FakerProvider($faker));

        $this->truncate('articles');
        $this->truncate('articles_tags');

        $categories = \DB::table('categories')->count();
        $tags       = \DB::table('tags')->count();

        for ($i = 0; $i < 13; ++$i) {
            try {

                $id = \DB::table('articles')->insertGetId([
                    'title'            => $title = $faker->words(\random_int(1, 10), true),
                    'urn'              => \str_slug($title),
                    'preview'          => $faker->image(\storage_path('app/public'), 962, 480,
                        null, false),
                    'category_id'      => \random_int(1, $categories),
                    'content_original' => $faker->markdown(\random_int(50, 8000)),
                    'content_rendered' => '',
                ]);
            } catch (\Throwable $e) {
                echo $e->getMessage() . "\n";
                continue;
            }

            for ($j = 0, $len = \random_int(1, 15); $j < $len; ++$j) {
                try {
                    \DB::table('articles_tags')->insert([
                        'article_id' => $id,
                        'tag_id'     => \random_int(1, $tags),
                    ]);
                } catch (\Throwable $e) {
                    echo $e->getMessage() . "\n";
                    continue;
                }
            }
        }
    }
}
