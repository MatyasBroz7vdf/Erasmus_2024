<?php
$tmplt = file_get_contents("view/page.html");
$data = [
    'logo' => file_get_contents("www/img/logo_skolavdf.svg"),
    'nav-recipe-category' => file_get_contents("view/nav-recipe-category.html"),
    'datetime' => "Index generated: " . date("d. m. Y H:i:s"),
];
foreach ($data as $key => $value) {
    $tmplt = str_replace("{{$key}}", $value, $tmplt);
}
echo $tmplt;