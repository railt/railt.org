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
class UsersSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncate('users');

        \DB::table('users')->insert([
            'login'     => 'admin',
            'password'  => \bcrypt('admin'),
            'abilities' => '[]',
        ]);
    }
}
