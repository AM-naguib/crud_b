<?php
require_once("../core/fun.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"])){

        $cat_id = $_GET["id"];
        $cat_file = get_data("../data/category.json");
        $found = check_category($cat_id,$cat_file);

        if($found){

            $data = remove_item("../data/category.json",$cat_id);
            file_put_contents("../data/category.json",json_encode($data));
    
            $_SESSION["success"] = "done deleted";
            header("location:../categorys.php");
            
        }else{

            $_SESSION["erorr"] = ["category not found"];
            header("location:../categorys.php");
        }


    }
}




