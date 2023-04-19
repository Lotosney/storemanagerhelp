<?php
try{
    $pdo = new PDO("mysql:host=127.0.0.1; dbname=supplymanager", 'root', '');
} catch(\Throwable $th){
    die($th->getMessage());
}
