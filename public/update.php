<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);


\shell_exec('cd ../ && git pull origin master');
\shell_exec('cd ../ && php artisan docs:sync');

\header('Content-Type: application/json');

echo \json_encode([
    'status' => 'OK'
]);
