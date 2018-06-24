<?php

require "config.php";

$categorie_id = $_POST['categorie_id'];
$categorie = $_POST['categorie'];
mysqli_query($connection, "UPDATE `goods_categories` SET  `title` = '$categorie' WHERE  `goods_categories`.`id`= $categorie_id;");
?>