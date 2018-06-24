

<div class="block">
  <h3>Хиты продаж</h3>
  <div class="block__content">
    <div class="articles articles__vertical">

      <?php
        $articles = mysqli_query($connection, "SELECT * FROM `goods` ORDER BY `views` DESC LIMIT 5");
      ?>

      <?php
      while( $art = mysqli_fetch_assoc($articles) )
      {
      ?>
      <article class="article">
        
        <div class="article__info">
          <a href="../pages/goods.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
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
          <small>Категория: <a href="../pages/good.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
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

