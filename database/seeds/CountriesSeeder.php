<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

/**
 * Class CountriesSeeder
 */
class CountriesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Throwable
     * @throws \Exception
     */
    public function run(): void
    {
        $this->truncate('countries');

        $out = $this->command->getOutput();

        foreach ($this->readFrom(__DIR__ . '/resources/countries.txt') as $i => $batch) {
            \DB::table('countries')->insert($batch);

            $out->write("\r" . '<comment>Inserting [<info>' . $i . '</info>]:</comment> Into countries');
        }

        $out->writeln("\n" . '<info>Inserted:</info> Into ip4_zones' . \str_repeat(' ', 20));
    }
}
