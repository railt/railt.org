<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

/**
 * Class LanguageSeeder
 */
class LanguageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('languages');

        \DB::table('languages')->insert([
            [
                'code' => 'en',
                'name' => 'English (EU)'
            ],
            [
                'code' => 'ru',
                'name' => 'Русский'
            ],

            /*// Not Yet =)
            [
                'code' => 'de',
                'name' => 'Deutsch'
            ],
            [
                'code' => 'fr',
                'name' => 'Français'
            ],
            [
                'code' => 'br',
                'name' => 'Português (AL)'
            ],
            [
                'code' => 'it',
                'name' => 'Italiano'
            ],
            [
                'code' => 'cn',
                'name' => '简体中文'
            ],
            [
                'code' => 'kr',
                'name' => '한국어'
            ],
            */
        ]);
    }
}
