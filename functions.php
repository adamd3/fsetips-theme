<?php

/**
 * Include custom post types and taxonomies
 */
require_once get_template_directory() . '/inc/post-types.php';

/**
 * Include block pattern functionality
 */
require_once get_template_directory() . '/inc/block-patterns.php';

/**
 * Enqueue scripts and styles.
 */

function fsetips_enqueue_scripts()
{
    $asset_file = get_template_directory() . '/build/index.asset.php';
    $asset_data = file_exists($asset_file) ? require $asset_file : ['version' => '1.0.0', 'dependencies' => []];

    wp_enqueue_style(
        'demo-style',
        get_stylesheet_directory_uri() . '/build/index.css',
        array(),
        $asset_data['version']
    );

    wp_enqueue_script(
        'demo-js',
        get_template_directory_uri() . '/build/index.js',
        $asset_data['dependencies'],
        $asset_data['version'],
        true  // This is important - loads script in footer
    );
}
add_action('wp_enqueue_scripts', 'fsetips_enqueue_scripts');




/**
 * Custom feed
 */
function fsetips_modify_feed_query($query)
{
    if ($query->is_feed()) {
        $query->set('post_type', 'blog');
    }
    return $query;
}
add_action('pre_get_posts', 'fsetips_modify_feed_query');


function fsetips_modify_feed_title($title)
{
    return 'FSE Tips Blog Feed';
}
add_filter('get_wp_title_rss', 'fsetips_modify_feed_title');

function fsetips_modify_feed_description($description)
{
    return 'The latest blog posts from FSE Tips';
}
add_filter('bloginfo_rss', 'fsetips_modify_feed_description');


/**
 * Enqueue editor scripts and styles from src folder
 */
function custom_gutenberg_scripts()
{
    $editor_file = get_stylesheet_directory() . '/src/js/editor.js';

    if (file_exists($editor_file)) {
        wp_enqueue_script(
            'custom-editor',
            get_stylesheet_directory_uri() . '/src/js/editor.js',
            array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
            filemtime($editor_file),
            true
        );

        wp_localize_script(
            'custom-editor',
            'postData',
            array(
                'postType' => get_post_type(get_the_id()),
                'postId' => get_the_id(),
            )
        );
    }
}
add_action('enqueue_block_editor_assets', 'custom_gutenberg_scripts');

function example_gutenberg_styles()
{
    $editor_style = get_stylesheet_directory() . '/build/theme/style-index.css';
    $editor_script = get_template_directory() . '/build/theme/editor.js';

    if (file_exists($editor_style)) {
        wp_enqueue_style(
            'ff-editor-style',
            get_stylesheet_directory_uri() . '/build/theme/style-index.css',
            array(),
            filemtime($editor_style)
        );
    }

    if (file_exists($editor_script)) {
        wp_enqueue_script(
            'ff-editor-script',
            get_template_directory_uri() . '/build/theme/editor.js',
            array(),
            filemtime($editor_script),
            true
        );
    }
}
add_action('enqueue_block_editor_assets', 'example_gutenberg_styles');

/**
 * Enhanced SVG Support
 */

// Allow SVG uploads
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Verify SVG files and enable proper display
function enable_svg_upload($data, $file, $filename, $mimes)
{
    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}
add_filter('wp_check_filetype_and_ext', 'enable_svg_upload', 10, 4);

// Fix SVG display
function fix_svg_display($response, $attachment, $meta)
{
    if ($response['mime'] === 'image/svg+xml') {
        // Get SVG file path
        $svg_path = get_attached_file($attachment->ID);

        if (!$svg_path) {
            return $response;
        }

        // Get SVG size
        $svg = simplexml_load_file($svg_path);
        if ($svg === false) {
            return $response;
        }

        $attributes = $svg->attributes();
        if (!isset($attributes->width, $attributes->height)) {
            // If no width/height in SVG, use viewBox
            $viewbox = isset($attributes->viewBox) ? explode(' ', $attributes->viewBox) : false;
            if ($viewbox) {
                $width = $viewbox[2];
                $height = $viewbox[3];
            } else {
                // Default size if no dimensions found
                $width = $height = 512;
            }
        } else {
            $width = (int) $attributes->width;
            $height = (int) $attributes->height;
        }

        // Update response with dimensions
        $response['sizes'] = array(
            'full' => array(
                'url' => $response['url'],
                'width' => $width,
                'height' => $height,
            ),
            'thumbnail' => array(
                'url' => $response['url'],
                'width' => min($width, 150),
                'height' => min($height, 150),
            ),
        );
    }

    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'fix_svg_display', 10, 3);

// Add SVG styling fixes

function add_svg_styles()
{
    echo '<style>
        /* Admin styles */
        .attachment-266x266, .thumbnail img {
            width: auto !important;
            height: auto !important;
        }
        
        /* Frontend styles */
        .wp-site-blocks .site-header .wp-block-site-logo img[src$=".svg"] {
            width: auto;
            height: auto;
            max-width: auto; /* Changed from none to 100% */
        }
        
        /* Respect block size settings */
        .wp-site-blocks .site-header .wp-block-site-logo {
            width: var(--wp--custom--logo--width, auto);
            height: var(--wp--custom--logo--height, auto);
            max-width: var(--wp--custom--logo--max-width, none);
        }
    </style>';
}

add_action('admin_head', 'add_svg_styles');
add_action('wp_head', 'add_svg_styles');

// Ensure SVGs work with Media Library
function fix_svg_media_library($response, $attachment, $meta)
{
    if ($response['mime'] === 'image/svg+xml') {
        // Force thumbnail URL
        $response['sizes']['thumbnail'] = [
            'url' => $response['url'],
            'width' => 150,
            'height' => 150,
        ];
    }

    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'fix_svg_media_library', 10, 3);

// Add Google Fonts
function enqueue_google_fonts()
{
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&family=Roboto+Flex:wght@300..700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');
add_action('enqueue_block_editor_assets', 'enqueue_google_fonts');

// Code Snippet meta fields
function fsetips_snippet_compatibility_shortcode()
{
    $post_id = get_the_ID();
    $compatibility = get_post_meta($post_id, 'snippet_compatibility', true);
    return '<p class="has-small-font-size">' . esc_html($compatibility) . '</p>';
}
add_shortcode('snippet_compatibility', 'fsetips_snippet_compatibility_shortcode');

function fsetips_snippet_implementation_shortcode()
{
    $post_id = get_the_ID();
    $implementation_steps = get_post_meta($post_id, 'snippet_implementation', true);

    if (!empty($implementation_steps) && is_array($implementation_steps)) {
        $output = '<ul style="font-size:0.875rem">';
        foreach ($implementation_steps as $step) {
            $output .= '<li>' . esc_html($step) . '</li>';
        }
        $output .= '</ul>';
        return $output;
    }
    return '';
}
add_shortcode('snippet_implementation', 'fsetips_snippet_implementation_shortcode');
