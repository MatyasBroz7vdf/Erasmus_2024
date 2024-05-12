<?php
/*
require_once("SmartCookClient.php");

function getinfo($requested){
    $z = array();
    try {
        $a = (new SmartCookClient)
            ->setRequestData([$requested])
            ->sendRequest("structure")
            ->getResponseData();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    foreach ($a as $row){
        if(gettype($row) == "array"){
            foreach($row["$requested"] as $value){
                array_push($z, $value);
            } 
        }
    }
    return $z;
}
$z = "recipe_category";
echo($z);
$y = getinfo($z);



<?php
require_once ("SmartCookClient.php");
$request_data = ["attributes" => ["id", "name", "description", "author"]];
$recipeCategory = filter_input(INPUT_GET, "recipe-category", FILTER_SANITIZE_NUMBER_INT);
if ($recipeCategory) {
    $request_data["filter"]["recipe_category"] = [$recipeCategory];
}
try {
    $data = (new SmartCookClient)
        ->setRequestData($request_data)
        ->sendRequest("recipes")
        ->getResponseData();
} catch (Exception $e) {
    echo $e->getMessage();
}
$maxlen = 100;
$recipes = "";
$tmpltRecipe = file_get_contents(__DIR__ ."/../view/recipe.html");
foreach ($data['data'] as $recipe) {
    if (mb_strlen($recipe["description"]) > $maxlen) {
        $desc = mb_substr($recipe["description"], 0, $maxlen) . " ...";
    }
    $recipes .= str_replace(
        ["{id}", "{name}", "{description}", "{author}"],
        [$recipe["id"], ucfirst($recipe["name"]), $desc, $recipe["author"]],
        $tmpltRecipe
    );
}
echo $recipes;*/