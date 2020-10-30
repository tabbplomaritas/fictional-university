<?php

get_header();

while(have_posts()) {
	the_post(); 

  ?>
  
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
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('student'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Students</a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>
    <div class="generic-content">
      <div class="row group">
          <div class="one-third">
              <?php the_post_thumbnail('professorPortrait'); ?>
          </div>
          <div class="two-thirds">
            <?php the_content(); ?>
          </div>
      </div>
    </div>

    <?php 
        $studentCommunities = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'community',
          'meta_key' => 'student_members',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'student_members',
              'compare' => 'LIKE',
              'value' => get_the_ID()
            )
          )
        ));
        echo '<hr class="section-break">';
        echo '<h2 class="healine headline--medium">Student Community Membership</h2>';
        echo '<ul class="professor-cards">';
            while($studentCommunities->have_posts()){
              $studentCommunities->the_post(); ?>
            <li class="professor-card__list-item">
              <a class="professor-card" href="<?php the_permalink(); ?>">
                <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="">
                <span class="professor-card__name"><?php the_title(); ?></span>
              </a>
            </li>    
            <?php }
          echo ' </ul> ';
           ?>
<?php }

get_footer();

?>
