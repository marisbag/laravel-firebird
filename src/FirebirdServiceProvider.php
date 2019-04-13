<?php

namespace Firebird;

use Illuminate\Support\ServiceProvider;
use Firebird\Connection as FirebirdConnection;
use Illuminate\Database\Connection;

class FirebirdServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('firebird', function ($connection, $database, $tablePrefix, $config) {
            return new FirebirdConnection($connection, $database, $tablePrefix, $config);
        });

        $this->app->bind('db.connector.firebird', FirebirdConnector::class);
    }
}