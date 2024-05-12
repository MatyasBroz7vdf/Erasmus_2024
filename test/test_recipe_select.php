<?php
// Use PHP's passthru() function to execute JavaScript file with Node.js
passthru('test.js');
?><?php
/*
require_once("../app/SmartCookClient.php");

try {
    $a = (new SmartCookClient)
        ->setRequestData(["recipe_id" => 1])
        ->sendRequest("recipe")
        ->getResponseData();
} catch (Exception $e) {
    echo $e->getMessage();
}
$e = $a["data"];

print_r($a);
print_r(gettype($e["id"]));
print_r(gettype($e["difficulty"]));
print_r(gettype($e["name"]));
print_r(gettype($e["description"]));
print_r(gettype($e["duration"]));
print_r(gettype($e["price"]));
print_r(gettype($e["country"]));
print_r(gettype($e["dttm"]));
print_r(gettype($e["author"]));
echo "Who?";
print_r(array_keys($e["dish_category"]));
print_r(array_keys($e["recipe_category"]));
print_r(array_keys($e["tolerance"]));
$i = $e["dish_category"];
echo $i[1];

if (1 == 1){ #difficulty STR change
    if ($e["difficulty"] == "1"){
        $e["difficulty"] = "Difficulty: simple";
    }
    if ($e["difficulty"] == "2"){
        $e["difficulty"] = "Difficulty: medium";
    }
    if ($e["difficulty"] == "3"){
        $e["difficulty"] = "Difficulty: difficult";
    }
}
if (1 == 1) { #Price STR change
    if ($e["price"] == "1"){
        $e["price"] = "Price: cheap";
    }
    if ($e["price"] == "2"){
        $e["price"] = "Price: medium";
    }
    if ($e["price"] == "3"){
        $e["price"] = "Price: expensive";
    }
}

$tmpltRecipe = file_get_contents(__DIR__ ."/../test/test.html");
$search = array("{id}", "{name}", "{difficulty}", 
                "{description}", "{duration}", "{price}", 
                "{country}", "{dttm}", "{author}"
                );
$replace = array($e["id"], $e["name"], $e["difficulty"],
                $e["description"], $e["duration"], $e["price"],
                $e["country"], $e["dttm"], $e["author"]);

                #, "{dish_category}", "{recipe_category}", "{tolerance}","{ingredient}", $e["ingredient"], $e["dish_category"], $e["recipe_category"], $e["tolerance"]



$tmpltRecipe = str_replace($search, $replace, $tmpltRecipe);

echo $tmpltRecipe;
*/