<header id="header">
  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1><?php echo $config['title'] ?></h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="/">Все категории</a></li>
          <li><a href="/pages/about_me.php">Обо мне</a></li>
        </ul>
      </nav>
    </div>
 
  


      <?php

      require "config.php";

      $data = $_POST;
      if( isset($data['do_signin']) ) 

      {

        $errors = array();
        $user = mysqli_query($connection, "SELECT * FROM  `users` WHERE login = '".$_POST['login_2']."'");
        $user_info = mysqli_fetch_assoc($user);
        $user_num = mysqli_num_rows($user);
        $entered_pass = $data['password'];

        if( $user_num > 0 ) {

          // логин существует
          if( password_verify($entered_pass, $user_info['password'])) {
            // логинимся
            $_SESSION['logged_user'] = $user_info;
           
          } else
          {
            $errors[] = 'Неверный пароль!';
          }
        } 
        else {

          $errors[] = 'Пользователя с таким логином не существует!';
        }

        


      ?>
  
    <div class="container">
        <nav class="header__top__menu">


      <?php

          if( !empty($errors) ) {
          echo '<div style="color: red;">'.array_shift($errors).'</div><br>';
        } 

      } else {
          echo '<div class="container">
        <nav class="header__top__menu">';
        }


      ?>





        <?php if( isset($_SESSION['logged_user']) ) : echo 'Привет, ' . $_SESSION['logged_user']['login']; ?>
          <br><br><a href="/includes/logout.php">Выйти</a>
        <?php else : ?>

        <form action="" method="POST">

          <input type="text" name="login_2" required placeholder="Логин" value="<?php echo $_POST['login_2']; ?>">
          <input type="password" name="password" required placeholder="Пароль">

          <button type="submit" name="do_signin">Войти</button>
        </form>
        <br>
      <a href="../pages/signup.php">Регистрация</a>
    <?php endif; ?>
      </nav>
    </div>
  
  
  
  
  </div>

  




  <?php
    $categories_q = mysqli_query($connection, "SELECT * FROM `goods_categories`");
    $categories = array();
    while( $cat = mysqli_fetch_assoc($categories_q) )
    {
      $categories[] = $cat;
    }
  ?>

  <div class="header__bottom">
    <div class="container">
      <nav>
        <ul>
          <?php
            foreach( $categories as $cat )
            {
              ?>
              <li><a href="../pages/good.php?categorie=<?php echo $cat['id']; ?>"><?php echo $cat['title'];?></a></li>
              <?php
            }
          ?>
          <?php if( isset($_SESSION['logged_user']) ) echo '<li><a href="../pages/add.php">+</a></li>'; ?>



         

        </ul>
      </nav>
    </div>
  </div>
</header>