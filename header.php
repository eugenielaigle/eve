<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EVE</title>
  <?php wp_head(); ?>
</head>
<body>

<div class="container-fluid no-padding container-margin-body">
<div class="container-fluid container-header">
  <nav class="navbar navbar-expand-md navbar-light bg-faded">
  <a class="navbar-brand xs-visible" href="<?php bloginfo('url'); ?>">
    <img class="img-responsive logo" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo_blanc.jpg">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php
  wp_nav_menu([
    'menu'            => 'top',
    'theme_location'  => 'top',
    'container'       => 'div',
    'container_id'    => 'bs4navbar',
    'container_class' => 'collapse navbar-collapse',
    'menu_id'         => false,
    'menu_class'      => 'navbar-nav ml-auto',
    'depth'           => 2,
    'fallback_cb'     => 'bs4navwalker::fallback',
    'walker'          => new bs4navwalker()
  ]);
  ?>
</nav>
</div> <!-- end container-header -->
</div> <!-- end container-margin-body -->


