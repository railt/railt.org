<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use Illuminate\Database\Seeder;

/**
 * Class BaseSeeder
 */
abstract class BaseSeeder extends Seeder
{
    /**
     * @param string $table
     * @return int
     */
    protected function truncate(string $table): int
    {
        $prefix = \DB::connection()->getTablePrefix();

        if (\DB::connection()->getDriverName() === 'mysql') {
            return \DB::getPdo()->exec(\implode(";\n", [
                'SET FOREIGN_KEY_CHECKS = 0',
                \sprintf('TRUNCATE TABLE %s%s', $prefix, $table),
                'SET FOREIGN_KEY_CHECKS = 1'
            ]));
        }

        \DB::table($table)->truncate();

        return 1;
    }

    /**
     * @param string $path
     * @param int $batchSize
     * @return \array[]|\Generator|\Traversable
     * @throws \Throwable
     */
    protected function readFrom(string $path, int $batchSize = 100): \Traversable
    {
        try {
            $batch = [];

            $zip = $path . '.zip';
            $dir = \dirname($path);

            if (\is_file($zip)) {
                \system('cd "' . $dir . '" && unzip "' . $zip . '"');
            }

            $fp = \fopen($path, 'rb');

            while (!\feof($fp)) {
                $data = (string)\fgets($fp);

                if (\trim($data)) {
                    $batch[] = \json_decode(trim($data), true);
                }

                if (\count($batch) >= $batchSize) {
                    yield $batch;
                    $batch = [];
                }
            }

            \fclose($fp);

            if (\count($batch) > 0) {
                yield $batch;
            }
        } catch (\Throwable $e) {
            throw $e;
        } finally {
            @\unlink($path);
        }
    }
}
