<?php
  require "../includes/config.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Илиясов Темирлан</title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" href="../media/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include "../includes/header.php" ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              
              <h3>Правообладателям</h3>
              <div class="block__content">
                <div class="full-text">
Текст о копирайте ...
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
<?php include "../includes/footer.php" ?>

  </div>

</body>
</html>