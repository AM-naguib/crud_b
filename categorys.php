<?php
session_start();
require_once("./inc/header.php");
require_once("./core/fun.php");

$categorys = get_data('./data/category.json');
?>
<h1 class="text-center display-1 border-bottom p-3">All Categorys</h1>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <?php if (isset($_SESSION["success"])): ?>
                <div class="col-4 mx-auto">
                    <div class="alert alert-success">
                        <?= $_SESSION["success"] ?>
                    </div>
                </div>
                <?php
                unset($_SESSION["success"]);
            endif ?>
            <?php if (isset($_SESSION["erorr"])): ?>
                <div class="col-4 mx-auto">
                    <div class="alert alert-danger">
                        <?= $_SESSION["erorr"][0] ?>
                    </div>
                </div>
                <?php
                unset($_SESSION["erorr"]);
            endif ?>
            <table class="table table-borderd">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>edit</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorys as $key => $cat): ?>
                        <tr>

                            <td>
                                <?= $cat["name"]; ?>
                            </td>
                            <td><?= $cat["created_at"]; ?></td>
                            <td ><?= $cat["edited_at"]?? "" ?></td>
                            <td><a class="btn btn-primary"
                                    href="category-edit.php?id=<?= $key ?>&data=<?= $cat["name"] ?>">edit</a>
                            </td>
                            <td><a class="btn btn-danger" href="handel/handel-remove-category.php?id=<?= $key ?>">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once("./inc/footer.php");

?>