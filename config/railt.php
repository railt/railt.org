<?php
/**
 * This file is part of Railt Laravel Adapter package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use App\GraphQL\Extensions;
use Railt\LaravelProvider\Controllers\GraphQLController;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug'     => env('RAILT_DEBUG', env('APP_DEBUG', false)),

    /**
     * GraphQL endpoints.
     */
    'endpoints' => [
        /**
         * Route name => [ configs ]
         */
        'graphql' => [
            /**
             * Root GraphQL schema file path.
             */
            'schema'     => resource_path('graphql/schema.graphqls'),

            /**
             * Autoload schema paths.
             */
            'autoload'   => [
                resource_path('graphql'),
                resource_path('graphql/types'),
                resource_path('graphql/enum'),
                resource_path('graphql/interfaces'),
                resource_path('graphql/scalars'),
                resource_path('graphql/unions'),
            ],

            /**
             * GraphQL controller.
             */
            'uses'       => GraphQLController::class . '@handle',

            /**
             * Routes prefix.
             */
            'prefix'     => 'railt.',

            /**
             * GraphQL middleware.
             */
            'middleware' => [
                'api'
            ],

            /**
             * Allowed methods.
             */
            'methods'    => ['GET', 'POST', 'PUT', 'PATCH'],

            /**
             * A list of extensions.
             */
            'extensions' => [
                //Railt\CarbonExtension\Extension::class,
                //Extensions\Auth\Extension::class,
                Extensions\Exception\ExceptionReporter::class,
            ],
        ],
    ],
];
