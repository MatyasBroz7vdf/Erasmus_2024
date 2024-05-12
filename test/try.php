<?php
require_once("SmartCookClient.php");

try {
    $a = (new SmartCookClient)
        ->setRequestData(["recipe_id" => 1])
        ->sendRequest("recipe")
        ->getResponseData();
} catch (Exception $e) {
    echo $e->getMessage();
}
$e = $a["data"];
print_r(array_keys($e));
echo "Who?";
echo $e["difficulty"];

