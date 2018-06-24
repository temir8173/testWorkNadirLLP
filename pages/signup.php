<?php
  require "../includes/config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title'] ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" href="../media/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="../media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include "../includes/header.php"; ?>

    <div class="container">
            <div class="row">
              <section class="content__left col-md-8">
                <div class="block">
                  <h3>Регистрация</h3>
                  <div class="block__content">
                    <div class="articles articles__horizontal">



<?php


$data = $_POST;
if( isset($data['do_signup']) ) {
  // reg

  $errors = array();

  // проверка логина на совпадение в БД

  $coincidences = mysqli_query($connection, "SELECT * FROM  `users` WHERE login = '".$_POST['login']."'");
  $coincidences_num = mysqli_num_rows($coincidences);
  
  if( $coincidences_num > 0 ) {
    $errors[] = 'Пользователь с таким именем уже существует!';
  }

  // проверка пароля

  if( $data['password_2'] != $data['password'] ) {
    $errors[] = 'Пароли не совпадают!';
  }


  if( empty($errors) ) {

    // регистрируем

    $login = $data['login'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
   
    mysqli_query($connection, "INSERT INTO  `users` (`login` , `password`  ) VALUES ('$login',  '$password');  ");


    echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';
  } else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }

}

?>

<form action="signup.php" method="POST">
  
  <input type="text" name="login" required placeholder="Введите имя" value="<?php echo @$data['login']; ?>"><br><br>
  <input type="password" name="password" required placeholder="Введите пароль"><br><br>
  <input type="password" name="password_2" required placeholder="Введите повторно пароль"><br><br>

  <button type="submit" name="do_signup">Зарегистрироваться</button>


</form>




            </div>


            </div>
            </div>

          
          </section>
          <section class="content__right col-md-4">
            
            <?php include "../includes/sidebar.php" ?>

          </section>
        </div>
      </div>
    </div>






<?php  
  include "../includes/footer.php"
?>

  </div>


<script src="../media/js/jquery-3.1.1.min.js"></script>
<script src="../media/js/main.js"></script>


</body>
</html>

