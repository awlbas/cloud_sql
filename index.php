<?php

try{
    $dbh = new pdo( 'mysql:host=34.101.221.22:3306;dbname=laravel',
                    'sail',
                    'password',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}