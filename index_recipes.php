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
if (1 == 1){ #dish_category to str
    $b = "";
    foreach ($e["dish_category"] as $row){ 
        switch($row){
            case 1:
                $row = "Breakfast";
                break;
            case 2:
                $row = "Soup";
                break;
                
            case 3:
                $row = "Main course";
                break;
            case 4:
                $row = "Dessert";
                break;
            case 5:
                $row = "Dinner";
                break;
        }
    $b = $b . strval($row) . ", ";
    }
    $b = substr_replace($b, ".", -2);
    $b = "Dish categories/y: " . $b;
}

if (1 == 1){ #recipe_category to str
    $c = "";
    foreach ($e["recipe_category"] as $row){ 
        switch($row){
            case 1:
                $row = "Soup";
                break;
            case 2:
                $row = "Meat";
                break;
                
            case 3:
                $row = "Meat free";
                break;
            case 4:
                $row = "Dessert";
                break;
            case 5:
                $row = "Sauce";
                break;
            case 6:
                $row = "Pasta";
                break;
            case 7:
                $row = "Salad";
                break;
            case 8:
                $row = "Sweet food";
                break;
            case 8:
                $row = "Drink";
                break;
        }
    $c = $c . strval($row) . ", ";
    }
    $c = substr_replace($c, ".", -2);
    $c  = "Category of recipe: " . $c;
}
if (1 == 1){ #duration
    $duration = $e["duration"];
    $duration = "Duration of cooking: " . $duration;
}
if (1 == 1){ #country of origin
    $country = $e["country"];
    $country = "Country of cooking: " . $country;
}
if (1 == 1){ #recipe_category to str
    $c = "";
    foreach ($e["recipe_category"] as $row){ 
        switch($row){
            case 1:
                $row = "Soup";
                break;
            case 2:
                $row = "Meat";
                break;
                
            case 3:
                $row = "Meat free";
                break;
            case 4:
                $row = "Dessert";
                break;
            case 5:
                $row = "Sauce";
                break;
            case 6:
                $row = "Pasta";
                break;
            case 7:
                $row = "Salad";
                break;
            case 8:
                $row = "Sweet food";
                break;
            case 8:
                $row = "Drink";
                break;
        }
    $c = $c . strval($row) . ", ";
    }
    $c = substr_replace($c, ".", -2);
    $c  = "Category of recipe: " . $c;
}

$tmpltRecipe = $tmplt;
$search = array("{id}", "{name}", "{difficulty}", 
                "{description}", "{duration}", "{price}", 
                "{country}", "{dttm}", "{author}", "{dish_category}", "{recipe_category}"
                );
$replace = array($e["id"], $e["name"], $e["difficulty"],
                $e["description"], $duration, $e["price"],
                $country, $e["dttm"], $e["author"], $b, $c);

                #, "", "", "{tolerance}","{ingredient}", $e["ingredient"], $e["dish_category"],$e["tolerance"]

 


$tmpltRecipe = str_replace($search, $replace, $tmpltRecipe);
echo $tmpltRecipe;
