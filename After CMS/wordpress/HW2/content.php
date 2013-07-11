<section class="content">
  <?php
    if( have_posts() ){
  ?>
    <?php
      the_post();
    ?>
    <article>
      <h2>
        <?php
          the_title();
        ?>
      </h2>
      <p>
        <?php
          the_content();
        ?>
      </p>
    </article>
    <?php
      } else {
        get_template_part('404');
      }
    ?>
</section>