<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

\set_time_limit(720);
\define('ROOT_DIR', \dirname(__DIR__) . '/');

function run(string $cmd, string $path = '')
{
    echo 'cd ' . ROOT_DIR. ' && ' . $cmd . "\n";
    \system('cd ' . ROOT_DIR . $path. ' && ' . $cmd);
}

$commands = [
    //'git pull origin master',
    //'composer install',
    'php artisan sync:docs',
    //'php artisan sync:components',
    //'php artisan sync:issues',
    //'php artisan sync:contributors',
];

foreach ($commands as $command) {
    \run($command);
}
