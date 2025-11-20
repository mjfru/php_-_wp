<!-- This will power the generic blog listing screen -->
<?php
get_header();
pageBanner(array(
  "title" => "All Programs",
  "subtitle" => "Our programs for your future."
));
?>

<!-- Container div for blog posts to exist in -->
<div class="container container--narrow page-section">
  <ul class="link-list min-list">

    <?php

    while (have_posts()) {
      the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
      </li>

    <?php }
    echo paginate_links();
    ?>

  </ul>
</div>
<?php get_footer(); ?>