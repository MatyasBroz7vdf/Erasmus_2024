<?php
$id = (int)$_GET['id'];
$tmplt = file_get_contents("view/recipeB.html");
$data = [
    'logo' => file_get_contents("www/img/logo_skolavdf.svg"),
    'nav-recipe-category' => file_get_contents("view/nav-recipe-category.html"),
    'datetime' => "Index generated: " . date("d. m. Y H:i:s"),
];
foreach ($data as $key => $value) {
    $tmplt = str_replace("{{$key}}", $value, $tmplt);
}
require_once("app/SmartCookClient.php");
try {
    $a = (new SmartCookClient)
        ->setRequestData(["recipe_id" => $id])
        ->sendRequest("recipe")
        ->getResponseData();
} catch (Exception $e) {
    echo $e->getMessage();
}
$e = $a["data"];
$i = $e["dish_category"];

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

$tmpltRecipe = $tmplt;
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
