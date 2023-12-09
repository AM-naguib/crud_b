<?php
session_start();
require_once "inc/header.php";

require_once "core/fun.php";
// $count_cat = count(get_data("./data/category.json"));

?>
<h1 class="text-center display-1 border-bottom p-3">Category</h1>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <?php if (isset($_SESSION["erorrs"])): ?>
                <?php foreach ($_SESSION["erorrs"] as $erorr): ?>
                    <div class="alert alert-danger">
                        <?= $erorr; ?>
                    </div>
                <?php endforeach ?>
                <?php
                unset($_SESSION["erorrs"]);
            endif ?>
            <?php if (isset($_SESSION["success"])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION["success"]; ?>
                </div>
                <?php
                unset($_SESSION["success"]);
            endif ?>
            <form action="handel/handel-enter-category.php" method="POST">
                <div class="my-3">
                    <label for="">Enter Category : </label>
                    <input type="text" name="category" class="form-control my-2">
                </div>
                <div class="my-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 

require_once "inc/footer.php";
?>