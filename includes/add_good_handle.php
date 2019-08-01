<?php

require "config.php";

$good_name = $_POST['good_name'];
$text = $_POST['text'];
$categorie_id = $_POST['categorie_id'];



mysqli_query($connection, "

INSERT INTO  `test_goods`.`goods` (

`title` ,

`text` ,
`categorie_id` 
)
VALUES ('$good_name',  '$text',  '$categorie_id'
);

	");
?>