<?php

require "config.php";

$categorie = $_POST['categorie'];
mysqli_query($connection, "INSERT INTO `goods_categories` (`id`, `title`) VALUES (NULL, '$categorie');");
?>