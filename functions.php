<?php

/**
 * Enqueue scripts and styles.
 */
function demo_scripts()
{
    wp_enqueue_style(
        'demo-style',
        get_stylesheet_directory_uri() . '/build/index.css',
        array(),
        (include get_template_directory() . '/build/index.asset.php')['version']
    );

    wp_enqueue_script(
        'demo-js',
        get_template_directory_uri() . 'build/index.js',
        (include get_template_directory() . '/build/index.asset.php')['dependencies'],
        (include get_template_directory() . '/build/index.asset.php')['version'],
        true
    );
}
add_action('wp_enqueue_scripts', 'demo_scripts');

function custom_gutenberg_scripts()
{

    wp_enqueue_script(
        'custom-editor',
        get_stylesheet_directory_uri() . '/src/js/editor.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(get_stylesheet_directory() . '/src/js/editor.js'),
        true
    );


    // Add custom data as a variable in JS
    wp_localize_script(
        'custom-editor',
        'postData',
        array(
            'postType' => get_post_type(get_the_id()),
            'postId' => get_the_id(),
        )
    );
}
add_action('enqueue_block_editor_assets', 'custom_gutenberg_scripts');



function example_gutenberg_styles()
{
    wp_enqueue_style('ff-editor-style', get_stylesheet_directory_uri() . '/build/theme/style-index.css', array(), microtime());
    wp_enqueue_script('ff-editor-script', get_template_directory_uri() . '/build/theme/editor.js', array(), microtime(), true);
}
add_action('enqueue_block_editor_assets', 'example_gutenberg_styles');
