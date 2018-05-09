<div class="container-footer">
  <a class="logo-footer" href="<?php bloginfo('url'); ?>">
    <img src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo_bleu.jpg">
  </a>
    <p class="footer-sentence">EVE Think Tank 2018</p>
    <?php wp_nav_menu([
    'menu'            => 'footer',
    'theme_location'  => 'footer',
    'container'       => 'p',
    'container_id'    => 'menu-footer',
    'container_class' => 'collapse navbar-collapse',
    'menu_class'      => 'navbar-nav',
  ]);
  ?>

</div> <!-- end container-footer -->

<?php wp_footer(); ?>
</body>
</html>
