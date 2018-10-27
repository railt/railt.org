<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use Illuminate\Foundation\Application;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     * @param Application $app
     * @throws InvalidArgumentException
     */
    public function run(Application $app): void
    {
        $cli = $this->command->getOutput();

        $this->call(CountriesSeeder::class);
        $this->call(IP4ZonesSeeder::class);
        $this->call(LanguageSeeder::class);

        if ($app->environment('local')) {
            $this->call(UsersSeeder::class);
            $this->call(CategoriesSeeder::class);
            $this->call(TagsSeeder::class);
            $this->call(ArticlesSeeder::class);

            if (! \env('GITHUB_CLIENT_ID')) {
                $this->call(DocumentSeeder::class);
            } else {
                $cli->writeln('<comment>Skip:</comment> DocumentSeeder (reason: ' .
                    'GitHub connection is configured. Running <info>docs:sync</info> command instead.)');
                $this->command->call('docs:sync');
            }
        } else {
            $cli->writeln('<comment>Skip:</comment> UsersSeeder (reason: Non-local environment)');
            $cli->writeln('<comment>Skip:</comment> CategoriesSeeder (reason: Non-local environment)');
            $cli->writeln('<comment>Skip:</comment> TagsSeeder (reason: Non-local environment)');
            $cli->writeln('<comment>Skip:</comment> ArticlesSeeder (reason: Non-local environment)');
            $cli->writeln('<comment>Skip:</comment> DocumentSeeder (reason: Non-local environment)');
        }
    }
}
