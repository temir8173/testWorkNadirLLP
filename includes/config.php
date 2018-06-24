<?php

$config = array(
	'title' => 'Каталог товаров',
	'vk_url' => 'http://vk.com/id104207460',
	'db' => array(
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'name' => 'test_goods'
		)

);

require "db.php";

session_start();