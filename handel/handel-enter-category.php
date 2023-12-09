<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "../core/fun.php";
    session_start();
    $category = sanitaization($_POST["category"]);
    $erorrs = [];
    if(require_input($category_data)){
        $erorrs[] = "category is empty";
    }elseif(min_len($category_data,3)){
        $erorrs[] = "category less than 3 char";
    }elseif(max_len($category_data,30)){
        $erorrs[] = "category more than 30 char";
    }


    if(empty($erorrs)){
        $_SESSION["success"] = "done add category";
        $cat_file = get_data("../data/category.json");
        $cat_file[] = ["name"=>$category,"created_at"=>date("Y-m-d H:i:m")];
        file_put_contents("../data/category.json",json_encode($cat_file));
        header("location:../enter-category.php");
    }else{
        $_SESSION["erorrs"] = $erorrs;
        header("location:../enter-category.php");
        die;
    }
}