<?php
require_once "../core/fun.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erorrs = [];

    foreach ($_POST as $key => $value) {
        $$key = sanitaization($value);
    }


    if (require_input($category_data)) {
        $erorrs[] = "category is empty";
    } elseif (min_len($category_data, 3)) {
        $erorrs[] = "category less than 3 char";
    } elseif (max_len($category_data, 30)) {
        $erorrs[] = "category more than 30 char";
    }


    if (empty($erorrs)) {
        $_SESSION["success"] = "done updated";
        $cat_file = get_data("../data/category.json");
        $cat_file[$id]["name"] = $category_data;
        file_put_contents("../data/category.json", json_encode($cat_file));

    } else {
        $_SESSION["erorrs"] = $erorrs;
        header("location:../category-edit.php");
    }
}