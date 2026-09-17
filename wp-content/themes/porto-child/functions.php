<?php

add_action( 'wp_enqueue_scripts', 'porto_child_css', 1001 );

// Load CSS
function porto_child_css() {
	// porto child theme styles
	wp_deregister_style( 'styles-child' );
	$ver = file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : time();
	wp_register_style( 'styles-child', esc_url( get_stylesheet_directory_uri() ) . '/style.css', array(), $ver );
	wp_enqueue_style( 'styles-child' );

	if ( is_rtl() ) {
		wp_deregister_style( 'styles-child-rtl' );
		wp_register_style( 'styles-child-rtl', esc_url( get_stylesheet_directory_uri() ) . '/style_rtl.css', array(), $ver );
		wp_enqueue_style( 'styles-child-rtl' );
	}
}


function portfolio_tab_slider_script() {
?>
<script>
window.addEventListener("load", function () {

    function initSlider(wrapper) {

        if (!wrapper) return;

        let slider = wrapper.querySelector(".slide-bg");

        if (!slider) {
            slider = document.createElement("span");
            slider.className = "slide-bg";
            wrapper.prepend(slider);
        }

        const tabs = wrapper.querySelectorAll(".ue_taxonomy_item");
        if (!tabs.length) return;

        function moveSlider(activeTab) {

            const wrapperRect = wrapper.getBoundingClientRect();
            const tabRect = activeTab.getBoundingClientRect();
            const offset = tabRect.left - wrapperRect.left;

            slider.style.width = tabRect.width + "px";
            slider.style.transform = "translate3d(" + offset + "px,0,0)";
        }

        const active = wrapper.querySelector(".uc-selected") || tabs[0];
        if (active) moveSlider(active);

        tabs.forEach(tab => {
            tab.addEventListener("click", function () {

                setTimeout(() => {
                    const newActive = wrapper.querySelector(".uc-selected");
                    if (newActive) moveSlider(newActive);
                }, 50);

            });
        });

        window.addEventListener("resize", function () {
            const activeTab = wrapper.querySelector(".uc-selected");
            if (activeTab) moveSlider(activeTab);
        });
    }

    function initAllFilters() {
        document.querySelectorAll(".ue_taxonomy").forEach(wrapper => {
            initSlider(wrapper);
        });
    }

    // Observe AJAX changes (Elementor reload)
    const observer = new MutationObserver(function() {
        initAllFilters();
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    // Initial load
    initAllFilters();

});
</script>
<?php
}
add_action('wp_footer', 'portfolio_tab_slider_script', 100);

// Home page sldier


// End Home Page Slider


function custom_elementor_file_upload() {
?>
<script>
jQuery(window).on('elementor/frontend/init', function () {

    function initFileUpload() {

        jQuery('.pop-up-form .elementor-field-type-upload').each(function(){

            if (jQuery(this).find('.file-text').length === 0) {
                jQuery(this).prepend('<span class="file-text">Upload Resume File*</span>');
            }

        });

        jQuery(document).on('change', '.pop-up-form input[type="file"]', function(){

            var fileName = this.files.length ? this.files[0].name : '';
            var wrapper = jQuery(this).closest('.elementor-field-type-upload');

            if(fileName){
                wrapper.find('.file-text')
                       .text(fileName)
                       .css('color','#000');
            } else {
                wrapper.find('.file-text')
                       .text('Upload Resume File*')
                       .css('color','#777');
            }

        });
    }

    initFileUpload();

});
</script>

<script>
jQuery(window).on('elementor/frontend/init', function () {

    function initFileUpload() {

        jQuery('.pop-up-forms .elementor-field-type-upload').each(function(){

            if (jQuery(this).find('.file-text').length === 0) {
                jQuery(this).prepend('<span class="file-text">Upload project File*</span>');
            }

        });

        jQuery(document).on('change', '.pop-up-forms input[type="file"]', function(){

            var fileName = this.files.length ? this.files[0].name : '';
            var wrapper = jQuery(this).closest('.elementor-field-type-upload');

            if(fileName){
                wrapper.find('.file-text')
                       .text(fileName)
                       .css('color','#000');
            } else {
                wrapper.find('.file-text')
                       .text('Upload project File*')
                       .css('color','#777');
            }

        });
    }

    initFileUpload();

});
</script>

<?php
}
add_action('wp_footer', 'custom_elementor_file_upload', 100);


// blogs

/**
 * Keep "Blogs" nav item active on single post pages
 */
// function ngd_keep_blog_nav_active( $classes, $item, $args = null ) {
//     if ( is_single() && get_post_type() === 'post' ) {
        
//         $blog_page_id = get_option( 'page_for_posts' );

//         if ( ! empty( $blog_page_id ) && isset( $item->object_id ) && (int) $item->object_id === (int) $blog_page_id ) {
//             $classes[] = 'current-menu-item';
//             $classes[] = 'current-menu-ancestor';
//             $classes[] = 'current_page_item';
//             $classes[] = 'active';
//         }
//     }

//     return $classes;
// }
// add_filter( 'nav_menu_css_class', 'ngd_keep_blog_nav_active', 10, 3 );


function ngd_keep_cpt_nav_active($classes, $item, $args = null) {

    /* -----------------------------
       Blog Single Post
    ------------------------------*/
    if ( is_singular('post') ) {

        $blog_page_id = (int) get_option('page_for_posts');

        if ( $blog_page_id && isset($item->object_id) && (int)$item->object_id === $blog_page_id ) {

            $classes[] = 'current-menu-item';
            $classes[] = 'current-menu-ancestor';
            $classes[] = 'current_page_item';
            $classes[] = 'active';
            $classes[] = 'ubermenu-current-menu-item';
        }
    }


    /* -----------------------------
       Portfolio Single
    ------------------------------*/
    if ( is_singular('portfolio') ) {

        $portfolio_page = get_page_by_path('portfolio');

        if ( $portfolio_page && isset($item->object_id) && (int)$item->object_id === (int)$portfolio_page->ID ) {

            $classes[] = 'current-menu-item';
            $classes[] = 'current-menu-ancestor';
            $classes[] = 'current_page_item';
            $classes[] = 'active';
            $classes[] = 'ubermenu-current-menu-item';
        }
    }


    /* -----------------------------
       Case Study / Member Single
    ------------------------------*/
    if ( is_singular('member') ) {

        $case_page = get_page_by_path('case-study');

        if ( $case_page && isset($item->object_id) && (int)$item->object_id === (int)$case_page->ID ) {

            $classes[] = 'current-menu-item';
            $classes[] = 'current-menu-ancestor';
            $classes[] = 'current_page_item';
            $classes[] = 'active';
            $classes[] = 'ubermenu-current-menu-item';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'ngd_keep_cpt_nav_active', 10, 3);

/*
|--------------------------------------------------------------------------
| Custom Blog Permalink
|--------------------------------------------------------------------------
*/
function custom_blog_permalink($permalink, $post) {

    if ($post->post_type === 'post' && $post->post_status === 'publish') {
        return home_url('/blog/' . $post->post_name . '/');
    }

    return $permalink;
}
add_filter('post_link', 'custom_blog_permalink', 10, 2);


/*
|--------------------------------------------------------------------------
| Rewrite Rules
|--------------------------------------------------------------------------
*/
function custom_blog_rewrite() {

    // Blog listing page
    add_rewrite_rule(
        '^blog/?$',
        'index.php?pagename=blog',
        'top'
    );

    // Single blog page
    add_rewrite_rule(
        '^blog/([^/]+)/?$',
        'index.php?post_type=post&name=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_blog_rewrite');


/*
|--------------------------------------------------------------------------
| Disable Default Post URL
|--------------------------------------------------------------------------
*/
function ngd_disable_default_post_url() {

    if (is_single() && get_post_type() === 'post') {

        $request_uri = trim($_SERVER['REQUEST_URI'], '/');

        // agar URL blog/ se start nahi hota
        if (!preg_match('#^blog/#', $request_uri)) {

            global $wp_query;

            $wp_query->set_404();

            status_header(404);

            nocache_headers();

            include(get_query_template('404'));

            exit;
        }
    }
}
add_action('template_redirect', 'ngd_disable_default_post_url');
// function add_read_time_to_title($title, $id) {

//     if (is_admin()) return $title;

//     if (is_singular('post') && in_the_loop() && is_main_query()) {
//         $content = get_post_field('post_content', $id);
//         $word_count = str_word_count(strip_tags($content));
//         $reading_time = ceil($word_count / 200);

//         $title .= ' <span class="read-time">
//             <i class="fas fa-clock"></i> ' . $reading_time . ' minutes read
//         </span>';
//     }

//     return $title;
// }

// add_filter('the_title', 'add_read_time_to_title', 10, 2);
function company_experience() {
    $start_year = 2012; // Company start year
    $current_year = date('Y');
    $experience = $current_year - $start_year;

    return $experience;
}
add_shortcode('experience', 'company_experience');

// add_filter( 'wpseo_breadcrumb_links', function( $links ) {

//     if ( is_single() ) {

//         $blog_link = array(
//             'url'  => home_url('/blog/'),
//             'text' => 'Blog',
//         );

//         array_splice( $links, 1, 0, array( $blog_link ) );
//     }

//     return $links;
// });
add_filter( 'wpseo_breadcrumb_links', function( $links ) {

    // Sirf default Blog Posts ke liye
    if ( is_single() && get_post_type() === 'post' ) {

        $blog_link = array(
            'url'  => home_url('/blog/'),
            'text' => 'Blog',
        );

        array_splice( $links, 1, 0, array( $blog_link ) );
    }

    return $links;
});

// 1. Remove jQuery Migrate
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            [ 'jquery-migrate' ]
        );
    }
});

// 2. Disable emoji script/style
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// 3. Remove oEmbed junk
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// 4. Remove WP generator / version leaks
remove_action( 'wp_head', 'wp_generator' );

// 5. Disable XML-RPC (security + weight)
add_filter( 'xmlrpc_enabled', '__return_false' );

/*
|--------------------------------------------------------------------------
| Career Custom Post Type & Shortcodes
|--------------------------------------------------------------------------
*/
require_once get_stylesheet_directory() . '/inc/career-cpt.php';

/*
|--------------------------------------------------------------------------
| White Label Landing Pages - Enqueue Assets & Elementor Preview
|--------------------------------------------------------------------------
*/
function ngd_white_label_enqueue_scripts() {
    $theme_uri = get_stylesheet_directory_uri();
    wp_enqueue_style( 'ngd-white-label-agency-css', $theme_uri . '/css/white-label-agency.css', array(), '1.2.2' );
    wp_enqueue_script( 'ngd-white-label-agency-js', $theme_uri . '/js/white-label-agency.js', array(), '1.2.2', true );
}

add_action( 'wp_enqueue_scripts', function() {
    if ( is_page( 'white-label-mobile-app-development' ) || is_page( 'white-label-software-development' ) || is_page( 'white-label-software-development-services' ) || is_page( 'white-label-agency' ) || is_page( 'white-label-app-development' ) || is_page_template( 'template-white-label-mobile-app.php' ) || is_page_template( 'template-white-label-software.php' ) || is_page_template( 'template-white-label-software-dev.php' ) || is_page_template( 'template-white-label-agency.php' ) || is_page_template( 'template-white-label-app-development.php' ) ) {
        ngd_white_label_enqueue_scripts();
    }
}, 30 );

// Enqueue inside Elementor live preview editor
add_action( 'elementor/preview/enqueue_styles', function() {
    $theme_uri = get_stylesheet_directory_uri();
    wp_enqueue_style( 'ngd-white-label-agency-css', $theme_uri . '/css/white-label-agency.css', array(), '1.2.2' );
} );

add_action( 'elementor/preview/enqueue_scripts', function() {
    $theme_uri = get_stylesheet_directory_uri();
    wp_enqueue_script( 'ngd-white-label-agency-js', $theme_uri . '/js/white-label-agency.js', array(), '1.2.2', true );
} );
