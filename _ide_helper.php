<?php
/**
 * A helper file for Laravel 5, to provide autocomplete information to your IDE
 * Generated for Laravel 5.5.40 on 2018-03-31 00:57:55.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */

namespace Illuminate\Support\Facades { 

    class Artisan {
        
        /**
         * Run the console application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @return int 
         * @static 
         */ 
        public static function handle($input, $output = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::handle($input, $output);
        }
        
        /**
         * Terminate the application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param int $status
         * @return void 
         * @static 
         */ 
        public static function terminate($input, $status)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::terminate($input, $status);
        }
        
        /**
         * Register a Closure based command with the application.
         *
         * @param string $signature
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Console\ClosureCommand 
         * @static 
         */ 
        public static function command($signature, $callback)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::command($signature, $callback);
        }
        
        /**
         * Register the given command with the console application.
         *
         * @param \Symfony\Component\Console\Command\Command $command
         * @return void 
         * @static 
         */ 
        public static function registerCommand($command)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::registerCommand($command);
        }
        
        /**
         * Run an Artisan console command by name.
         *
         * @param string $command
         * @param array $parameters
         * @param \Symfony\Component\Console\Output\OutputInterface $outputBuffer
         * @return int 
         * @static 
         */ 
        public static function call($command, $parameters = array(), $outputBuffer = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::call($command, $parameters, $outputBuffer);
        }
        
        /**
         * Queue the given console command.
         *
         * @param string $command
         * @param array $parameters
         * @return \Illuminate\Foundation\Bus\PendingDispatch 
         * @static 
         */ 
        public static function queue($command, $parameters = array())
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::queue($command, $parameters);
        }
        
        /**
         * Get all of the commands registered with the console.
         *
         * @return array 
         * @static 
         */ 
        public static function all()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::all();
        }
        
        /**
         * Get the output for the last run command.
         *
         * @return string 
         * @static 
         */ 
        public static function output()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::output();
        }
        
        /**
         * Bootstrap the application for artisan commands.
         *
         * @return void 
         * @static 
         */ 
        public static function bootstrap()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::bootstrap();
        }
        
        /**
         * Set the Artisan application instance.
         *
         * @param \Illuminate\Console\Application $artisan
         * @return void 
         * @static 
         */ 
        public static function setArtisan($artisan)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::setArtisan($artisan);
        }
         
    }

    class DB {
        
        /**
         * Get a database connection instance.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function connection($name = null)
        {
            return \Illuminate\Database\DatabaseManager::connection($name);
        }
        
        /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function purge($name = null)
        {
            \Illuminate\Database\DatabaseManager::purge($name);
        }
        
        /**
         * Disconnect from the given database.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function disconnect($name = null)
        {
            \Illuminate\Database\DatabaseManager::disconnect($name);
        }
        
        /**
         * Reconnect to the given database.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function reconnect($name = null)
        {
            return \Illuminate\Database\DatabaseManager::reconnect($name);
        }
        
        /**
         * Get the default connection name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultConnection()
        {
            return \Illuminate\Database\DatabaseManager::getDefaultConnection();
        }
        
        /**
         * Set the default connection name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultConnection($name)
        {
            \Illuminate\Database\DatabaseManager::setDefaultConnection($name);
        }
        
        /**
         * Get all of the support drivers.
         *
         * @return array 
         * @static 
         */ 
        public static function supportedDrivers()
        {
            return \Illuminate\Database\DatabaseManager::supportedDrivers();
        }
        
        /**
         * Get all of the drivers that are actually available.
         *
         * @return array 
         * @static 
         */ 
        public static function availableDrivers()
        {
            return \Illuminate\Database\DatabaseManager::availableDrivers();
        }
        
        /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return void 
         * @static 
         */ 
        public static function extend($name, $resolver)
        {
            \Illuminate\Database\DatabaseManager::extend($name, $resolver);
        }
        
        /**
         * Return all of the created connections.
         *
         * @return array 
         * @static 
         */ 
        public static function getConnections()
        {
            return \Illuminate\Database\DatabaseManager::getConnections();
        }
        
        /**
         * Get a schema builder instance for the connection.
         *
         * @return \Illuminate\Database\Schema\MySqlBuilder 
         * @static 
         */ 
        public static function getSchemaBuilder()
        {
            return \Illuminate\Database\MySqlConnection::getSchemaBuilder();
        }
        
        /**
         * Bind values to their parameters in the given statement.
         *
         * @param \PDOStatement $statement
         * @param array $bindings
         * @return void 
         * @static 
         */ 
        public static function bindValues($statement, $bindings)
        {
            \Illuminate\Database\MySqlConnection::bindValues($statement, $bindings);
        }
        
        /**
         * Set the query grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultQueryGrammar();
        }
        
        /**
         * Set the schema grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultSchemaGrammar();
        }
        
        /**
         * Set the query post processor to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultPostProcessor();
        }
        
        /**
         * Begin a fluent query against a database table.
         *
         * @param string $table
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function table($table)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::table($table);
        }
        
        /**
         * Get a new query builder instance.
         *
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function query()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::query();
        }
        
        /**
         * Run a select statement and return a single result.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed 
         * @static 
         */ 
        public static function selectOne($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::selectOne($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function selectFromWriteConnection($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::selectFromWriteConnection($query, $bindings);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array 
         * @static 
         */ 
        public static function select($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::select($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database and returns a generator.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return \Generator 
         * @static 
         */ 
        public static function cursor($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::cursor($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run an insert statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function insert($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::insert($query, $bindings);
        }
        
        /**
         * Run an update statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function update($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::update($query, $bindings);
        }
        
        /**
         * Run a delete statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function delete($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::delete($query, $bindings);
        }
        
        /**
         * Execute an SQL statement and return the boolean result.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function statement($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::statement($query, $bindings);
        }
        
        /**
         * Run an SQL statement and get the number of rows affected.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function affectingStatement($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::affectingStatement($query, $bindings);
        }
        
        /**
         * Run a raw, unprepared query against the PDO connection.
         *
         * @param string $query
         * @return bool 
         * @static 
         */ 
        public static function unprepared($query)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::unprepared($query);
        }
        
        /**
         * Execute the given callback in "dry run" mode.
         *
         * @param \Closure $callback
         * @return array 
         * @static 
         */ 
        public static function pretend($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::pretend($callback);
        }
        
        /**
         * Prepare the query bindings for execution.
         *
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function prepareBindings($bindings)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::prepareBindings($bindings);
        }
        
        /**
         * Log a query in the connection's query log.
         *
         * @param string $query
         * @param array $bindings
         * @param float|null $time
         * @return void 
         * @static 
         */ 
        public static function logQuery($query, $bindings, $time = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::logQuery($query, $bindings, $time);
        }
        
        /**
         * Register a database query listener with the connection.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function listen($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::listen($callback);
        }
        
        /**
         * Get a new raw query expression.
         *
         * @param mixed $value
         * @return \Illuminate\Database\Query\Expression 
         * @static 
         */ 
        public static function raw($value)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::raw($value);
        }
        
        /**
         * Indicate if any records have been modified.
         *
         * @param bool $value
         * @return void 
         * @static 
         */ 
        public static function recordsHaveBeenModified($value = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::recordsHaveBeenModified($value);
        }
        
        /**
         * Is Doctrine available?
         *
         * @return bool 
         * @static 
         */ 
        public static function isDoctrineAvailable()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::isDoctrineAvailable();
        }
        
        /**
         * Get a Doctrine Schema Column instance.
         *
         * @param string $table
         * @param string $column
         * @return \Doctrine\DBAL\Schema\Column 
         * @static 
         */ 
        public static function getDoctrineColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineColumn($table, $column);
        }
        
        /**
         * Get the Doctrine DBAL schema manager for the connection.
         *
         * @return \Doctrine\DBAL\Schema\AbstractSchemaManager 
         * @static 
         */ 
        public static function getDoctrineSchemaManager()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineSchemaManager();
        }
        
        /**
         * Get the Doctrine DBAL database connection instance.
         *
         * @return \Doctrine\DBAL\Connection 
         * @static 
         */ 
        public static function getDoctrineConnection()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineConnection();
        }
        
        /**
         * Get the current PDO connection.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getPdo();
        }
        
        /**
         * Get the current PDO connection used for reading.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getReadPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getReadPdo();
        }
        
        /**
         * Set the PDO connection.
         *
         * @param \PDO|\Closure|null $pdo
         * @return $this 
         * @static 
         */ 
        public static function setPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setPdo($pdo);
        }
        
        /**
         * Set the PDO connection used for reading.
         *
         * @param \PDO|\Closure|null $pdo
         * @return $this 
         * @static 
         */ 
        public static function setReadPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setReadPdo($pdo);
        }
        
        /**
         * Set the reconnect instance on the connection.
         *
         * @param callable $reconnector
         * @return $this 
         * @static 
         */ 
        public static function setReconnector($reconnector)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setReconnector($reconnector);
        }
        
        /**
         * Get the database connection name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getName();
        }
        
        /**
         * Get an option from the configuration options.
         *
         * @param string|null $option
         * @return mixed 
         * @static 
         */ 
        public static function getConfig($option = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getConfig($option);
        }
        
        /**
         * Get the PDO driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDriverName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDriverName();
        }
        
        /**
         * Get the query grammar used by the connection.
         *
         * @return \Illuminate\Database\Query\Grammars\Grammar 
         * @static 
         */ 
        public static function getQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getQueryGrammar();
        }
        
        /**
         * Set the query grammar used by the connection.
         *
         * @param \Illuminate\Database\Query\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */ 
        public static function setQueryGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setQueryGrammar($grammar);
        }
        
        /**
         * Get the schema grammar used by the connection.
         *
         * @return \Illuminate\Database\Schema\Grammars\Grammar 
         * @static 
         */ 
        public static function getSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getSchemaGrammar();
        }
        
        /**
         * Set the schema grammar used by the connection.
         *
         * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */ 
        public static function setSchemaGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setSchemaGrammar($grammar);
        }
        
        /**
         * Get the query post processor used by the connection.
         *
         * @return \Illuminate\Database\Query\Processors\Processor 
         * @static 
         */ 
        public static function getPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getPostProcessor();
        }
        
        /**
         * Set the query post processor used by the connection.
         *
         * @param \Illuminate\Database\Query\Processors\Processor $processor
         * @return void 
         * @static 
         */ 
        public static function setPostProcessor($processor)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setPostProcessor($processor);
        }
        
        /**
         * Get the event dispatcher used by the connection.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance on the connection.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setEventDispatcher($events)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setEventDispatcher($events);
        }
        
        /**
         * Determine if the connection in a "dry run".
         *
         * @return bool 
         * @static 
         */ 
        public static function pretending()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::pretending();
        }
        
        /**
         * Get the connection query log.
         *
         * @return array 
         * @static 
         */ 
        public static function getQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getQueryLog();
        }
        
        /**
         * Clear the query log.
         *
         * @return void 
         * @static 
         */ 
        public static function flushQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::flushQueryLog();
        }
        
        /**
         * Enable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function enableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::enableQueryLog();
        }
        
        /**
         * Disable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function disableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::disableQueryLog();
        }
        
        /**
         * Determine whether we're logging queries.
         *
         * @return bool 
         * @static 
         */ 
        public static function logging()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::logging();
        }
        
        /**
         * Get the name of the connected database.
         *
         * @return string 
         * @static 
         */ 
        public static function getDatabaseName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDatabaseName();
        }
        
        /**
         * Set the name of the connected database.
         *
         * @param string $database
         * @return string 
         * @static 
         */ 
        public static function setDatabaseName($database)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setDatabaseName($database);
        }
        
        /**
         * Get the table prefix for the connection.
         *
         * @return string 
         * @static 
         */ 
        public static function getTablePrefix()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getTablePrefix();
        }
        
        /**
         * Set the table prefix in use by the connection.
         *
         * @param string $prefix
         * @return void 
         * @static 
         */ 
        public static function setTablePrefix($prefix)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setTablePrefix($prefix);
        }
        
        /**
         * Set the table prefix and return the grammar.
         *
         * @param \Illuminate\Database\Grammar $grammar
         * @return \Illuminate\Database\Grammar 
         * @static 
         */ 
        public static function withTablePrefix($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::withTablePrefix($grammar);
        }
        
        /**
         * Register a connection resolver.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function resolverFor($driver, $callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::resolverFor($driver, $callback);
        }
        
        /**
         * Get the connection resolver for the given driver.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */ 
        public static function getResolver($driver)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getResolver($driver);
        }
        
        /**
         * Execute a Closure within a transaction.
         *
         * @param \Closure $callback
         * @param int $attempts
         * @return mixed 
         * @throws \Exception|\Throwable
         * @static 
         */ 
        public static function transaction($callback, $attempts = 1)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::transaction($callback, $attempts);
        }
        
        /**
         * Start a new database transaction.
         *
         * @return void 
         * @throws \Exception
         * @static 
         */ 
        public static function beginTransaction()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::beginTransaction();
        }
        
        /**
         * Commit the active database transaction.
         *
         * @return void 
         * @static 
         */ 
        public static function commit()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::commit();
        }
        
        /**
         * Rollback the active database transaction.
         *
         * @param int|null $toLevel
         * @return void 
         * @static 
         */ 
        public static function rollBack($toLevel = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::rollBack($toLevel);
        }
        
        /**
         * Get the number of active transactions.
         *
         * @return int 
         * @static 
         */ 
        public static function transactionLevel()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::transactionLevel();
        }
         
    }

    class Log {
        
        /**
         * Adds a log record at the DEBUG level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function debug($message, $context = array())
        {
            return \Monolog\Logger::debug($message, $context);
        }
        
        /**
         * Adds a log record at the INFO level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function info($message, $context = array())
        {
            return \Monolog\Logger::info($message, $context);
        }
        
        /**
         * Adds a log record at the NOTICE level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function notice($message, $context = array())
        {
            return \Monolog\Logger::notice($message, $context);
        }
        
        /**
         * Adds a log record at the WARNING level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function warning($message, $context = array())
        {
            return \Monolog\Logger::warning($message, $context);
        }
        
        /**
         * Adds a log record at the ERROR level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function error($message, $context = array())
        {
            return \Monolog\Logger::error($message, $context);
        }
        
        /**
         * Adds a log record at the CRITICAL level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function critical($message, $context = array())
        {
            return \Monolog\Logger::critical($message, $context);
        }
        
        /**
         * Adds a log record at the ALERT level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function alert($message, $context = array())
        {
            return \Monolog\Logger::alert($message, $context);
        }
        
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */ 
        public static function emergency($message, $context = array())
        {
            return \Monolog\Logger::emergency($message, $context);
        }
        
        /**
         * Log a message to the logs.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function log($level, $message, $context = array())
        {
            \Illuminate\Log\Writer::log($level, $message, $context);
        }
        
        /**
         * Dynamically pass log calls into the writer.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function write($level, $message, $context = array())
        {
            \Illuminate\Log\Writer::write($level, $message, $context);
        }
        
        /**
         * Register a file log handler.
         *
         * @param string $path
         * @param string $level
         * @return void 
         * @static 
         */ 
        public static function useFiles($path, $level = 'debug')
        {
            \Illuminate\Log\Writer::useFiles($path, $level);
        }
        
        /**
         * Register a daily file log handler.
         *
         * @param string $path
         * @param int $days
         * @param string $level
         * @return void 
         * @static 
         */ 
        public static function useDailyFiles($path, $days = 0, $level = 'debug')
        {
            \Illuminate\Log\Writer::useDailyFiles($path, $days, $level);
        }
        
        /**
         * Register a Syslog handler.
         *
         * @param string $name
         * @param string $level
         * @param mixed $facility
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function useSyslog($name = 'laravel', $level = 'debug', $facility = 8)
        {
            return \Illuminate\Log\Writer::useSyslog($name, $level, $facility);
        }
        
        /**
         * Register an error_log handler.
         *
         * @param string $level
         * @param int $messageType
         * @return void 
         * @static 
         */ 
        public static function useErrorLog($level = 'debug', $messageType = 0)
        {
            \Illuminate\Log\Writer::useErrorLog($level, $messageType);
        }
        
        /**
         * Register a new callback handler for when a log event is triggered.
         *
         * @param \Closure $callback
         * @return void 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function listen($callback)
        {
            \Illuminate\Log\Writer::listen($callback);
        }
        
        /**
         * Get the underlying Monolog instance.
         *
         * @return \Monolog\Logger 
         * @static 
         */ 
        public static function getMonolog()
        {
            return \Illuminate\Log\Writer::getMonolog();
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getEventDispatcher()
        {
            return \Illuminate\Log\Writer::getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
         * @return void 
         * @static 
         */ 
        public static function setEventDispatcher($dispatcher)
        {
            \Illuminate\Log\Writer::setEventDispatcher($dispatcher);
        }
         
    }

    class Route {
        
        /**
         * Register a new GET route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function get($uri, $action = null)
        {
            return \Illuminate\Routing\Router::get($uri, $action);
        }
        
        /**
         * Register a new POST route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function post($uri, $action = null)
        {
            return \Illuminate\Routing\Router::post($uri, $action);
        }
        
        /**
         * Register a new PUT route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function put($uri, $action = null)
        {
            return \Illuminate\Routing\Router::put($uri, $action);
        }
        
        /**
         * Register a new PATCH route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function patch($uri, $action = null)
        {
            return \Illuminate\Routing\Router::patch($uri, $action);
        }
        
        /**
         * Register a new DELETE route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function delete($uri, $action = null)
        {
            return \Illuminate\Routing\Router::delete($uri, $action);
        }
        
        /**
         * Register a new OPTIONS route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function options($uri, $action = null)
        {
            return \Illuminate\Routing\Router::options($uri, $action);
        }
        
        /**
         * Register a new route responding to all verbs.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function any($uri, $action = null)
        {
            return \Illuminate\Routing\Router::any($uri, $action);
        }
        
        /**
         * Register a new Fallback route with the router.
         *
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function fallback($action)
        {
            return \Illuminate\Routing\Router::fallback($action);
        }
        
        /**
         * Create a redirect from one URI to another.
         *
         * @param string $uri
         * @param string $destination
         * @param int $status
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function redirect($uri, $destination, $status = 301)
        {
            return \Illuminate\Routing\Router::redirect($uri, $destination, $status);
        }
        
        /**
         * Register a new route that returns a view.
         *
         * @param string $uri
         * @param string $view
         * @param array $data
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function view($uri, $view, $data = array())
        {
            return \Illuminate\Routing\Router::view($uri, $view, $data);
        }
        
        /**
         * Register a new route with the given verbs.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function match($methods, $uri, $action = null)
        {
            return \Illuminate\Routing\Router::match($methods, $uri, $action);
        }
        
        /**
         * Register an array of resource controllers.
         *
         * @param array $resources
         * @return void 
         * @static 
         */ 
        public static function resources($resources)
        {
            \Illuminate\Routing\Router::resources($resources);
        }
        
        /**
         * Route a resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function resource($name, $controller, $options = array())
        {
            return \Illuminate\Routing\Router::resource($name, $controller, $options);
        }
        
        /**
         * Register an array of API resource controllers.
         *
         * @param array $resources
         * @return void 
         * @static 
         */ 
        public static function apiResources($resources)
        {
            \Illuminate\Routing\Router::apiResources($resources);
        }
        
        /**
         * Route an API resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function apiResource($name, $controller, $options = array())
        {
            return \Illuminate\Routing\Router::apiResource($name, $controller, $options);
        }
        
        /**
         * Create a route group with shared attributes.
         *
         * @param array $attributes
         * @param \Closure|string $routes
         * @return void 
         * @static 
         */ 
        public static function group($attributes, $routes)
        {
            \Illuminate\Routing\Router::group($attributes, $routes);
        }
        
        /**
         * Merge the given array with the last group stack.
         *
         * @param array $new
         * @return array 
         * @static 
         */ 
        public static function mergeWithLastGroup($new)
        {
            return \Illuminate\Routing\Router::mergeWithLastGroup($new);
        }
        
        /**
         * Get the prefix from the last group on the stack.
         *
         * @return string 
         * @static 
         */ 
        public static function getLastGroupPrefix()
        {
            return \Illuminate\Routing\Router::getLastGroupPrefix();
        }
        
        /**
         * Return the response returned by the given route.
         *
         * @param string $name
         * @return mixed 
         * @static 
         */ 
        public static function respondWithRoute($name)
        {
            return \Illuminate\Routing\Router::respondWithRoute($name);
        }
        
        /**
         * Dispatch the request to the application.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function dispatch($request)
        {
            return \Illuminate\Routing\Router::dispatch($request);
        }
        
        /**
         * Dispatch the request to a route and return the response.
         *
         * @param \Illuminate\Http\Request $request
         * @return mixed 
         * @static 
         */ 
        public static function dispatchToRoute($request)
        {
            return \Illuminate\Routing\Router::dispatchToRoute($request);
        }
        
        /**
         * Gather the middleware for the given route with resolved class names.
         *
         * @param \Illuminate\Routing\Route $route
         * @return array 
         * @static 
         */ 
        public static function gatherRouteMiddleware($route)
        {
            return \Illuminate\Routing\Router::gatherRouteMiddleware($route);
        }
        
        /**
         * Create a response instance from the given value.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function prepareResponse($request, $response)
        {
            return \Illuminate\Routing\Router::prepareResponse($request, $response);
        }
        
        /**
         * Static version of prepareResponse.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function toResponse($request, $response)
        {
            return \Illuminate\Routing\Router::toResponse($request, $response);
        }
        
        /**
         * Substitute the route bindings onto the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function substituteBindings($route)
        {
            return \Illuminate\Routing\Router::substituteBindings($route);
        }
        
        /**
         * Substitute the implicit Eloquent model bindings for the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return void 
         * @static 
         */ 
        public static function substituteImplicitBindings($route)
        {
            \Illuminate\Routing\Router::substituteImplicitBindings($route);
        }
        
        /**
         * Register a route matched event listener.
         *
         * @param string|callable $callback
         * @return void 
         * @static 
         */ 
        public static function matched($callback)
        {
            \Illuminate\Routing\Router::matched($callback);
        }
        
        /**
         * Get all of the defined middleware short-hand names.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddleware()
        {
            return \Illuminate\Routing\Router::getMiddleware();
        }
        
        /**
         * Register a short-hand name for a middleware.
         *
         * @param string $name
         * @param string $class
         * @return $this 
         * @static 
         */ 
        public static function aliasMiddleware($name, $class)
        {
            return \Illuminate\Routing\Router::aliasMiddleware($name, $class);
        }
        
        /**
         * Check if a middlewareGroup with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMiddlewareGroup($name)
        {
            return \Illuminate\Routing\Router::hasMiddlewareGroup($name);
        }
        
        /**
         * Get all of the defined middleware groups.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddlewareGroups()
        {
            return \Illuminate\Routing\Router::getMiddlewareGroups();
        }
        
        /**
         * Register a group of middleware.
         *
         * @param string $name
         * @param array $middleware
         * @return $this 
         * @static 
         */ 
        public static function middlewareGroup($name, $middleware)
        {
            return \Illuminate\Routing\Router::middlewareGroup($name, $middleware);
        }
        
        /**
         * Add a middleware to the beginning of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return $this 
         * @static 
         */ 
        public static function prependMiddlewareToGroup($group, $middleware)
        {
            return \Illuminate\Routing\Router::prependMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Add a middleware to the end of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return $this 
         * @static 
         */ 
        public static function pushMiddlewareToGroup($group, $middleware)
        {
            return \Illuminate\Routing\Router::pushMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Add a new route parameter binder.
         *
         * @param string $key
         * @param string|callable $binder
         * @return void 
         * @static 
         */ 
        public static function bind($key, $binder)
        {
            \Illuminate\Routing\Router::bind($key, $binder);
        }
        
        /**
         * Register a model binder for a wildcard.
         *
         * @param string $key
         * @param string $class
         * @param \Closure|null $callback
         * @return void 
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
         * @static 
         */ 
        public static function model($key, $class, $callback = null)
        {
            \Illuminate\Routing\Router::model($key, $class, $callback);
        }
        
        /**
         * Get the binding callback for a given binding.
         *
         * @param string $key
         * @return \Closure|null 
         * @static 
         */ 
        public static function getBindingCallback($key)
        {
            return \Illuminate\Routing\Router::getBindingCallback($key);
        }
        
        /**
         * Get the global "where" patterns.
         *
         * @return array 
         * @static 
         */ 
        public static function getPatterns()
        {
            return \Illuminate\Routing\Router::getPatterns();
        }
        
        /**
         * Set a global where pattern on all routes.
         *
         * @param string $key
         * @param string $pattern
         * @return void 
         * @static 
         */ 
        public static function pattern($key, $pattern)
        {
            \Illuminate\Routing\Router::pattern($key, $pattern);
        }
        
        /**
         * Set a group of global where patterns on all routes.
         *
         * @param array $patterns
         * @return void 
         * @static 
         */ 
        public static function patterns($patterns)
        {
            \Illuminate\Routing\Router::patterns($patterns);
        }
        
        /**
         * Determine if the router currently has a group stack.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasGroupStack()
        {
            return \Illuminate\Routing\Router::hasGroupStack();
        }
        
        /**
         * Get the current group stack for the router.
         *
         * @return array 
         * @static 
         */ 
        public static function getGroupStack()
        {
            return \Illuminate\Routing\Router::getGroupStack();
        }
        
        /**
         * Get a route parameter for the current route.
         *
         * @param string $key
         * @param string $default
         * @return mixed 
         * @static 
         */ 
        public static function input($key, $default = null)
        {
            return \Illuminate\Routing\Router::input($key, $default);
        }
        
        /**
         * Get the request currently being dispatched.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function getCurrentRequest()
        {
            return \Illuminate\Routing\Router::getCurrentRequest();
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function getCurrentRoute()
        {
            return \Illuminate\Routing\Router::getCurrentRoute();
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function current()
        {
            return \Illuminate\Routing\Router::current();
        }
        
        /**
         * Check if a route with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function has($name)
        {
            return \Illuminate\Routing\Router::has($name);
        }
        
        /**
         * Get the current route name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteName()
        {
            return \Illuminate\Routing\Router::currentRouteName();
        }
        
        /**
         * Alias for the "currentRouteNamed" method.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function is($patterns = null)
        {
            return \Illuminate\Routing\Router::is($patterns);
        }
        
        /**
         * Determine if the current route matches a pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function currentRouteNamed($patterns = null)
        {
            return \Illuminate\Routing\Router::currentRouteNamed($patterns);
        }
        
        /**
         * Get the current route action.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteAction()
        {
            return \Illuminate\Routing\Router::currentRouteAction();
        }
        
        /**
         * Alias for the "currentRouteUses" method.
         *
         * @param array $patterns
         * @return bool 
         * @static 
         */ 
        public static function uses($patterns = null)
        {
            return \Illuminate\Routing\Router::uses($patterns);
        }
        
        /**
         * Determine if the current route action matches a given action.
         *
         * @param string $action
         * @return bool 
         * @static 
         */ 
        public static function currentRouteUses($action)
        {
            return \Illuminate\Routing\Router::currentRouteUses($action);
        }
        
        /**
         * Register the typical authentication routes for an application.
         *
         * @return void 
         * @static 
         */ 
        public static function auth()
        {
            \Illuminate\Routing\Router::auth();
        }
        
        /**
         * Set the unmapped global resource parameters to singular.
         *
         * @param bool $singular
         * @return void 
         * @static 
         */ 
        public static function singularResourceParameters($singular = true)
        {
            \Illuminate\Routing\Router::singularResourceParameters($singular);
        }
        
        /**
         * Set the global resource parameter mapping.
         *
         * @param array $parameters
         * @return void 
         * @static 
         */ 
        public static function resourceParameters($parameters = array())
        {
            \Illuminate\Routing\Router::resourceParameters($parameters);
        }
        
        /**
         * Get or set the verbs used in the resource URIs.
         *
         * @param array $verbs
         * @return array|null 
         * @static 
         */ 
        public static function resourceVerbs($verbs = array())
        {
            return \Illuminate\Routing\Router::resourceVerbs($verbs);
        }
        
        /**
         * Get the underlying route collection.
         *
         * @return \Illuminate\Routing\RouteCollection 
         * @static 
         */ 
        public static function getRoutes()
        {
            return \Illuminate\Routing\Router::getRoutes();
        }
        
        /**
         * Set the route collection instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return void 
         * @static 
         */ 
        public static function setRoutes($routes)
        {
            \Illuminate\Routing\Router::setRoutes($routes);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
            \Illuminate\Routing\Router::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @static 
         */ 
        public static function mixin($mixin)
        {
            \Illuminate\Routing\Router::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
            return \Illuminate\Routing\Router::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
            return \Illuminate\Routing\Router::macroCall($method, $parameters);
        }
         
    }

    class Schema {
        
        /**
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool 
         * @static 
         */ 
        public static function hasTable($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::hasTable($table);
        }
        
        /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array 
         * @static 
         */ 
        public static function getColumnListing($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnListing($table);
        }
        
        /**
         * Drop all tables from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllTables()
        {
            \Illuminate\Database\Schema\MySqlBuilder::dropAllTables();
        }
        
        /**
         * Set the default string length for migrations.
         *
         * @param int $length
         * @return void 
         * @static 
         */ 
        public static function defaultStringLength($length)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::defaultStringLength($length);
        }
        
        /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool 
         * @static 
         */ 
        public static function hasColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumn($table, $column);
        }
        
        /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool 
         * @static 
         */ 
        public static function hasColumns($table, $columns)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumns($table, $columns);
        }
        
        /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string 
         * @static 
         */ 
        public static function getColumnType($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnType($table, $column);
        }
        
        /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function table($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::table($table, $callback);
        }
        
        /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function create($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::create($table, $callback);
        }
        
        /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function drop($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::drop($table);
        }
        
        /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function dropIfExists($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::dropIfExists($table);
        }
        
        /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return void 
         * @static 
         */ 
        public static function rename($from, $to)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::rename($from, $to);
        }
        
        /**
         * Enable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function enableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::enableForeignKeyConstraints();
        }
        
        /**
         * Disable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function disableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::disableForeignKeyConstraints();
        }
        
        /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function getConnection()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getConnection();
        }
        
        /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return $this 
         * @static 
         */ 
        public static function setConnection($connection)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::setConnection($connection);
        }
        
        /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function blueprintResolver($resolver)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::blueprintResolver($resolver);
        }
         
    }
 
}

