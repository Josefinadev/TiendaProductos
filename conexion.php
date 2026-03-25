<?php

    function conexion(){

    $host = "host=dpg-d723d9h5pdvs73a8cj1g-a.oregon-postgres.render.com/";
    $port = "port=5432";
    $dbname = "test_7z3w";
    $user = "test_7z3w_user";
    $password = "80YHuKSlvTuj36SmiV3MLFe7S8QCTxgP";

    $db = pg_connect("$host $port $dbname $user $password");

    return $db;
}
?>