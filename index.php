<?php
  require "includes/config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title'] ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" href="media/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include "includes/header.php"; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/pages/good.php">Все товары</a>
              <h3>Новинки</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                
                

                <!-- Кнопка добавления товара -->



                <?php if( isset($_SESSION['logged_user']) ) echo '<a href="/pages/add_good.php">Добавить товар</a><br><br>'; ?>
                      
                
                <!-- Список товаров извлекаемый из БД -->
                <div class="article__info">
                <?php

                $articles = mysqli_query($connection, "SELECT * FROM `goods` ORDER BY `id` DESC LIMIT 10");
                              
                while( $art = mysqli_fetch_assoc($articles) )
                {

                ?>
                
                <article class="article">
                  <div class="article__info">
                             
                  <a href="/pages/goods.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                  <div class="article__info__meta">
                  <?php  
                    $art_cat = false;
                    foreach( $categories as $cat )
                    {
                      if ( $cat['id'] == $art['categorie_id'])
                      {
                        $art_cat = $cat;
                        break;
                      }
                    }
                  ?>
                    <small>Категория: <a href="/pages/good.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                  </div>
                  <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 50, 'utf-8'); ?> ...</div><br>
                  
                  
                  



                </div>
              </article>

            <?php
              }
            ?>

            <!-- Конец списка товаров -->
                  


                </div>
              </div>
            </div>

            

          
          </section>
          <section class="content__right col-md-4">
            
            <?php include "includes/sidebar.php" ?>

          </section>
        </div>
      </div>
    </div>

<?php  
  include "includes/footer.php"
?>

  </div>


  <script src="media/js/jquery-3.1.1.min.js"></script>
  <script src="media/js/bootstrap.min.js"></script>


</body>
</html>