<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

/**
 * Class IP4ZonesSeeder
 */
class IP4ZonesSeeder extends BaseSeeder
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
        $this->truncate('ip4_zones');

        $out = $this->command->getOutput();

        foreach ($this->readFrom(__DIR__ . '/resources/ips.txt') as $i => $batch) {
            \DB::table('ip4_zones')->insert($batch);

            $out->write("\r" . '<comment>Inserting [<info>' . $i . '</info>]:</comment> Into ip4_zones');
        }

        $out->writeln("\n" . '<info>Inserted:</info> Into ip4_zones' . \str_repeat(' ', 20));
    }
}
