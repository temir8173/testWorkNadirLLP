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
                  <h3>Редактирование списка категорий</h3>
                  <div class="block__content">
                    <div class="articles articles__horizontal">











<h4>Создание новой категории</h4><br>
<form id="add_cat" action="#">
	<input name="categorie" type="text" placeholder="Введите название категории"><br><br>
	<button type="submit">Добавить категорию</button><br><br><br>
</form>


<?php
    $categories_q = mysqli_query($connection, "SELECT * FROM `goods_categories`");
    $categories = array();
    while( $cat = mysqli_fetch_assoc($categories_q) )
    {
      $categories[] = $cat;
    }
  ?>

<h4>Удаление категории</h4><br>
<form id="del_cat" action="#">
	<select name="categorie_id">
		<?php
            foreach( $categories as $cat )
            {
              ?>
              <option value="<?php echo $cat['id'];?>"><?php echo $cat['title'];?></option>
              <?php
            }
          ?>
	</select><br><br>
	<button type="submit">Удалить категорию</button><br><br><br>
</form>

<h4>Переименование категорий</h4><br>
<form id="red_cat" action="#">
  <select name="categorie_id">
    <?php
            foreach( $categories as $cat )
            {
              ?>
              <option value="<?php echo $cat['id'];?>"><?php echo $cat['title'];?></option>
              <?php
            }
          ?>
  </select><br><br>
  <input name="categorie" type="text" placeholder="Введите название категории"><br><br>
  <button type="submit">Изменить категорию</button>
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
  <script>
    $(document).ready(function() {

      $("#add_cat").submit(function() {
        $.ajax({
          type: "POST",
          url: "../includes/add_cat.php",
          data: $(this).serialize(),
          success: function(data){
            $(this).find("input").val("");
            alert("Категория успешно добавлена!");
            $("#add_cat").trigger("reset");
          }
        });

        location.reload();
        return false;
      });
      
    });

    $(document).ready(function() {

      $("#del_cat").submit(function() {
        $.ajax({
          type: "POST",
          url: "../includes/del_cat.php",
          data: $(this).serialize()
        }).done(function() {
          $(this).find("input").val("");
          alert("Категория успешно удалена!");
          $("#del_cat").trigger("reset");
        });
        location.reload();
        return false;
      });
      
    });

    $(document).ready(function() {

      $("#red_cat").submit(function() {
        $.ajax({
          type: "POST",
          url: "../includes/red_cat.php",
          data: $(this).serialize()
        }).done(function() {
          $(this).find("input").val("");
          alert("Категория успешно отредактирована!");
          $("#red_cat").trigger("reset");
        });
        location.reload();
        return false;
      });
      
    });




  </script>

</body>
</html>

