<?php

namespace enru\DsnFromEnv {
    function parse($db_url='DATABASE_URL') {
        $db = parse_url(getenv($db_url));
        $path = ltrim($db['path'], '/');
        $db['dbname'] = $path;
        $db['password'] = $db['pass'];
        unset($db['pass']);
        unset($db['path']);
        unset($db['scheme']);
        $dsn = 'pgsql:'.http_build_query($db, null, ';');
        return $dsn;
    }
}

namespace {
    try {
        $dsn = enru\DsnFromEnv\parse();
        error_log(var_export($dsn, true));
        $dbh = new PDO($dsn);
    } 
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
