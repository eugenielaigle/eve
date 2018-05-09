
<?php get_header(); ?>


<!-- IMAGE / PHRASE DE PREZ -->
<div class="container-image">
  <img class ="image-couv" src="<?php the_field('image_couv'); ?>" alt="EVE Bordeaux">
  <div class="eve-presentation">
    <h1><?php the_field('phrase_presentation'); ?></h1>
    <?php
    $bouton= get_field('bouton_action');
    if ($bouton): ?>
    <a href="<?php echo $bouton['url']; ?>">
      <button><?php echo $bouton['title']; ?></button>
    </a>
  <?php endif ?>
</div> <!-- end eve-presentation -->
</div> <!-- end container-image -->


<!-- AGENDA / EVENTS -->
<div class="container-fluid container-events">
  <div class="row-events">
    <h2 class="agenda-title"><?php the_field('titre_agenda'); ?></h2>
    <div class="flex-events">


      <?php
      $loop = new WP_Query(array( 'post_type' => 'evenement', 'posts_per_page' => 4, 'paged' => $paged, 'orderby' => 'category' , 'order' => 'asc') );


if($loop->have_posts()) : while ($loop->have_posts() ) : $loop->the_post();

        $terms = get_the_terms( $post->ID , 'laboratoire' );
        if($terms) {
          foreach( $terms as $term ) {
            $term_id = $term->term_id;
          }
        }
        if (function_exists('get_wp_term_image'))
        {
          $meta_image = get_wp_term_image($term_id);
        }?>

        <figure class="effect-zoe">
          <img src="<?php echo $meta_image; ?>" alt="laboratoire"/>

          <h2><?php the_terms( $post->ID, 'laboratoire');?></h2>
          <figcaption>
           <h3><?php the_terms( $post->ID, 'type_event');?></h3>
           <p class="icon-links">
            <?php the_field('date_event'); ?>
          </p>
          <p class="description"><?php the_title(); ?></p>
        </figcaption>
      </figure>
    <?php endwhile;
  endif;
  wp_reset_postdata();?>

</div> <!-- end flex-events -->
</div> <!-- end row-events -->
</div> <!-- end container-events -->




<!-- DERNIERES PUBLICATIONS -->
<div class="container-fluid container-publications">
  <div class="row-publications">
    <h2 class="publications-title"><?php the_field('titre_publications'); ?></h2>
    <div class="flex-publications">

      <?php
      $recentPosts = new WP_Query();
      $recentPosts->query('showposts=2');

      while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

      <a class="publication-link" href="<?php the_permalink() ?>">
        <figure class="publication">
          <?php  the_post_thumbnail(); ?>
          <h2><?php the_title(); ?></h2>
        </figure>
      </a>

    <?php endwhile;
    wp_reset_postdata();?>

    <a class="dernieres-publications" href="<?php bloginfo('url'); ?>/publications/">
      <p>Découvrez toutes nos publications >></p>
    </a>
  </div> <!-- end flex-events -->
</div> <!-- end row-events -->
</div> <!-- end container-events -->


<!-- RESEAUX SOCIAUX -->
<div class="container-fluid container-reseaux-sociaux">
  <p class="phrase-reseaux-sociaux"><?php the_field('suivez_nous'); ?></p>
  <div class="row-reseaux-sociaux">
    <?php
    if( have_rows('ajouter_reseau') ):
      while ( have_rows('ajouter_reseau') ) : the_row();?>
      <a href="<?php the_sub_field('lien_rs')?>">
        <img src="<?php the_sub_field('icone_rs');?>" alt="">
      </a>
    <?php endwhile;
    endif;?>
  </div> <!-- end row-reseaux-sociaux -->
</div> <!-- end container-reseaux-sociaux -->


<!-- CONTACT -->
<div class="container-contact">
  <div class="phrase-contact"><?php the_field('phrase_contact'); ?></div>
  <?php
    $bouton= get_field('bouton_action_contact');
    if ($bouton): ?>
    <a href="<?php echo $bouton['url']; ?>">
      <button class="contact-button"><?php echo $bouton['title']; ?></button>
    </a>
  <?php endif ?>
</div> <!-- end container-contact -->

<?php get_footer(); ?>

