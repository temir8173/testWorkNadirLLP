<?php

require "config.php";

$categorie = $_POST['categorie'];
//var_dump("INSERT INTO `goods_categories` (`title`) VALUES ('$categorie');");die;
mysqli_query($connection, "INSERT INTO `goods_categories` (`id`, `title`) VALUES (NULL, '$categorie');");
?>