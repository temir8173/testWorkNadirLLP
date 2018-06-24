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

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3><?php foreach( $categories as $cat )
            { if( $cat['id'] == $_GET['categorie']) {echo 'Товары в категории '.$cat['title'];}}?></h3>
              <div class="block__content">
                <div class="articles articles__horizontal">


                <!-- извлечение списка товаров определенной категорий из ДБ -->

              <?php
                
                $articles = mysqli_query($connection, "SELECT * FROM `goods` WHERE `categorie_id` = ". (int) $_GET['categorie']);

                if( (int) $_GET['categorie'] == 0 ) {
                  $articles = mysqli_query($connection, "SELECT * FROM `goods`");
                }
                
                $articles_exist = true;
                if( mysqli_num_rows($articles) <= 0 )
                {
                  echo "В данной категории нет товаров!<br><br>";
                  $articles_exist = false;
                }
                ?>



                <!-- кнопка добавления товара -->



                <?php if( isset($_SESSION['logged_user']) ) echo '<a href="/pages/add_good.php">Добавить товар</a><br><br>'; ?>


                <!-- вывод списка товаров определенной категорий -->



                <?php
                while( $art = mysqli_fetch_assoc($articles) )
                {
                  ?>
                  <article class="article">
                            
                    <div class="article__info">
                      <a href="goods.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
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
                        <small>Категория: <a href="good.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 50, 'utf-8'); ?> ...</div>



                    



                    </div>
                  </article>
                <?php
                }
                ?>
                  
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

 

</body>
</html>