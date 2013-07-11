<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php bloginfo('name'); wp_title(); ?></title>
  <link href="<?php bloginfo('template_url'); ?>\style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <nav>
      <menu>
        <?php
          wp_list_pages( array( 'title_li' => '' ) );
        ?>
      </menu>
    </nav>
  <header>header</header>