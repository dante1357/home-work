<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php bloginfo('name'); wp_title(); ?></title>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>\style.css">
</head>
<body>
  <header>
    <div>
      <article class="yourName">
        <h1>Tony Stark</h1>
        <h2>Web designer & UI designer</h2>
      </article>
      <nav>
        <menu>
          <?php
            wp_nav_menu(array(
              'theme_location'  => 'mainmenu',
              'container'       => 'menu', 
              'container_class' => '', 
              'menu_class'      => '', 
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => ''
            ));
          ?>
        </menu>
      </nav>
    </div>
  </header>