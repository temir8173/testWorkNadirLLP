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
                  <h3>Добавление товара</h3>
                  <div class="block__content">
                    <div class="articles articles__horizontal">






<form id="add_good" action="#">
  
  <input type="text" name="good_name" required placeholder="Имя товара"><br><br>
  <textarea name="text" required id="text_good" cols="30" rows="10"></textarea><br><br>
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
  <button>Добавить</button>


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
 
     $("#add_good").submit(function() {
       $.ajax({
         type: "POST",
         url: "../includes/add_good_handle.php",
         data: $(this).serialize()
       }).done(function() {
         $(this).find("input").val("");
         alert("Товар успешно добавлен!");
         $("#add_good").trigger("reset");
       });
       location.reload();
       return false;
     });
     
   });
 
 
 
 </script>

</body>
</html>

