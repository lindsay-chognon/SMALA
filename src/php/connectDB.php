<?php

    const DB_HOST    = "localhost";
    const DB_NAME    = "smala";
    const DB_LOGIN   = "testDB";
    const DB_PASS    = "testDBmdp";

    const DB_DRIVER  = "mysql";
    const DB_CHARSET = "utf8mb4";

    const DB_OPTIONS = [
    PDO::ATTR_EMULATE_PREPARES   => false, 
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::MYSQL_ATTR_FOUND_ROWS   => true 
    ];

    @ini_set("session.cookie_httponly", 1);
    @ini_set("session.cookie_samesite", "Strict");
    session_name("sess_SMALA_42");
    session_start();
?>