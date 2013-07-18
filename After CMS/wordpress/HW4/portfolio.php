<!-- Portfolio Start -->
<section id="portfolio" class="page">
<article class="container">
  <div class="row">
      <div class="span12">
          <div class="sub_header">
            <h2>Portfolio</h2>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="portfolio_container clearfix">

      <?php
        while( have_posts() ) {
          the_post();
      ?>

      <div class="element span4">
        <?php if(has_post_thumbnail()){ ?>
        <div class="portfolio_img">
          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="pf_img" alt="img" />
          <article class="portfolio_link">
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="example7 zoom" title="<h3><?php the_title(); ?></h3>
              <?php the_content(); ?>"> 
            <img src="images/zoom_icon.png" alt="img" />
            </a>
          </article>
        </div>
        <?php 
          }
          else{
          }
        ?>
        <article class="content">
          <span class="strip"></span>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
        </article>
      </div> 
      <?php 
        } 
      ?>  
    </div>
  </div>  
</article>
</section>
<!-- Portfolio End -->