<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use Faker\Generator;

/**
 * Class TagsSeeder
 */
class TagsSeeder extends BaseSeeder
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
        $this->truncate('tags');

        for ($i = 0; $i < 50; ++$i) {
            try {
                \DB::table('tags')->insert([
                    'title' => $faker->words(\random_int(1, 2), true),
                ]);
            } catch (\Throwable $e) {
                echo $e->getMessage() . "\n";
                continue;
            }
        }
    }
}
