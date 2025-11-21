<!-- This will power the generic blog listing screen -->
<?php
get_header();
pageBanner(array(
  "title" => "All Events",
  "subtitle" => "See what's happening at our school",
));
?>

<!-- Container div for blog posts to exist in -->
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content-event');
  }
  echo paginate_links();

  ?>
  <hr class="section-break">
  <p>Looking for a recap of our past events?
    <a href="<?php echo site_url('/past-events') ?>">Check out our past events</a>
  </p>

</div>
<?php get_footer(); ?>