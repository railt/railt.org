<?php
// @formatter:off

/**
 * A helper file for Laravel 5, to provide autocomplete information to your IDE
 * Generated for Laravel 5.7.10 on 2018-10-26 23:10:10.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */

namespace Illuminate\Support\Facades { 

    /**
     * 
     *
     * @method static \Illuminate\Database\ConnectionInterface connection(string $name = null)
     * @method static string getDefaultConnection()
     * @method static void setDefaultConnection(string $name)
     * @method static \Illuminate\Database\Query\Builder table(string $table)
     * @method static \Illuminate\Database\Query\Expression raw($value)
     * @method static mixed selectOne(string $query, array $bindings = [])
     * @method static array select(string $query, array $bindings = [])
     * @method static bool insert(string $query, array $bindings = [])
     * @method static int update(string $query, array $bindings = [])
     * @method static int delete(string $query, array $bindings = [])
     * @method static bool statement(string $query, array $bindings = [])
     * @method static int affectingStatement(string $query, array $bindings = [])
     * @method static bool unprepared(string $query)
     * @method static array prepareBindings(array $bindings)
     * @method static mixed transaction(\Closure $callback, int $attempts = 1)
     * @method static void beginTransaction()
     * @method static void commit()
     * @method static void rollBack()
     * @method static int transactionLevel()
     * @method static array pretend(\Closure $callback)
     * @see \Illuminate\Database\DatabaseManager
     * @see \Illuminate\Database\Connection
     */ 
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
         * @return $this 
         * @static 
         */ 
        public static function setQueryGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setQueryGrammar($grammar);
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
         * @return $this 
         * @static 
         */ 
        public static function setSchemaGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setSchemaGrammar($grammar);
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
         * @return $this 
         * @static 
         */ 
        public static function setPostProcessor($processor)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setPostProcessor($processor);
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
         * @return $this 
         * @static 
         */ 
        public static function setEventDispatcher($events)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setEventDispatcher($events);
        }
        
        /**
         * Unset the event dispatcher for this connection.
         *
         * @return void 
         * @static 
         */ 
        public static function unsetEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::unsetEventDispatcher();
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
         * @return $this 
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
         * @return $this 
         * @static 
         */ 
        public static function setTablePrefix($prefix)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setTablePrefix($prefix);
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
         * @throws \Exception
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

    /**
     * 
     *
     * @method static \Illuminate\Routing\Route get(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route post(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route put(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route delete(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route patch(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route options(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route any(string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\Route match(array|string $methods, string $uri, \Closure|array|string|null $action = null)
     * @method static \Illuminate\Routing\RouteRegistrar prefix(string  $prefix)
     * @method static \Illuminate\Routing\RouteRegistrar where(array  $where)
     * @method static \Illuminate\Routing\PendingResourceRegistration resource(string $name, string $controller, array $options = [])
     * @method static \Illuminate\Routing\PendingResourceRegistration apiResource(string $name, string $controller, array $options = [])
     * @method static void apiResources(array $resources)
     * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
     * @method static \Illuminate\Routing\Route substituteBindings(\Illuminate\Support\Facades\Route $route)
     * @method static void substituteImplicitBindings(\Illuminate\Support\Facades\Route $route)
     * @method static \Illuminate\Routing\RouteRegistrar as(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar domain(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar name(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar namespace(string $value)
     * @method static \Illuminate\Routing\Router|\Illuminate\Routing\RouteRegistrar group(array|\Closure|string $attributes, \Closure|string $routes)
     * @method static \Illuminate\Routing\Route redirect(string $uri, string $destination, int $status = 302)
     * @method static \Illuminate\Routing\Route permanentRedirect(string $uri, string $destination)
     * @method static \Illuminate\Routing\Route view(string $uri, string $view, array $data = [])
     * @method static void bind(string $key, string|callable $binder)
     * @method static void model(string $key, string $class, \Closure|null $callback = null)
     * @method static \Illuminate\Routing\Route current()
     * @method static string|null currentRouteName()
     * @method static string|null currentRouteAction()
     * @see \Illuminate\Routing\Router
     */ 
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
        public static function redirect($uri, $destination, $status = 302)
        {
            return \Illuminate\Routing\Router::redirect($uri, $destination, $status);
        }
        
        /**
         * Create a permanent redirect from one URI to another.
         *
         * @param string $uri
         * @param string $destination
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function permanentRedirect($uri, $destination)
        {
            return \Illuminate\Routing\Router::permanentRedirect($uri, $destination);
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
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function resources($resources, $options = array())
        {
            \Illuminate\Routing\Router::resources($resources, $options);
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
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function apiResources($resources, $options = array())
        {
            \Illuminate\Routing\Router::apiResources($resources, $options);
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
         * Add a route to the underlying route collection.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function addRoute($methods, $uri, $action)
        {
            return \Illuminate\Routing\Router::addRoute($methods, $uri, $action);
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
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function auth($options = array())
        {
            \Illuminate\Routing\Router::auth($options);
        }
        
        /**
         * Register the typical email verification routes for an application.
         *
         * @return void 
         * @static 
         */ 
        public static function emailVerification()
        {
            \Illuminate\Routing\Router::emailVerification();
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
         * @throws \ReflectionException
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

    /**
     * 
     *
     * @method static \Illuminate\Database\Schema\Builder create(string $table, \Closure $callback)
     * @method static \Illuminate\Database\Schema\Builder drop(string $table)
     * @method static \Illuminate\Database\Schema\Builder dropIfExists(string $table)
     * @method static \Illuminate\Database\Schema\Builder table(string $table, \Closure $callback)
     * @method static void defaultStringLength(int $length)
     * @see \Illuminate\Database\Schema\Builder
     */ 
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
         * Drop all views from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllViews()
        {
            \Illuminate\Database\Schema\MySqlBuilder::dropAllViews();
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

    /**
     * 
     *
     * @method static int handle(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output = null)
     * @method static int call(string $command, array $parameters = [], $outputBuffer = null)
     * @method static int queue(string $command, array $parameters = [])
     * @method static array all()
     * @method static string output()
     * @see \Illuminate\Contracts\Console\Kernel
     */ 
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
 
}

namespace Clockwork\Support\Laravel { 

    /**
     * 
     *
     */ 
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
         * 
         *
         * @static 
         */ 
        public static function extendRequest($request = null)
        {
            return \Clockwork\Clockwork::extendRequest($request);
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
         * Return the authenticator object
         *
         * @static 
         */ 
        public static function getAuthenticator()
        {
            return \Clockwork\Clockwork::getAuthenticator();
        }
        
        /**
         * Set a custom authenticator object
         *
         * @static 
         */ 
        public static function setAuthenticator($authenticator)
        {
            return \Clockwork\Clockwork::setAuthenticator($authenticator);
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
        
        /**
         * Shortcut methods for recording subrequests
         *
         * @static 
         */ 
        public static function subrequest($url, $id, $path = null)
        {
            return \Clockwork\Clockwork::subrequest($url, $id, $path);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function userData($key = null)
        {
            return \Clockwork\Clockwork::userData($key);
        }
         
    }
 
}

namespace LaravelDoctrine\ORM\Facades { 

    /**
     * 
     *
     */ 
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
         * Close an existing object manager.
         *
         * @param string|null $name The object manager name (null for the default one).
         * @static 
         */ 
        public static function closeManager($name = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::closeManager($name);
        }
        
        /**
         * Purge a named object manager.
         * 
         * This method can be used if you wish to close an object manager manually, without opening a new one.
         * This can be useful if you wish to open a new manager later (but maybe with different settings).
         *
         * @param string|null $name The object manager name (null for the default one).
         * @static 
         */ 
        public static function purgeManager($name = null)
        {
            return \LaravelDoctrine\ORM\IlluminateRegistry::purgeManager($name);
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

    /**
     * 
     *
     */ 
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

    /**
     * 
     *
     * @method static object|null find(string $className, mixed $id)
     * @method static void persist(object $object)
     * @method static void remove(object $object)
     * @method static object merge(object $object)
     * @method static void clear(string $objectName = null)
     * @method static void detach(object $object)
     * @method static void refresh(object $object)
     * @method static void flush()
     * @method static \Doctrine\Common\Persistence\ObjectRepository getRepository(string $className)
     * @method static \Doctrine\Common\Persistence\Mapping\ClassMetadata getClassMetadata(string $className)
     * @method static \Doctrine\Common\Persistence\Mapping\ClassMetadataFactory getMetadataFactory()
     * @method static void initializeObject(object $obj)
     * @method static bool contains(object $object)
     * @method static \Doctrine\ORM\Cache|null getCache()
     * @method static \Doctrine\DBAL\Connection getConnection()
     * @method static \Doctrine\ORM\Query\Expr getExpressionBuilder()
     * @method statuc \Doctrine\ORM\Utility\IdentifierFlattener getIdentifierFlattener()
     * @method static void beginTransaction()
     * @method static mixed transactional(callable $func)
     * @method static void commit()
     * @method static void rollback()
     * @method static \Doctrine\ORM\Query createQuery(string $dql = '')
     * @method static \Doctrine\ORM\Query createNamedQuery(string $name)
     * @method static \Doctrine\ORM\NativeQuery createNativeQuery(string $sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
     * @method static \Doctrine\ORM\NativeQuery createNamedNativeQuery(string $name)
     * @method static \Doctrine\ORM\QueryBuilder createQueryBuilder()
     * @method static object getReference(string $entityName, mixed $id)
     * @method static object getPartialReference(string $entityName, mixed $identifier)
     * @method static void close()
     * @method static void copy(object $entity, bool $deep = false)
     * @method static void lock(object $entity, int $lockMode, int $lockVersion = null)
     * @method static \Doctrine\Common\EventManager getEventManager()
     * @method static \Doctrine\ORM\Configuration getConfiguration()
     * @method static bool isOpen()
     * @method static \Doctrine\ORM\UnitOfWork getUnitOfWork()
     * @method static \Doctrine\ORM\Internal\Hydration\AbstractHydrator getHydrator(int $ĥydrationMode)
     * @method static \Doctrine\ORM\Internal\Hydration\AbstractHydrator newHydrator(int $ĥydrationMode)
     * @method static \Doctrine\ORM\Proxy\ProxyFactory getProxyFactory()
     * @method static \Doctrine\ORM\Query\FilterCollection getFilters()
     * @method static bool isFiltersStateClean()
     * @method static bool hasFilters()
     */ 
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

namespace Laravel\Socialite\Facades { 

    /**
     * 
     *
     * @see \Laravel\Socialite\SocialiteManager
     */ 
    class Socialite {
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */ 
        public static function with($driver)
        {
            return \Laravel\Socialite\SocialiteManager::with($driver);
        }
        
        /**
         * Build an OAuth 2 provider instance.
         *
         * @param string $provider
         * @param array $config
         * @return \Laravel\Socialite\Two\AbstractProvider 
         * @static 
         */ 
        public static function buildProvider($provider, $config)
        {
            return \Laravel\Socialite\SocialiteManager::buildProvider($provider, $config);
        }
        
        /**
         * Format the server configuration.
         *
         * @param array $config
         * @return array 
         * @static 
         */ 
        public static function formatConfig($config)
        {
            return \Laravel\Socialite\SocialiteManager::formatConfig($config);
        }
        
        /**
         * Get the default driver name.
         *
         * @throws \InvalidArgumentException
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
            return \Laravel\Socialite\SocialiteManager::getDefaultDriver();
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */ 
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::getDrivers();
        }
         
    }
 
}

namespace Sentry\SentryLaravel { 

    /**
     * 
     *
     */ 
    class SentryFacade {
        
        /**
         * Destruct all objects contain link to this object
         * 
         * This method can not delete shutdown handler
         *
         * @static 
         */ 
        public static function close_all_children_link()
        {
            return \Raven_Client::close_all_children_link();
        }
        
        /**
         * Installs any available automated hooks (such as error_reporting).
         *
         * @static 
         */ 
        public static function install()
        {
            return \Raven_Client::install();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getRelease()
        {
            return \Raven_Client::getRelease();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setRelease($value)
        {
            return \Raven_Client::setRelease($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getEnvironment()
        {
            return \Raven_Client::getEnvironment();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setEnvironment($value)
        {
            return \Raven_Client::setEnvironment($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getAppPath()
        {
            return \Raven_Client::getAppPath();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setAppPath($value)
        {
            return \Raven_Client::setAppPath($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getExcludedAppPaths()
        {
            return \Raven_Client::getExcludedAppPaths();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setExcludedAppPaths($value)
        {
            return \Raven_Client::setExcludedAppPaths($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getPrefixes()
        {
            return \Raven_Client::getPrefixes();
        }
        
        /**
         * 
         *
         * @param array $value
         * @return \Raven_Client 
         * @static 
         */ 
        public static function setPrefixes($value)
        {
            return \Raven_Client::setPrefixes($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getSendCallback()
        {
            return \Raven_Client::getSendCallback();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setSendCallback($value)
        {
            return \Raven_Client::setSendCallback($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getTransport()
        {
            return \Raven_Client::getTransport();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getServerEndpoint($value = '')
        {
            return \Raven_Client::getServerEndpoint($value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getUserAgent()
        {
            return \Raven_Client::getUserAgent();
        }
        
        /**
         * Set a custom transport to override how Sentry events are sent upstream.
         * 
         * The bound function will be called with ``$client`` and ``$data`` arguments
         * and is responsible for encoding the data, authenticating, and sending
         * the data to the upstream Sentry server.
         *
         * @param Callable $value Function to be called
         * @return \Raven_Client 
         * @static 
         */ 
        public static function setTransport($value)
        {
            return \Raven_Client::setTransport($value);
        }
        
        /**
         * 
         *
         * @return string[]|\Raven_Processor[] 
         * @static 
         */ 
        public static function getDefaultProcessors()
        {
            return \Raven_Client::getDefaultProcessors();
        }
        
        /**
         * Sets the Raven_Processor sub-classes to be used when data is processed before being
         * sent to Sentry.
         *
         * @param $options
         * @return \Raven_Processor[] 
         * @static 
         */ 
        public static function setProcessorsFromOptions($options)
        {
            return \Raven_Client::setProcessorsFromOptions($options);
        }
        
        /**
         * Parses a Raven-compatible DSN and returns an array of its values.
         *
         * @param string $dsn Raven compatible DSN
         * @return array parsed DSN
         * @see http://raven.readthedocs.org/en/latest/config/#the-sentry-dsn
         * @static 
         */ 
        public static function parseDSN($dsn)
        {
            return \Raven_Client::parseDSN($dsn);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getLastError()
        {
            return \Raven_Client::getLastError();
        }
        
        /**
         * Given an identifier, returns a Sentry searchable string.
         *
         * @param mixed $ident
         * @return mixed 
         * @codeCoverageIgnore 
         * @static 
         */ 
        public static function getIdent($ident)
        {
            return \Raven_Client::getIdent($ident);
        }
        
        /**
         * 
         *
         * @param string $message The message (primary description) for the event.
         * @param array $params params to use when formatting the message.
         * @param string $level Log level group
         * @param bool|array $stack
         * @param mixed $vars
         * @return string|null 
         * @deprecated 
         * @codeCoverageIgnore 
         * @static 
         */ 
        public static function message($message, $params = array(), $level = 'info', $stack = false, $vars = null)
        {
            return \Raven_Client::message($message, $params, $level, $stack, $vars);
        }
        
        /**
         * 
         *
         * @param \Exception $exception
         * @return string|null 
         * @deprecated 
         * @codeCoverageIgnore 
         * @static 
         */ 
        public static function exception($exception)
        {
            return \Raven_Client::exception($exception);
        }
        
        /**
         * Log a message to sentry
         *
         * @param string $message The message (primary description) for the event.
         * @param array $params params to use when formatting the message.
         * @param array $data Additional attributes to pass with this event (see Sentry docs).
         * @param bool|array $stack
         * @param mixed $vars
         * @return string|null 
         * @static 
         */ 
        public static function captureMessage($message, $params = array(), $data = array(), $stack = false, $vars = null)
        {
            return \Raven_Client::captureMessage($message, $params, $data, $stack, $vars);
        }
        
        /**
         * Log an exception to sentry
         *
         * @param \Throwable|\Exception $exception The Throwable/Exception object.
         * @param array $data Additional attributes to pass with this event (see Sentry docs).
         * @param mixed $logger
         * @param mixed $vars
         * @return string|null 
         * @static 
         */ 
        public static function captureException($exception, $data = null, $logger = null, $vars = null)
        {
            return \Raven_Client::captureException($exception, $data, $logger, $vars);
        }
        
        /**
         * Capture the most recent error (obtained with ``error_get_last``).
         *
         * @return string|null 
         * @static 
         */ 
        public static function captureLastError()
        {
            return \Raven_Client::captureLastError();
        }
        
        /**
         * Log an query to sentry
         *
         * @param string|null $query
         * @param string $level
         * @param string $engine
         * @static 
         */ 
        public static function captureQuery($query, $level = 'info', $engine = '')
        {
            return \Raven_Client::captureQuery($query, $level, $engine);
        }
        
        /**
         * Return the last captured event's ID or null if none available.
         *
         * @static 
         */ 
        public static function getLastEventID()
        {
            return \Raven_Client::getLastEventID();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function get_default_data()
        {
            return \Raven_Client::get_default_data();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function capture($data, $stack = null, $vars = null)
        {
            return \Raven_Client::capture($data, $stack, $vars);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function sanitize($data)
        {
            return \Raven_Client::sanitize($data);
        }
        
        /**
         * Process data through all defined Raven_Processor sub-classes
         *
         * @param array $data Associative array of data to log
         * @static 
         */ 
        public static function process($data)
        {
            return \Raven_Client::process($data);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function sendUnsentErrors()
        {
            return \Raven_Client::sendUnsentErrors();
        }
        
        /**
         * 
         *
         * @param array $data
         * @return string|bool 
         * @static 
         */ 
        public static function encode($data)
        {
            return \Raven_Client::encode($data);
        }
        
        /**
         * Wrapper to handle encoding and sending data to the Sentry API server.
         *
         * @param array $data Associative array of data to log
         * @static 
         */ 
        public static function send($data)
        {
            return \Raven_Client::send($data);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getAuthHeader()
        {
            return \Raven_Client::getAuthHeader();
        }
        
        /**
         * Translate a PHP Error constant into a Sentry log level group
         *
         * @param string $severity PHP E_$x error constant
         * @return string Sentry log level group
         * @static 
         */ 
        public static function translateSeverity($severity)
        {
            return \Raven_Client::translateSeverity($severity);
        }
        
        /**
         * Provide a map of PHP Error constants to Sentry logging groups to use instead
         * of the defaults in translateSeverity()
         *
         * @param array $map
         * @static 
         */ 
        public static function registerSeverityMap($map)
        {
            return \Raven_Client::registerSeverityMap($map);
        }
        
        /**
         * Convenience function for setting a user's ID and Email
         *
         * @deprecated 
         * @param string $id User's ID
         * @param string|null $email User's email
         * @param array $data Additional user data
         * @codeCoverageIgnore 
         * @static 
         */ 
        public static function set_user_data($id, $email = null, $data = array())
        {
            return \Raven_Client::set_user_data($id, $email, $data);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function onShutdown()
        {
            return \Raven_Client::onShutdown();
        }
        
        /**
         * Sets user context.
         *
         * @param array $data Associative array of user data
         * @param bool $merge Merge existing context with new context
         * @static 
         */ 
        public static function user_context($data, $merge = true)
        {
            return \Raven_Client::user_context($data, $merge);
        }
        
        /**
         * Appends tags context.
         *
         * @param array $data Associative array of tags
         * @static 
         */ 
        public static function tags_context($data)
        {
            return \Raven_Client::tags_context($data);
        }
        
        /**
         * Appends additional context.
         *
         * @param array $data Associative array of extra data
         * @static 
         */ 
        public static function extra_context($data)
        {
            return \Raven_Client::extra_context($data);
        }
        
        /**
         * 
         *
         * @param array $processors
         * @static 
         */ 
        public static function setProcessors($processors)
        {
            return \Raven_Client::setProcessors($processors);
        }
        
        /**
         * 
         *
         * @return object|null 
         * @static 
         */ 
        public static function getLastSentryError()
        {
            return \Raven_Client::getLastSentryError();
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */ 
        public static function getShutdownFunctionHasBeenSet()
        {
            return \Raven_Client::getShutdownFunctionHasBeenSet();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function close_curl_resource()
        {
            return \Raven_Client::close_curl_resource();
        }
        
        /**
         * 
         *
         * @param \Raven_Serializer $serializer
         * @static 
         */ 
        public static function setSerializer($serializer)
        {
            return \Raven_Client::setSerializer($serializer);
        }
        
        /**
         * 
         *
         * @param \Raven_ReprSerializer $reprSerializer
         * @static 
         */ 
        public static function setReprSerializer($reprSerializer)
        {
            return \Raven_Client::setReprSerializer($reprSerializer);
        }
        
        /**
         * Cleans up the PHP version string by extracting junk from the extra part of the version.
         *
         * @param string $extra
         * @return string 
         * @static 
         */ 
        public static function cleanup_php_version($extra = '')
        {
            return \Raven_Client::cleanup_php_version($extra);
        }
         
    }
 
}


namespace  { 

    class DB extends \Illuminate\Support\Facades\DB {}

    class Route extends \Illuminate\Support\Facades\Route {}

    class Schema extends \Illuminate\Support\Facades\Schema {}

    class Artisan extends \Illuminate\Support\Facades\Artisan {}

    class Clockwork extends \Clockwork\Support\Laravel\Facade {}

    class Registry extends \LaravelDoctrine\ORM\Facades\Registry {}

    class Doctrine extends \LaravelDoctrine\ORM\Facades\Doctrine {}

    class EntityManager extends \LaravelDoctrine\ORM\Facades\EntityManager {}

    class Socialite extends \Laravel\Socialite\Facades\Socialite {}

    class Sentry extends \Sentry\SentryLaravel\SentryFacade {}
 
}


namespace {


use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Optional;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HigherOrderTapProxy;

if (! function_exists('append_config')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function append_config(array $array)
    {
        $start = 9999;

        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $start++;

                $array[$start] = Arr::pull($array, $key);
            }
        }

        return $array;
    }
}

if (! function_exists('array_add')) {
    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     */
    function array_add($array, $key, $value)
    {
        return Arr::add($array, $key, $value);
    }
}

if (! function_exists('array_collapse')) {
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  array  $array
     * @return array
     */
    function array_collapse($array)
    {
        return Arr::collapse($array);
    }
}

if (! function_exists('array_divide')) {
    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param  array  $array
     * @return array
     */
    function array_divide($array)
    {
        return Arr::divide($array);
    }
}

if (! function_exists('array_dot')) {
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array   $array
     * @param  string  $prepend
     * @return array
     */
    function array_dot($array, $prepend = '')
    {
        return Arr::dot($array, $prepend);
    }
}

if (! function_exists('array_except')) {
    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    function array_except($array, $keys)
    {
        return Arr::except($array, $keys);
    }
}

if (! function_exists('array_first')) {
    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    function array_first($array, callable $callback = null, $default = null)
    {
        return Arr::first($array, $callback, $default);
    }
}

if (! function_exists('array_flatten')) {
    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     */
    function array_flatten($array, $depth = INF)
    {
        return Arr::flatten($array, $depth);
    }
}

if (! function_exists('array_forget')) {
    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return void
     */
    function array_forget(&$array, $keys)
    {
        return Arr::forget($array, $keys);
    }
}

if (! function_exists('array_get')) {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        return Arr::get($array, $key, $default);
    }
}

if (! function_exists('array_has')) {
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     */
    function array_has($array, $keys)
    {
        return Arr::has($array, $keys);
    }
}

if (! function_exists('array_last')) {
    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    function array_last($array, callable $callback = null, $default = null)
    {
        return Arr::last($array, $callback, $default);
    }
}

if (! function_exists('array_only')) {
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }
}

if (! function_exists('array_pluck')) {
    /**
     * Pluck an array of values from an array.
     *
     * @param  array   $array
     * @param  string|array  $value
     * @param  string|array|null  $key
     * @return array
     */
    function array_pluck($array, $value, $key = null)
    {
        return Arr::pluck($array, $value, $key);
    }
}

if (! function_exists('array_prepend')) {
    /**
     * Push an item onto the beginning of an array.
     *
     * @param  array  $array
     * @param  mixed  $value
     * @param  mixed  $key
     * @return array
     */
    function array_prepend($array, $value, $key = null)
    {
        return Arr::prepend($array, $value, $key);
    }
}

if (! function_exists('array_pull')) {
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_pull(&$array, $key, $default = null)
    {
        return Arr::pull($array, $key, $default);
    }
}

if (! function_exists('array_random')) {
    /**
     * Get a random value from an array.
     *
     * @param  array  $array
     * @param  int|null  $num
     * @return mixed
     */
    function array_random($array, $num = null)
    {
        return Arr::random($array, $num);
    }
}

if (! function_exists('array_set')) {
    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     */
    function array_set(&$array, $key, $value)
    {
        return Arr::set($array, $key, $value);
    }
}

if (! function_exists('array_sort')) {
    /**
     * Sort the array by the given callback or attribute name.
     *
     * @param  array  $array
     * @param  callable|string|null  $callback
     * @return array
     */
    function array_sort($array, $callback = null)
    {
        return Arr::sort($array, $callback);
    }
}

if (! function_exists('array_sort_recursive')) {
    /**
     * Recursively sort an array by keys and values.
     *
     * @param  array  $array
     * @return array
     */
    function array_sort_recursive($array)
    {
        return Arr::sortRecursive($array);
    }
}

if (! function_exists('array_where')) {
    /**
     * Filter the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    function array_where($array, callable $callback)
    {
        return Arr::where($array, $callback);
    }
}

if (! function_exists('array_wrap')) {
    /**
     * If the given value is not an array, wrap it in one.
     *
     * @param  mixed  $value
     * @return array
     */
    function array_wrap($value)
    {
        return Arr::wrap($value);
    }
}

if (! function_exists('blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param  mixed  $value
     * @return bool
     */
    function blank($value)
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}

if (! function_exists('camel_case')) {
    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     */
    function camel_case($value)
    {
        return Str::camel($value);
    }
}

if (! function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (! function_exists('class_uses_recursive')) {
    /**
     * Returns all traits used by a class, its parent classes and trait of their traits.
     *
     * @param  object|string  $class
     * @return array
     */
    function class_uses_recursive($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += trait_uses_recursive($class);
        }

        return array_unique($results);
    }
}

if (! function_exists('collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Collection
     */
    function collect($value = null)
    {
        return new Collection($value);
    }
}

if (! function_exists('data_fill')) {
    /**
     * Fill in data where it's missing.
     *
     * @param  mixed   $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @return mixed
     */
    function data_fill(&$target, $key, $value)
    {
        return data_set($target, $key, $value, false);
    }
}

if (! function_exists('data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed   $target
     * @param  string|array  $key
     * @param  mixed   $default
     * @return mixed
     */
    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (! is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = data_get($item, $key);
                }

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}

if (! function_exists('data_set')) {
    /**
     * Set an item on an array or object using dot notation.
     *
     * @param  mixed  $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @param  bool  $overwrite
     * @return mixed
     */
    function data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (! Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (! Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || ! Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (! isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || ! isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
}

if (! function_exists('e')) {
    /**
     * Escape HTML special characters in a string.
     *
     * @param  \Illuminate\Contracts\Support\Htmlable|string  $value
     * @param  bool  $doubleEncode
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
    }
}

if (! function_exists('ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function ends_with($haystack, $needles)
    {
        return Str::endsWith($haystack, $needles);
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (! function_exists('filled')) {
    /**
     * Determine if a value is "filled".
     *
     * @param  mixed  $value
     * @return bool
     */
    function filled($value)
    {
        return ! blank($value);
    }
}

if (! function_exists('head')) {
    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param  array  $array
     * @return mixed
     */
    function head($array)
    {
        return reset($array);
    }
}

if (! function_exists('kebab_case')) {
    /**
     * Convert a string to kebab case.
     *
     * @param  string  $value
     * @return string
     */
    function kebab_case($value)
    {
        return Str::kebab($value);
    }
}

if (! function_exists('last')) {
    /**
     * Get the last element from an array.
     *
     * @param  array  $array
     * @return mixed
     */
    function last($array)
    {
        return end($array);
    }
}

if (! function_exists('object_get')) {
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object  $object
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_object($object) || ! isset($object->{$segment})) {
                return value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}

if (! function_exists('optional')) {
    /**
     * Provide access to optional objects.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new Optional($value);
        } elseif (! is_null($value)) {
            return $callback($value);
        }
    }
}

if (! function_exists('preg_replace_array')) {
    /**
     * Replace a given pattern with each value in the array in sequentially.
     *
     * @param  string  $pattern
     * @param  array   $replacements
     * @param  string  $subject
     * @return string
     */
    function preg_replace_array($pattern, array $replacements, $subject)
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $key => $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
}

if (! function_exists('retry')) {
    /**
     * Retry an operation a given number of times.
     *
     * @param  int  $times
     * @param  callable  $callback
     * @param  int  $sleep
     * @return mixed
     *
     * @throws \Exception
     */
    function retry($times, callable $callback, $sleep = 0)
    {
        $times--;

        beginning:
        try {
            return $callback();
        } catch (Exception $e) {
            if (! $times) {
                throw $e;
            }

            $times--;

            if ($sleep) {
                usleep($sleep * 1000);
            }

            goto beginning;
        }
    }
}

if (! function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }
}

if (! function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function starts_with($haystack, $needles)
    {
        return Str::startsWith($haystack, $needles);
    }
}

if (! function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function str_after($subject, $search)
    {
        return Str::after($subject, $search);
    }
}

if (! function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function str_before($subject, $search)
    {
        return Str::before($subject, $search);
    }
}

if (! function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function str_contains($haystack, $needles)
    {
        return Str::contains($haystack, $needles);
    }
}

if (! function_exists('str_finish')) {
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $cap
     * @return string
     */
    function str_finish($value, $cap)
    {
        return Str::finish($value, $cap);
    }
}

if (! function_exists('str_is')) {
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @param  string  $value
     * @return bool
     */
    function str_is($pattern, $value)
    {
        return Str::is($pattern, $value);
    }
}

if (! function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int     $limit
     * @param  string  $end
     * @return string
     */
    function str_limit($value, $limit = 100, $end = '...')
    {
        return Str::limit($value, $limit, $end);
    }
}

if (! function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int     $count
     * @return string
     */
    function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }
}

if (! function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     */
    function str_random($length = 16)
    {
        return Str::random($length);
    }
}

if (! function_exists('str_replace_array')) {
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array   $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_array($search, array $replace, $subject)
    {
        return Str::replaceArray($search, $replace, $subject);
    }
}

if (! function_exists('str_replace_first')) {
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_first($search, $replace, $subject)
    {
        return Str::replaceFirst($search, $replace, $subject);
    }
}

if (! function_exists('str_replace_last')) {
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_last($search, $replace, $subject)
    {
        return Str::replaceLast($search, $replace, $subject);
    }
}

if (! function_exists('str_singular')) {
    /**
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    function str_singular($value)
    {
        return Str::singular($value);
    }
}

if (! function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}

if (! function_exists('str_start')) {
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $prefix
     * @return string
     */
    function str_start($value, $prefix)
    {
        return Str::start($value, $prefix);
    }
}

if (! function_exists('studly_case')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    function studly_case($value)
    {
        return Str::studly($value);
    }
}

if (! function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function tap($value, $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $callback($value);

        return $value;
    }
}

if (! function_exists('throw_if')) {
    /**
     * Throw the given exception if the given condition is true.
     *
     * @param  mixed  $condition
     * @param  \Throwable|string  $exception
     * @param  array  ...$parameters
     * @return mixed
     *
     * @throws \Throwable
     */
    function throw_if($condition, $exception, ...$parameters)
    {
        if ($condition) {
            throw (is_string($exception) ? new $exception(...$parameters) : $exception);
        }

        return $condition;
    }
}

if (! function_exists('throw_unless')) {
    /**
     * Throw the given exception unless the given condition is true.
     *
     * @param  mixed  $condition
     * @param  \Throwable|string  $exception
     * @param  array  ...$parameters
     * @return mixed
     * @throws \Throwable
     */
    function throw_unless($condition, $exception, ...$parameters)
    {
        if (! $condition) {
            throw (is_string($exception) ? new $exception(...$parameters) : $exception);
        }

        return $condition;
    }
}

if (! function_exists('title_case')) {
    /**
     * Convert a value to title case.
     *
     * @param  string  $value
     * @return string
     */
    function title_case($value)
    {
        return Str::title($value);
    }
}

if (! function_exists('trait_uses_recursive')) {
    /**
     * Returns all traits used by a trait and its traits.
     *
     * @param  string  $trait
     * @return array
     */
    function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait);

        foreach ($traits as $trait) {
            $traits += trait_uses_recursive($trait);
        }

        return $traits;
    }
}

if (! function_exists('transform')) {
    /**
     * Transform the given value if it is present.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @param  mixed  $default
     * @return mixed|null
     */
    function transform($value, callable $callback, $default = null)
    {
        if (filled($value)) {
            return $callback($value);
        }

        if (is_callable($default)) {
            return $default($value);
        }

        return $default;
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (! function_exists('windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return strtolower(substr(PHP_OS, 0, 3)) === 'win';
    }
}

if (! function_exists('with')) {
    /**
     * Return the given value, optionally passed through the given callback.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function with($value, callable $callback = null)
    {
        return is_null($callback) ? $value : $callback($value);
    }
}
 
}

namespace Illuminate\Support {
    /**
     * Methods commonly used in migrations
     *
     * @method Fluent after(string $column) Add the after modifier
     * @method Fluent charset(string $charset) Add the character set modifier
     * @method Fluent collation(string $collation) Add the collation modifier
     * @method Fluent comment(string $comment) Add comment
     * @method Fluent default($value) Add the default modifier
     * @method Fluent first() Select first row
     * @method Fluent index(string $name = null) Add the in dex clause
     * @method Fluent on(string $table) `on` of a foreign key
     * @method Fluent onDelete(string $action) `on delete` of a foreign key
     * @method Fluent onUpdate(string $action) `on update` of a foreign key
     * @method Fluent primary() Add the primary key modifier
     * @method Fluent references(string $column) `references` of a foreign key
     * @method Fluent nullable(bool $value = true) Add the nullable modifier
     * @method Fluent unique(string $name = null) Add unique index clause
     * @method Fluent unsigned() Add the unsigned modifier
     * @method Fluent useCurrent() Add the default timestamp value
     * @method Fluent change() Add the change modifier
     */
    class Fluent {}
}
