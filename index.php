<?php
include_once "classes/Printer.php";
include_once "classes/DB.php";

use Classes\Printer;
use Classes\DB;

$printer = new Printer();

var_dump($printer->getMemory());

$printer->countedPrint("Keď vytvorím inštanciu triedy tak dostanem objekt", 1);

var_dump($printer->getMemory());

$db = new DB("localhost", "root", "", "po-02", "3306");

?>