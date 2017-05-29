<?php
// testdelete is set
if (isset($_GET['delete'])) {
    $prepare = $pdo->prepare('DELETE FROM cheese_inventory WHERE id=:id');
    $prepare -> bindValue('id', $_GET['delete']); //the id of the item delete is in the get variable
    $prepare -> execute();
    header('Location: index.php'); //relaunch the page
}