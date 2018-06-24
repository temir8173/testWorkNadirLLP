<?php

require "config.php";

$good_id = $_POST['good_id'];




mysqli_query($connection, "
DELETE FROM `goods` WHERE `id` = $good_id");
?>