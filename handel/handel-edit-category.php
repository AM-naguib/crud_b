<?php
session_start();

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
    $cat_file = get_data("../data/category.json");
    $found = check_category($id,$cat_file);
    if(!$found){
        $erorrs[] = "category not found";
    }

    if (empty($erorrs)) {
        $_SESSION["success"] = "done updated";
        $cat_file[$id]["name"] = $category_data;
        $cat_file[$id]["edited_at"] = date("Y-m-d H:i:m");
        file_put_contents("../data/category.json", json_encode($cat_file));
        header("location:../categorys.php");

    } else {
        $_SESSION["erorr"] = $erorrs;
        header("location:../category-edit.php");
    }
}