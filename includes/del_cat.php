<?php

require "config.php";

$categorie = $_POST['categorie_id'];
mysqli_query($connection, "DELETE FROM  `goods_categories` WHERE  `goods_categories`.`id` = $categorie;");
?>
