<?php
session_start();
require_once("./inc/header.php");
if (isset($_GET["id"]) && isset($_GET["id"])) {
    $category_id = $_GET["id"];
    $category_name = $_GET["data"];
} else {
    header("location:categorys.php");
}

?>
<div class="container">
    <div class="row">
        <h1 class="text-center display-1 my-2 border-bottom p-3">Edit Category</h1>
        <form action="handel/handel-edit-category.php" method="POST">
            <div class="col-4 mx-auto">
                <div class="my-4">
                    <label for="">Edit : </label>
                    <input type="text" value="<?= $category_id ?>" name="id" class="d-none">
                    <input type="text" name="category_data" value="<?= $category_name ?>" class="form-control my-2 ">
                </div>
                <div class="my-4">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>