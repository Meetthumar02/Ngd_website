<?php
/**
 * Template Name: White Label Mobile App Development Services
 * Description: High-converting White Label Mobile App Development landing page for NGD Technolab (100% Native Elementor)
 */

// Disable Porto breadcrumbs & page title, and force fullwidth
add_filter('porto_meta_layout', function($layout) {
    return array('widewidth', '', '');
});
add_filter('porto_show_breadcrumbs', '__return_false');
global $porto_settings;
if (isset($porto_settings)) {
    $porto_settings['show-breadcrumbs'] = false;
    $porto_settings['show-pagetitle'] = false;
}

get_header();
?>

<main class="wl-page-wrapper wl-mobile-page">
<?php
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
?>
</main>

<?php
get_footer();