<?php
include_once "classes/Counter.php";
include_once "classes/DB.php";

use Classes\Counter;
use Classes\DB;

$counter = new Counter();

echo $counter->getProduct() . "<br>";
$counter->setProduct(1561651651616);

$a = mt_rand(0, 215161651);
$b = mt_rand(456, 45664651);

$result = $counter->sum($a, $b);

var_dump($result);

$db = new DB("localhost", "root", "", "portalove", "3308");
?>