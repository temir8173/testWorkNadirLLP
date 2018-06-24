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

    <?php include "../includes/header.php" ?>

    <?php
      $article = mysqli_query($connection, "SELECT * FROM `goods` WHERE `id` = " . (int) $_GET['id']);
      if( mysqli_num_rows($article) <= 0)
      {
        ?>
          <div id="content">
            <div class="container">
              <div class="row">
                <section class="content__left col-md-8">
                  <div class="block">
                    
                    <h3>Товар не найден!</h3>
                    <div class="block__content">
                      <div class="full-text">
                        Запрашиваемый вами товар не существует!
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
      } else
      {
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection, "UPDATE `goods` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id'] );
        ?>
          <div id="content">
            <div class="container">
              <div class="row">
                <section class="content__left col-md-8">
                  <div class="block">
                    <a>Просмотров: <?php echo $art['views']; ?></a>
                    <h3><?php echo $art['title']; ?></h3>
                    <div class="block__content">
                      <img src="../static/images/<?php echo $art['image']?>" alt="" style="max-width: 100%">
                      <div class="full-text">
                        <?php echo $art['text']; ?>
                      </div>
                    </div>



                    <!-- Кнопка редактирования товара -->
                  
                  <br>

                  <div <?php if( isset($_SESSION['logged_user']) ) {  } else { echo 'class="hidden"'; } ?>>
                    <a href="red_good.php?id=<?php echo $art['id']; ?>">Редактировать</a>
                  </div><br>
                
                
                
                  <!-- Кнопка удаления товара -->



                  <div <?php if( isset($_SESSION['logged_user']) ) {  } else { echo 'class="hidden"'; } ?>>
                    <form id="del_good" action="#">
                    <input type="text" name="good_id" hidden value="<?php echo $art['id']?>">
                    <button>Удалить</button>
                    </form>
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
      }
    ?>

<?php include "../includes/footer.php" ?>

  </div>

    <script src="../media/js/jquery-3.1.1.min.js"></script>
    <script src="../media/js/bootstrap.min.js"></script>
   <script>
     $(document).ready(function() {
   
       $("#del_good").submit(function() {
         $.ajax({
           type: "POST",
           url: "../includes/del_good.php",
           data: $(this).serialize()
         }).done(function() {
           alert("Товар успешно удален!");
           $("#del_good").trigger("reset");
         });
         location.reload();
         return false;
       });
       
     });
   
   
   
   </script>

</body>
</html>