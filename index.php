<?php
include_once "classes/Printer.php";
include_once "classes/DB.php";

use Classes\Printer;
use Classes\DB;

$roky = "Aktualne mam " . mt_rand(1,5) . " rokov";

$printer = new Printer($roky);
var_dump($printer->getString());
$printer->test();

$db = new DB("localhost", "root", "", "po-02", "3306");
?>