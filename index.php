<?php

try {
    # [START cloud_sql_mysql_pdo_create_socket]
    $username = 'sail';
    $password = 'password';
    $dbName = 'laravel';
    $connectionName = getenv("laravel-316805:asia-southeast2:laravel");
    $socketDir = getenv('DB_SOCKET_DIR') ?: '/cloudsql';

    // Connect using UNIX sockets
    $dsn = sprintf(
        'mysql:dbname=%s;unix_socket=%s/%s',
        $dbName,
        $socketDir,
        $connectionName
    );

    // Connect to the database.
    $conn = new PDO($dsn, $username, $password);
    # [END cloud_sql_mysql_pdo_create_socket]
} catch (TypeError $e) {
    throw new RuntimeException(
        sprintf(
            'Invalid or missing configuration! Make sure you have set ' .
            '$username, $password, $dbName, and $dbHost (for TCP mode) ' .
            'or $connectionName (for UNIX socket mode). ' .
            'The PHP error was %s',
            $e->getMessage()
        ),
        $e->getCode(),
        $e
    );