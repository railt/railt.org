<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Entity Mangers
    |--------------------------------------------------------------------------
    |
    | Configure your Entity Managers here. You can set a different connection
    | and driver per manager and configure events and filters. Change the
    | paths setting to the appropriate path and replace App namespace
    | by your own namespace.
    |
    | Available meta drivers: fluent|annotations|yaml|xml|config|static_php|php
    |
    | Available connections: mysql|oracle|pgsql|sqlite|sqlsrv
    | (Connections can be configured in the database config)
    |
    | --> Warning: Proxy auto generation should only be enabled in dev!
    |
    */
    'managers'                   => [
        'default' => [
            'dev'        => \env('APP_DEBUG', false),
            'meta'       => \env('DOCTRINE_METADATA', 'yaml'),
            'connection' => \env('DB_CONNECTION', 'mysql'),
            'namespaces' => [],
            'paths'      => [
                \resource_path('mappings'),
            ],
            'repository' => \Doctrine\ORM\EntityRepository::class,
            'proxies'    => [
                'namespace'     => false,
                'path'          => \storage_path('proxies'),
                'auto_generate' => \env('APP_DEBUG', false),
            ],

            /*
            |--------------------------------------------------------------------------
            | Doctrine events
            |--------------------------------------------------------------------------
            |
            | The listener array expects the key to be a Doctrine event
            | e.g. Doctrine\ORM\Events::onFlush
            |
            */
            'events'     => [
                'listeners'   => [

                ],
                'subscribers' => [
                    \App\Subscribers\RendererSubscriber::class,
                ],
            ],

            'filters'       => [

            ],

            /*
            |--------------------------------------------------------------------------
            | Doctrine mapping types
            |--------------------------------------------------------------------------
            |
            | Link a Database Type to a Local Doctrine Type
            |
            | Using 'enum' => 'string' is the same of:
            | $doctrineManager->extendAll(function (\Doctrine\ORM\Configuration $configuration,
            |         \Doctrine\DBAL\Connection $connection,
            |         \Doctrine\Common\EventManager $eventManager) {
            |     $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
            | });
            |
            | References:
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/custom-mapping-types.html
            | http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html#custom-mapping-types
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
            | http://doctrine-orm.readthedocs.org/en/latest/reference/basic-mapping.html#reference-mapping-types
            | http://symfony.com/doc/current/cookbook/doctrine/dbal.html#registering-custom-mapping-types-in-the-schematool
            |--------------------------------------------------------------------------
            */
            'mapping_types' => [
                //'enum' => 'string'
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Doctrine Extensions
    |--------------------------------------------------------------------------
    |
    | Enable/disable Doctrine Extensions by adding or removing them from the list
    |
    | If you want to require custom extensions you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */
    'extensions'                 => [
        //LaravelDoctrine\ORM\Extensions\TablePrefix\TablePrefixExtension::class,
        //LaravelDoctrine\Extensions\Timestamps\TimestampableExtension::class,
        //LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension::class,
        //LaravelDoctrine\Extensions\Sluggable\SluggableExtension::class,
        //LaravelDoctrine\Extensions\Sortable\SortableExtension::class,
        //LaravelDoctrine\Extensions\Tree\TreeExtension::class,
        //LaravelDoctrine\Extensions\Loggable\LoggableExtension::class,
        //LaravelDoctrine\Extensions\Blameable\BlameableExtension::class,
        //LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension::class,
        //LaravelDoctrine\Extensions\Translatable\TranslatableExtension::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Doctrine custom types
    |--------------------------------------------------------------------------
    |
    | Create a custom or override a Doctrine Type
    |--------------------------------------------------------------------------
    */
    'custom_types'               => [
        'json'   => \LaravelDoctrine\ORM\Types\Json::class,
        'carbon' => \DoctrineExtensions\Types\CarbonDateTimeType::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | DQL custom datetime functions
    |--------------------------------------------------------------------------
    */
    'custom_datetime_functions'  => [],

    /*
    |--------------------------------------------------------------------------
    | DQL custom numeric functions
    |--------------------------------------------------------------------------
    */
    'custom_numeric_functions'   => [
        'acos'      => \DoctrineExtensions\Query\Mysql\Acos::class,
        'asin'      => \DoctrineExtensions\Query\Mysql\Asin::class,
        'atan2'     => \DoctrineExtensions\Query\Mysql\Atan2::class,
        'atan'      => \DoctrineExtensions\Query\Mysql\Atan::class,
        'bit_count' => \DoctrineExtensions\Query\Mysql\BitCount::class,
        'bit_xor'   => \DoctrineExtensions\Query\Mysql\BitXor::class,
        'ceil'      => \DoctrineExtensions\Query\Mysql\Ceil::class,
        'cos'       => \DoctrineExtensions\Query\Mysql\Cos::class,
        'cot'       => \DoctrineExtensions\Query\Mysql\Cot::class,
        'degrees'   => \DoctrineExtensions\Query\Mysql\Degrees::class,
        'exp'       => \DoctrineExtensions\Query\Mysql\Exp::class,
        'floor'     => \DoctrineExtensions\Query\Mysql\Floor::class,
        'log'       => \DoctrineExtensions\Query\Mysql\Log::class,
        'log10'     => \DoctrineExtensions\Query\Mysql\Log10::class,
        'log2'      => \DoctrineExtensions\Query\Mysql\Log2::class,
        'pi'        => \DoctrineExtensions\Query\Mysql\Pi::class,
        'power'     => \DoctrineExtensions\Query\Mysql\Power::class,
        'quarter'   => \DoctrineExtensions\Query\Mysql\Quarter::class,
        'radians'   => \DoctrineExtensions\Query\Mysql\Radians::class,
        'rand'      => \DoctrineExtensions\Query\Mysql\Rand::class,
        'round'     => \DoctrineExtensions\Query\Mysql\Round::class,
        'stddev'    => \DoctrineExtensions\Query\Mysql\StdDev::class,
        'sin'       => \DoctrineExtensions\Query\Mysql\Sin::class,
        'std'       => \DoctrineExtensions\Query\Mysql\Std::class,
        'tan'       => \DoctrineExtensions\Query\Mysql\Tan::class,
        'variance'  => \DoctrineExtensions\Query\Mysql\Variance::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | DQL custom string functions
    |--------------------------------------------------------------------------
    */
    'custom_string_functions'    => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Register custom hydrators
    |--------------------------------------------------------------------------
    */
    'custom_hydration_modes'     => [
        // e.g. 'hydrationModeName' => MyHydrator::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Enable query logging with laravel file logging,
    | debugbar, clockwork or an own implementation.
    | Setting it to false, will disable logging
    |
    | Available:
    | - LaravelDoctrine\ORM\Loggers\LaravelDebugbarLogger
    | - LaravelDoctrine\ORM\Loggers\ClockworkLogger
    | - LaravelDoctrine\ORM\Loggers\FileLogger
    |--------------------------------------------------------------------------
    */
    'logger'                     => \env('DOCTRINE_LOGGER', false),

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Configure meta-data, query and result caching here.
    | Optionally you can enable second level caching.
    |
    | Available: apc|array|file|memcached|redis|void
    |
    */
    'cache'                      => [
        'second_level' => false,
        'default'      => \env('DOCTRINE_CACHE', 'array'),
        'namespace'    => null,
        'metadata'     => [
            'driver'    => \env('DOCTRINE_METADATA_CACHE', \env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'query'        => [
            'driver'    => \env('DOCTRINE_QUERY_CACHE', \env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'result'       => [
            'driver'    => \env('DOCTRINE_RESULT_CACHE', \env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gedmo extensions
    |--------------------------------------------------------------------------
    |
    | Settings for Gedmo extensions
    | If you want to use this you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */
    'gedmo'                      => [
        'all_mappings' => false,
    ],

    /*
     |--------------------------------------------------------------------------
     | Validation
     |--------------------------------------------------------------------------
     |
     |  Enables the Doctrine Presence Verifier for Validation
     |
     */
    'doctrine_presence_verifier' => true,

    /*
     |--------------------------------------------------------------------------
     | Notifications
     |--------------------------------------------------------------------------
     |
     |  Doctrine notifications channel
     |
     */
    'notifications'              => [
        'channel' => 'database',
    ],
];
