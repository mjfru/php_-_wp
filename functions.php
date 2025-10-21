
<?php
// Not a template file, this is private, behind-the-scenes file

function university_files()
{
  // The first argument is what type of instructions we're giving.
  // The second argument is the name of a function we want to run.
  wp_enqueue_style('university_main_styles', get_theme_file_uri("/build/style-index.css"));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri("/build/index.css"));
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

  // JS
  // The first argument is what type of instructions we're giving (we choose the name)
  // The second argument is the function we're running and what it takes
  // The third argument is if this script has any dependencies (can be null)
  // The fourth is the version number for your script, depends on your choice
  // Last is if we want to defer, like writing in the head of an HTML file
  wp_enqueue_script('main-university-js', get_theme_file_uri("/build/index.js"), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
  // register_nav_menu('headerMenuLocation', 'Header Menu Location');
  // register_nav_menu('footerLocationOne', 'Footer Location One');
  // register_nav_menu('footerLocationTwo', 'Footer Location Two');
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query)
{
  $today = date('Ymd');
  if (
    !is_admin() and
    is_post_type_archive('event') and
    $query->is_main_query()
  ) {
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric',
      )
    ));
  }
};
add_action('pre_get_posts', 'university_adjust_queries');
