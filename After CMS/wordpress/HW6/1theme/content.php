<div id="preloader-container">
<div id="container">
<?php 

$arg = array(
    'type' => 'post',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => True
  );
  $all_categories = get_categories( $arg );

  $args = array (
      'post_type'=>'post',
      'order'=>'ASC'
    );
  $query = new WP_Query($args);

if($query->have_posts()){
  while($query->have_posts()){
    foreach($all_categories as $category) {
      $class_name = "portfolio";
      $class_name  .= " " . $category->slug;

      $query->the_post();
?>
  
  <div class="widget web homepage <?php echo $class_name;?>">
    <div class="entry-container span4">
    
      <!-- Portfolio Image -->
      <div class="entry-image">
        <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="fancybox">
          <span class="entry-image-overlay"></span>
          <?php the_post_thumbnail('medium'); ?>
        </a>
      </div>

      <div class="entry drop-shadow curved ">

        <!-- Portfolio Heading -->
        <h5 class="heading">
          <a href="portfolio-single.html">
            <?php the_title(); ?>
          </a>
        </h5>
        <div class="entry-footer">
          <ul>
            <li class="left">گرافیک</li>
            <li>توسط :<?php the_author() ?></li>
            <li class="right no-margin"><div class="icon like"></div> 3</li>
      
          </ul>
        </div>

        <p><?php the_excerpt(); ?></p>
          
        <div class="stripes"></div>
      </div>      
    </div>
  </div>
<?php
  }
  } //END WHILE
  } //END IF
  wp_reset_postdata();
?>
</div>
</div>