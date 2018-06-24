<?php

require "config.php";

$good_name = $_POST['good_name'];
$text = $_POST['text'];
$categorie_id = $_POST['categorie_id'];
$good_id = $_POST['good_id'];




mysqli_query($connection, "

UPDATE  `goods` SET  `title` =  '$good_name',
`text` =  '$text',
`categorie_id` =  '$categorie_id' WHERE  `id` = $good_id;

	");
?>