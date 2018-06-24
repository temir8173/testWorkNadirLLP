<?php

	require "config.php";

	$data = $_POST;

		$errors = array();
		$user = mysqli_query($connection, "SELECT * FROM  `users` WHERE login = '".$_POST['login']."'");
		var_dump($user);
		$user_num = mysqli_num_rows($coincidences);

		if( $user_num > 0 ) {

			// login exist
			if( password_verify($data['password'], $user->password)) {
				// all right, get login user
				$_SESSION['logged_user'] = $user;
				echo '<div style="color: green;">Вы авторизованы!</div><hr>';
			} else
			{
				$errors[] = 'Неверный пароль!';
			}
		} 
		else {

			$errors[] = 'Пользователь с таким логином не существует!';
		}

		if( !empty($errors) ) {
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		} 


?>