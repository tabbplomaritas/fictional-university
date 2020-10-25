<?php

get_header();

while(have_posts()) {
	the_post(); ?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');
        ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>REPLACE ME LATER</p>
            </div>
        </div>
  </div>

  <div class="container container--narrow page-section"> 
     <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>
    <div class="generic-content">
      <?php the_content(); ?>
    </div>

    <?php 

    $relatedProfessors = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'professor',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        )
      )
    ));

  if ($relatedProfessors->have_posts()){
    echo '<hr class="section-break">';
    echo '<h2 class="headline headline--medium">Upcoming '. get_the_title() . ' Events</h2>';

    while($relatedProfessors->have_posts()){
      $relatedProfessors->the_post(); ?>
      <li><a href="<?php the_permalink(); ?>"></a><?php the_title(); ?></li>
    <?php }
  }

      $relatedPrograms = get_field('related_programs');
      if($relatedPrograms){
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">Related Programs</h2>';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program){ ?>
          <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>

        <?php }
          echo '</ul>';
        }
     ?>
  </div>


<?php }

get_footer();

?>