namespace Barryvdh\Debugbar { 

    class Facade {
        
        /**
         * Enable the Debugbar and boot, if not already booted.
         *
         * @static 
         */ 
        public static function enable()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::enable();
        }
        
        /**
         * Boot the debugbar (add collectors, renderer and listener)
         *
         * @static 
         */ 
        public static function boot()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::boot();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function shouldCollect($name, $default = false)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::shouldCollect($name, $default);
        }
        
        /**
         * Adds a data collector
         *
         * @param \Barryvdh\Debugbar\DataCollectorInterface $collector
         * @throws DebugBarException
         * @return $this 
         * @static 
         */ 
        public static function addCollector($collector)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addCollector($collector);
        }
        
        /**
         * Handle silenced errors
         *
         * @param $level
         * @param $message
         * @param string $file
         * @param int $line
         * @param array $context
         * @throws \ErrorException
         * @static 
         */ 
        public static function handleError($level, $message, $file = '', $line = 0, $context = array())
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::handleError($level, $message, $file, $line, $context);
        }
        
        /**
         * Starts a measure
         *
         * @param string $name Internal name, used to stop the measure
         * @param string $label Public name
         * @static 
         */ 
        public static function startMeasure($name, $label = null)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::startMeasure($name, $label);
        }
        
        /**
         * Stops a measure
         *
         * @param string $name
         * @static 
         */ 
        public static function stopMeasure($name)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::stopMeasure($name);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @deprecated in favor of addThrowable
         * @static 
         */ 
        public static function addException($e)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addException($e);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @static 
         */ 
        public static function addThrowable($e)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addThrowable($e);
        }
        
        /**
         * Returns a JavascriptRenderer for this instance
         *
         * @param string $baseUrl
         * @param string $basePathng
         * @return \Barryvdh\Debugbar\JavascriptRenderer 
         * @static 
         */ 
        public static function getJavascriptRenderer($baseUrl = null, $basePath = null)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::getJavascriptRenderer($baseUrl, $basePath);
        }
        
        /**
         * Modify the response and inject the debugbar (or data in headers)
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param \Symfony\Component\HttpFoundation\Response $response
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function modifyResponse($request, $response)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::modifyResponse($request, $response);
        }
        
        /**
         * Check if the Debugbar is enabled
         *
         * @return boolean 
         * @static 
         */ 
        public static function isEnabled()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::isEnabled();
        }
        
        /**
         * Collects the data from the collectors
         *
         * @return array 
         * @static 
         */ 
        public static function collect()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::collect();
        }
        
        /**
         * Injects the web debug toolbar into the given Response.
         *
         * @param \Symfony\Component\HttpFoundation\Response $response A Response instance
         * Based on https://github.com/symfony/WebProfilerBundle/blob/master/EventListener/WebDebugToolbarListener.php
         * @static 
         */ 
        public static function injectDebugbar($response)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::injectDebugbar($response);
        }
        
        /**
         * Disable the Debugbar
         *
         * @static 
         */ 
        public static function disable()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::disable();
        }
        
        /**
         * Adds a measure
         *
         * @param string $label
         * @param float $start
         * @param float $end
         * @static 
         */ 
        public static function addMeasure($label, $start, $end)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addMeasure($label, $start, $end);
        }
        
        /**
         * Utility function to measure the execution of a Closure
         *
         * @param string $label
         * @param \Closure $closure
         * @static 
         */ 
        public static function measure($label, $closure)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::measure($label, $closure);
        }
        
        /**
         * Collect data in a CLI request
         *
         * @return array 
         * @static 
         */ 
        public static function collectConsole()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::collectConsole();
        }
        
        /**
         * Adds a message to the MessagesCollector
         * 
         * A message can be anything from an object to a string
         *
         * @param mixed $message
         * @param string $label
         * @static 
         */ 
        public static function addMessage($message, $label = 'info')
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addMessage($message, $label);
        }
        
        /**
         * Checks if a data collector has been added
         *
         * @param string $name
         * @return boolean 
         * @static 
         */ 
        public static function hasCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::hasCollector($name);
        }
        
        /**
         * Returns a data collector
         *
         * @param string $name
         * @return \DebugBar\DataCollectorInterface 
         * @throws DebugBarException
         * @static 
         */ 
        public static function getCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCollector($name);
        }
        
        /**
         * Returns an array of all data collectors
         *
         * @return \DebugBar\array[DataCollectorInterface] 
         * @static 
         */ 
        public static function getCollectors()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCollectors();
        }
        
        /**
         * Sets the request id generator
         *
         * @param \DebugBar\RequestIdGeneratorInterface $generator
         * @return $this 
         * @static 
         */ 
        public static function setRequestIdGenerator($generator)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setRequestIdGenerator($generator);
        }
        
        /**
         * 
         *
         * @return \DebugBar\RequestIdGeneratorInterface 
         * @static 
         */ 
        public static function getRequestIdGenerator()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getRequestIdGenerator();
        }
        
        /**
         * Returns the id of the current request
         *
         * @return string 
         * @static 
         */ 
        public static function getCurrentRequestId()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCurrentRequestId();
        }
        
        /**
         * Sets the storage backend to use to store the collected data
         *
         * @param \DebugBar\StorageInterface $storage
         * @return $this 
         * @static 
         */ 
        public static function setStorage($storage = null)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStorage($storage);
        }
        
        /**
         * 
         *
         * @return \DebugBar\StorageInterface 
         * @static 
         */ 
        public static function getStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStorage();
        }
        
        /**
         * Checks if the data will be persisted
         *
         * @return boolean 
         * @static 
         */ 
        public static function isDataPersisted()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::isDataPersisted();
        }
        
        /**
         * Sets the HTTP driver
         *
         * @param \DebugBar\HttpDriverInterface $driver
         * @return $this 
         * @static 
         */ 
        public static function setHttpDriver($driver)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setHttpDriver($driver);
        }
        
        /**
         * Returns the HTTP driver
         * 
         * If no http driver where defined, a PhpHttpDriver is automatically created
         *
         * @return \DebugBar\HttpDriverInterface 
         * @static 
         */ 
        public static function getHttpDriver()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getHttpDriver();
        }
        
        /**
         * Returns collected data
         * 
         * Will collect the data if none have been collected yet
         *
         * @return array 
         * @static 
         */ 
        public static function getData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getData();
        }
        
        /**
         * Returns an array of HTTP headers containing the data
         *
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return array 
         * @static 
         */ 
        public static function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getDataAsHeaders($headerName, $maxHeaderLength, $maxTotalHeaderLength);
        }
        
        /**
         * Sends the data through the HTTP headers
         *
         * @param bool $useOpenHandler
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return $this 
         * @static 
         */ 
        public static function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::sendDataInHeaders($useOpenHandler, $headerName, $maxHeaderLength);
        }
        
        /**
         * Stacks the data in the session for later rendering
         *
         * @static 
         */ 
        public static function stackData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::stackData();
        }
        
        /**
         * Checks if there is stacked data in the session
         *
         * @return boolean 
         * @static 
         */ 
        public static function hasStackedData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::hasStackedData();
        }
        
        /**
         * Returns the data stacked in the session
         *
         * @param boolean $delete Whether to delete the data in the session
         * @return array 
         * @static 
         */ 
        public static function getStackedData($delete = true)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStackedData($delete);
        }
        
        /**
         * Sets the key to use in the $_SESSION array
         *
         * @param string $ns
         * @return $this 
         * @static 
         */ 
        public static function setStackDataSessionNamespace($ns)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStackDataSessionNamespace($ns);
        }
        
        /**
         * Returns the key used in the $_SESSION array
         *
         * @return string 
         * @static 
         */ 
        public static function getStackDataSessionNamespace()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStackDataSessionNamespace();
        }
        
        /**
         * Sets whether to only use the session to store stacked data even
         * if a storage is enabled
         *
         * @param boolean $enabled
         * @return $this 
         * @static 
         */ 
        public static function setStackAlwaysUseSessionStorage($enabled = true)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStackAlwaysUseSessionStorage($enabled);
        }
        
        /**
         * Checks if the session is always used to store stacked data
         * even if a storage is enabled
         *
         * @return boolean 
         * @static 
         */ 
        public static function isStackAlwaysUseSessionStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::isStackAlwaysUseSessionStorage();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetSet($key, $value)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetSet($key, $value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetGet($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetGet($key);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetExists($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetExists($key);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetUnset($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetUnset($key);
        }
         
    }
 
}

namespace Clockwork\Support\Laravel { 

    class Facade {
        
        /**
         * Add a new data source
         *
         * @static 
         */ 
        public static function addDataSource($dataSource)
        {
            return \Clockwork\Clockwork::addDataSource($dataSource);
        }
        
        /**
         * Return array of all added data sources
         *
         * @static 
         */ 
        public static function getDataSources()
        {
            return \Clockwork\Clockwork::getDataSources();
        }
        
        /**
         * Return the request object
         *
         * @static 
         */ 
        public static function getRequest()
        {
            return \Clockwork\Clockwork::getRequest();
        }
        
        /**
         * Set a custom request object
         *
         * @static 
         */ 
        public static function setRequest($request)
        {
            return \Clockwork\Clockwork::setRequest($request);
        }
        
        /**
         * Add data from all data sources to request
         *
         * @static 
         */ 
        public static function resolveRequest()
        {
            return \Clockwork\Clockwork::resolveRequest();
        }
        
        /**
         * Store request via storage object
         *
         * @static 
         */ 
        public static function storeRequest()
        {
            return \Clockwork\Clockwork::storeRequest();
        }
        
        /**
         * Return the storage object
         *
         * @static 
         */ 
        public static function getStorage()
        {
            return \Clockwork\Clockwork::getStorage();
        }
        
        /**
         * Set a custom storage object
         *
         * @static 
         */ 
        public static function setStorage($storage)
        {
            return \Clockwork\Clockwork::setStorage($storage);
        }
        
        /**
         * Return the log instance
         *
         * @static 
         */ 
        public static function getLog()
        {
            return \Clockwork\Clockwork::getLog();
        }
        
        /**
         * Set a custom log instance
         *
         * @static 
         */ 
        public static function setLog($log)
        {
            return \Clockwork\Clockwork::setLog($log);
        }
        
        /**
         * Return the timeline instance
         *
         * @static 
         */ 
        public static function getTimeline()
        {
            return \Clockwork\Clockwork::getTimeline();
        }
        
        /**
         * Set a custom timeline instance
         *
         * @static 
         */ 
        public static function setTimeline($timeline)
        {
            return \Clockwork\Clockwork::setTimeline($timeline);
        }
        
        /**
         * Shortcut methods for the current log instance
         *
         * @static 
         */ 
        public static function log($level, $message, $context = array())
        {
            return \Clockwork\Clockwork::log($level, $message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function emergency($message, $context = array())
        {
            return \Clockwork\Clockwork::emergency($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function alert($message, $context = array())
        {
            return \Clockwork\Clockwork::alert($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function critical($message, $context = array())
        {
            return \Clockwork\Clockwork::critical($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function error($message, $context = array())
        {
            return \Clockwork\Clockwork::error($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function warning($message, $context = array())
        {
            return \Clockwork\Clockwork::warning($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function notice($message, $context = array())
        {
            return \Clockwork\Clockwork::notice($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function info($message, $context = array())
        {
            return \Clockwork\Clockwork::info($message, $context);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function debug($message, $context = array())
        {
            return \Clockwork\Clockwork::debug($message, $context);
        }
        
        /**
         * Shortcut methods for the current timeline instance
         *
         * @static 
         */ 
        public static function startEvent($name, $description, $time = null)
        {
            return \Clockwork\Clockwork::startEvent($name, $description, $time);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function endEvent($name)
        {
            return \Clockwork\Clockwork::endEvent($name);
        }
         
    }
 
}

namespace LaravelDoctrine\ORM\Facades { 

    class Registry {
        
        /**
         * 
         *
         * @param $manager
         * @param array $settings
         * @static 
         */ 
        public static function addManager($manager, $settings = array())
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::addManager($manager, $settings);
        }
        
        /**
         * 
         *
         * @param $connection
         * @param array $settings
         * @static 
         */ 
        public static function addConnection($connection, $settings = array())
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::addConnection($connection, $settings);
        }
        
        /**
         * Gets the default connection name.
         *
         * @return string The default connection name.
         * @static 
         */ 
        public static function getDefaultConnectionName()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getDefaultConnectionName();
        }
        
        /**
         * Gets the named connection.
         *
         * @param string $name The connection name (null for the default one).
         * @return object 
         * @static 
         */ 
        public static function getConnection($name = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getConnection($name);
        }
        
        /**
         * 
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function connectionExists($name)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::connectionExists($name);
        }
        
        /**
         * Gets an array of all registered connections.
         *
         * @return array An array of Connection instances.
         * @static 
         */ 
        public static function getConnections()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getConnections();
        }
        
        /**
         * Gets all connection names.
         *
         * @return array An array of connection names.
         * @static 
         */ 
        public static function getConnectionNames()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getConnectionNames();
        }
        
        /**
         * Gets the default object manager name.
         *
         * @return string The default object manager name.
         * @static 
         */ 
        public static function getDefaultManagerName()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getDefaultManagerName();
        }
        
        /**
         * Gets a named object manager.
         *
         * @param string $name The object manager name (null for the default one).
         * @return \Doctrine\Common\Persistence\ObjectManager 
         * @static 
         */ 
        public static function getManager($name = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getManager($name);
        }
        
        /**
         * 
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function managerExists($name)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::managerExists($name);
        }
        
        /**
         * Gets all connection names.
         *
         * @return array An array of connection names.
         * @static 
         */ 
        public static function getManagerNames()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getManagerNames();
        }
        
        /**
         * Gets an array of all registered object managers.
         *
         * @return \Doctrine\Common\Persistence\ObjectManager[] An array of ObjectManager instances
         * @static 
         */ 
        public static function getManagers()
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getManagers();
        }
        
        /**
         * Resets a named object manager.
         * 
         * This method is useful when an object manager has been closed
         * because of a rollbacked transaction AND when you think that
         * it makes sense to get a new one to replace the closed one.
         * Be warned that you will get a brand new object manager as
         * the existing one is not useable anymore. This means that any
         * other object with a dependency on this object manager will
         * hold an obsolete reference. You can inject the registry instead
         * to avoid this problem.
         *
         * @param string|null $name The object manager name (null for the default one).
         * @return \Doctrine\Common\Persistence\ObjectManager 
         * @static 
         */ 
        public static function resetManager($name = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::resetManager($name);
        }
        
        /**
         * Resolves a registered namespace alias to the full namespace.
         * 
         * This method looks for the alias in all registered object managers.
         *
         * @param string $alias The alias.
         * @throws ORMException
         * @return string The full namespace.
         * @static 
         */ 
        public static function getAliasNamespace($alias)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getAliasNamespace($alias);
        }
        
        /**
         * Gets the ObjectRepository for an persistent object.
         *
         * @param string $persistentObject The name of the persistent object.
         * @param string $persistentManagerName The object manager name (null for the default one).
         * @return \Doctrine\Common\Persistence\ObjectRepository 
         * @static 
         */ 
        public static function getRepository($persistentObject, $persistentManagerName = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getRepository($persistentObject, $persistentManagerName);
        }
        
        /**
         * Gets the object manager associated with a given class.
         *
         * @param string $class A persistent object class name.
         * @return \Doctrine\Common\Persistence\ObjectManager|null 
         * @static 
         */ 
        public static function getManagerForClass($class)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::getManagerForClass($class);
        }
        
        /**
         * 
         *
         * @param string $defaultManager
         * @static 
         */ 
        public static function setDefaultManager($defaultManager)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::setDefaultManager($defaultManager);
        }
        
        /**
         * 
         *
         * @param string $defaultConnection
         * @static 
         */ 
        public static function setDefaultConnection($defaultConnection)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::setDefaultConnection($defaultConnection);
        }
         
    }

    class Doctrine {
        
        /**
         * 
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultManagerName()
        {
            return \LaravelDoctrine\ORM\DoctrineManager::getDefaultManagerName();
        }
        
        /**
         * 
         *
         * @param $callback
         * @static 
         */ 
        public static function onResolve($callback)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::onResolve($callback);
        }
        
        /**
         * 
         *
         * @param string|null $connection
         * @param string|callable $callback
         * @static 
         */ 
        public static function extend($connection, $callback)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::extend($connection, $callback);
        }
        
        /**
         * 
         *
         * @param string|callable $callback
         * @static 
         */ 
        public static function extendAll($callback)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::extendAll($callback);
        }
        
        /**
         * 
         *
         * @param $namespace
         * @param string|null $connection
         * @static 
         */ 
        public static function addNamespace($namespace, $connection = null)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::addNamespace($namespace, $connection);
        }
        
        /**
         * 
         *
         * @param array $paths
         * @param string|null $connection
         * @static 
         */ 
        public static function addPaths($paths = array(), $connection = null)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::addPaths($paths, $connection);
        }
        
        /**
         * 
         *
         * @param array $mappings
         * @param string|null $connection
         * @static 
         */ 
        public static function addMappings($mappings = array(), $connection = null)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::addMappings($mappings, $connection);
        }
        
        /**
         * 
         *
         * @param null $connection
         * @param \LaravelDoctrine\ORM\ManagerRegistry $registry
         * @return \LaravelDoctrine\ORM\MappingDriver 
         * @static 
         */ 
        public static function getMetaDataDriver($connection, $registry)
        {
            return \LaravelDoctrine\ORM\DoctrineManager::getMetaDataDriver($connection, $registry);
        }
         
    }

    class EntityManager {
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getConnection()
        {
            return \Doctrine\ORM\EntityManager::getConnection();
        }
        
        /**
         * Gets the metadata factory used to gather the metadata of classes.
         *
         * @return \Doctrine\ORM\Mapping\ClassMetadataFactory 
         * @static 
         */ 
        public static function getMetadataFactory()
        {
            return \Doctrine\ORM\EntityManager::getMetadataFactory();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getExpressionBuilder()
        {
            return \Doctrine\ORM\EntityManager::getExpressionBuilder();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function beginTransaction()
        {
            return \Doctrine\ORM\EntityManager::beginTransaction();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getCache()
        {
            return \Doctrine\ORM\EntityManager::getCache();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function transactional($func)
        {
            return \Doctrine\ORM\EntityManager::transactional($func);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function commit()
        {
            return \Doctrine\ORM\EntityManager::commit();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function rollback()
        {
            return \Doctrine\ORM\EntityManager::rollback();
        }
        
        /**
         * Returns the ORM metadata descriptor for a class.
         * 
         * The class name must be the fully-qualified class name without a leading backslash
         * (as it is returned by get_class($obj)) or an aliased class name.
         * 
         * Examples:
         * MyProject\Domain\User
         * sales:PriceRequest
         * 
         * Internal note: Performance-sensitive method.
         *
         * @param string $className
         * @return \Doctrine\ORM\Mapping\ClassMetadata 
         * @static 
         */ 
        public static function getClassMetadata($className)
        {
            return \Doctrine\ORM\EntityManager::getClassMetadata($className);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createQuery($dql = '')
        {
            return \Doctrine\ORM\EntityManager::createQuery($dql);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNamedQuery($name)
        {
            return \Doctrine\ORM\EntityManager::createNamedQuery($name);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNativeQuery($sql, $rsm)
        {
            return \Doctrine\ORM\EntityManager::createNativeQuery($sql, $rsm);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNamedNativeQuery($name)
        {
            return \Doctrine\ORM\EntityManager::createNamedNativeQuery($name);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createQueryBuilder()
        {
            return \Doctrine\ORM\EntityManager::createQueryBuilder();
        }
        
        /**
         * Flushes all changes to objects that have been queued up to now to the database.
         * 
         * This effectively synchronizes the in-memory state of managed objects with the
         * database.
         * 
         * If an entity is explicitly passed to this method only this entity and
         * the cascade-persist semantics + scheduled inserts/removals are synchronized.
         *
         * @param null|object|array $entity
         * @return void 
         * @throws \Doctrine\ORM\OptimisticLockException If a version check on an entity that
         *         makes use of optimistic locking fails.
         * @throws ORMException
         * @static 
         */ 
        public static function flush($entity = null)
        {
            \Doctrine\ORM\EntityManager::flush($entity);
        }
        
        /**
         * Finds an Entity by its identifier.
         *
         * @param string $entityName The class name of the entity to find.
         * @param mixed $id The identity of the entity to find.
         * @param integer|null $lockMode One of the \Doctrine\DBAL\LockMode::* constants
         *                                  or NULL if no specific lock mode should be used
         *                                  during the search.
         * @param integer|null $lockVersion The version of the entity to find when using
         *                                  optimistic locking.
         * @return object|null The entity instance or NULL if the entity can not be found.
         * @throws OptimisticLockException
         * @throws ORMInvalidArgumentException
         * @throws TransactionRequiredException
         * @throws ORMException
         * @static 
         */ 
        public static function find($entityName, $id, $lockMode = null, $lockVersion = null)
        {
            return \Doctrine\ORM\EntityManager::find($entityName, $id, $lockMode, $lockVersion);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getReference($entityName, $id)
        {
            return \Doctrine\ORM\EntityManager::getReference($entityName, $id);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getPartialReference($entityName, $identifier)
        {
            return \Doctrine\ORM\EntityManager::getPartialReference($entityName, $identifier);
        }
        
        /**
         * Clears the EntityManager. All entities that are currently managed
         * by this EntityManager become detached.
         *
         * @param string|null $entityName if given, only entities of this type will get detached
         * @return void 
         * @throws ORMInvalidArgumentException                           if a non-null non-string value is given
         * @throws \Doctrine\Common\Persistence\Mapping\MappingException if a $entityName is given, but that entity is not
         *                                                               found in the mappings
         * @static 
         */ 
        public static function clear($entityName = null)
        {
            \Doctrine\ORM\EntityManager::clear($entityName);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function close()
        {
            return \Doctrine\ORM\EntityManager::close();
        }
        
        /**
         * Tells the EntityManager to make an instance managed and persistent.
         * 
         * The entity will be entered into the database at or before transaction
         * commit or as a result of the flush operation.
         * 
         * NOTE: The persist operation always considers entities that are not yet known to
         * this EntityManager as NEW. Do not pass detached entities to the persist operation.
         *
         * @param object $entity The instance to make managed and persistent.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function persist($entity)
        {
            \Doctrine\ORM\EntityManager::persist($entity);
        }
        
        /**
         * Removes an entity instance.
         * 
         * A removed entity will be removed from the database at or before transaction commit
         * or as a result of the flush operation.
         *
         * @param object $entity The entity instance to remove.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function remove($entity)
        {
            \Doctrine\ORM\EntityManager::remove($entity);
        }
        
        /**
         * Refreshes the persistent state of an entity from the database,
         * overriding any local changes that have not yet been persisted.
         *
         * @param object $entity The entity to refresh.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function refresh($entity)
        {
            \Doctrine\ORM\EntityManager::refresh($entity);
        }
        
        /**
         * Detaches an entity from the EntityManager, causing a managed entity to
         * become detached.  Unflushed changes made to the entity if any
         * (including removal of the entity), will not be synchronized to the database.
         * 
         * Entities which previously referenced the detached entity will continue to
         * reference it.
         *
         * @param object $entity The entity to detach.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @static 
         */ 
        public static function detach($entity)
        {
            \Doctrine\ORM\EntityManager::detach($entity);
        }
        
        /**
         * Merges the state of a detached entity into the persistence context
         * of this EntityManager and returns the managed copy of the entity.
         * 
         * The entity passed to merge will not become associated/managed with this EntityManager.
         *
         * @param object $entity The detached entity to merge into the persistence context.
         * @return object The managed copy of the entity.
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function merge($entity)
        {
            return \Doctrine\ORM\EntityManager::merge($entity);
        }
        
        /**
         * {@inheritDoc}
         *
         * @todo Implementation need. This is necessary since $e2 = clone $e1; throws an E_FATAL when access anything on $e:
         * Fatal error: Maximum function nesting level of '100' reached, aborting!
         * @static 
         */ 
        public static function copy($entity, $deep = false)
        {
            return \Doctrine\ORM\EntityManager::copy($entity, $deep);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function lock($entity, $lockMode, $lockVersion = null)
        {
            return \Doctrine\ORM\EntityManager::lock($entity, $lockMode, $lockVersion);
        }
        
        /**
         * Gets the repository for an entity class.
         *
         * @param string $entityName The name of the entity.
         * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository The repository class.
         * @static 
         */ 
        public static function getRepository($entityName)
        {
            return \Doctrine\ORM\EntityManager::getRepository($entityName);
        }
        
        /**
         * Determines whether an entity instance is managed in this EntityManager.
         *
         * @param object $entity
         * @return boolean TRUE if this EntityManager currently manages the given entity, FALSE otherwise.
         * @static 
         */ 
        public static function contains($entity)
        {
            return \Doctrine\ORM\EntityManager::contains($entity);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getEventManager()
        {
            return \Doctrine\ORM\EntityManager::getEventManager();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getConfiguration()
        {
            return \Doctrine\ORM\EntityManager::getConfiguration();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function isOpen()
        {
            return \Doctrine\ORM\EntityManager::isOpen();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getUnitOfWork()
        {
            return \Doctrine\ORM\EntityManager::getUnitOfWork();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getHydrator($hydrationMode)
        {
            return \Doctrine\ORM\EntityManager::getHydrator($hydrationMode);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function newHydrator($hydrationMode)
        {
            return \Doctrine\ORM\EntityManager::newHydrator($hydrationMode);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getProxyFactory()
        {
            return \Doctrine\ORM\EntityManager::getProxyFactory();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function initializeObject($obj)
        {
            return \Doctrine\ORM\EntityManager::initializeObject($obj);
        }
        
        /**
         * Factory method to create EntityManager instances.
         *
         * @param array|\Doctrine\ORM\Connection $connection An array with the connection parameters or an existing Connection instance.
         * @param \Doctrine\ORM\Configuration $config The Configuration instance to use.
         * @param \Doctrine\ORM\EventManager $eventManager The EventManager instance to use.
         * @return \EntityManager The created EntityManager.
         * @throws \InvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function create($connection, $config, $eventManager = null)
        {
            return \Doctrine\ORM\EntityManager::create($connection, $config, $eventManager);
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getFilters()
        {
            return \Doctrine\ORM\EntityManager::getFilters();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function isFiltersStateClean()
        {
            return \Doctrine\ORM\EntityManager::isFiltersStateClean();
        }
        
        /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function hasFilters()
        {
            return \Doctrine\ORM\EntityManager::hasFilters();
        }
         
    }
 
}


namespace  { 

    class Artisan extends \Illuminate\Support\Facades\Artisan {}

    class DB extends \Illuminate\Support\Facades\DB {}

    class Log extends \Illuminate\Support\Facades\Log {}

    class Route extends \Illuminate\Support\Facades\Route {}

    class Schema extends \Illuminate\Support\Facades\Schema {}

    class Debugbar extends \Barryvdh\Debugbar\Facade {}

    class Clockwork extends \Clockwork\Support\Laravel\Facade {}

    class Registry extends \LaravelDoctrine\ORM\Facades\Registry {}

    class Doctrine extends \LaravelDoctrine\ORM\Facades\Doctrine {}

    class EntityManager extends \LaravelDoctrine\ORM\Facades\EntityManager {}
 
}



