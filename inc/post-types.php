<?php

/**
 * Register Custom Post Types and Taxonomies
 */

function fsetips_register_post_types()
{
    // Tutorial Post Type
    register_post_type('tutorial', array(
        'labels' => array(
            'name'                  => _x('Tutorials', 'Post type general name', 'fsetips'),
            'singular_name'         => _x('Tutorial', 'Post type singular name', 'fsetips'),
            'menu_name'            => _x('Tutorials', 'Admin Menu text', 'fsetips'),
            'add_new'              => __('Add New', 'fsetips'),
            'add_new_item'         => __('Add New Tutorial', 'fsetips'),
            'edit_item'            => __('Edit Tutorial', 'fsetips'),
            'new_item'             => __('New Tutorial', 'fsetips'),
            'view_item'            => __('View Tutorial', 'fsetips'),
            'view_items'           => __('View Tutorials', 'fsetips'),
            'search_items'         => __('Search Tutorials', 'fsetips'),
            'not_found'            => __('No tutorials found.', 'fsetips'),
            'not_found_in_trash'   => __('No tutorials found in Trash.', 'fsetips'),
        ),
        'public'              => true,
        'show_in_rest'        => true, // Enable Gutenberg editor
        'menu_position'       => 5,
        'menu_icon'          => 'dashicons-book-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'has_archive'        => true,
        'rewrite'           => array('slug' => 'tutorials')
    ));

    // Code Snippet Post Type
    register_post_type('snippet', array(
        'labels' => array(
            'name'                  => _x('Code Snippets', 'Post type general name', 'fsetips'),
            'singular_name'         => _x('Code Snippet', 'Post type singular name', 'fsetips'),
            'menu_name'            => _x('Code Snippets', 'Admin Menu text', 'fsetips'),
            'add_new'              => __('Add New', 'fsetips'),
            'add_new_item'         => __('Add New Code Snippet', 'fsetips'),
            'edit_item'            => __('Edit Code Snippet', 'fsetips'),
            'new_item'             => __('New Code Snippet', 'fsetips'),
            'view_item'            => __('View Code Snippet', 'fsetips'),
            'view_items'           => __('View Code Snippets', 'fsetips'),
            'search_items'         => __('Search Code Snippets', 'fsetips'),
            'not_found'            => __('No code snippets found.', 'fsetips'),
            'not_found_in_trash'   => __('No code snippets found in Trash.', 'fsetips'),
        ),
        'public'              => true,
        'show_in_rest'        => true,
        'menu_position'       => 6,
        'menu_icon'          => 'dashicons-editor-code',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'        => true,
        'rewrite'           => array('slug' => 'snippets')
    ));

    // Blog Post Type
    register_post_type('blog', array(
        'labels' => array(
            'name'                  => _x('Blog Posts', 'Post type general name', 'fsetips'),
            'singular_name'         => _x('Blog Post', 'Post type singular name', 'fsetips'),
            'menu_name'            => _x('Blog', 'Admin Menu text', 'fsetips'),
            'add_new'              => __('Add New', 'fsetips'),
            'add_new_item'         => __('Add New Blog Post', 'fsetips'),
            'edit_item'            => __('Edit Blog Post', 'fsetips'),
            'new_item'             => __('New Blog Post', 'fsetips'),
            'view_item'            => __('View Blog Post', 'fsetips'),
            'view_items'           => __('View Blog Posts', 'fsetips'),
            'search_items'         => __('Search Blog Posts', 'fsetips'),
            'not_found'            => __('No blog posts found.', 'fsetips'),
            'not_found_in_trash'   => __('No blog posts found in Trash.', 'fsetips'),
        ),
        'public'              => true,
        'show_in_rest'        => true,
        'menu_position'       => 7,
        'menu_icon'          => 'dashicons-admin-post',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'has_archive'        => true,
        'rewrite'           => array('slug' => 'blog')
    ));

}
add_action('init', 'fsetips_register_post_types');

function fsetips_register_taxonomies()
{
    // Difficulty Level Taxonomy
    register_taxonomy('difficulty', array('tutorial', 'snippet'), array(
        'labels' => array(
            'name'              => _x('Difficulty Levels', 'taxonomy general name', 'fsetips'),
            'singular_name'     => _x('Difficulty Level', 'taxonomy singular name', 'fsetips'),
            'search_items'      => __('Search Difficulty Levels', 'fsetips'),
            'all_items'         => __('All Difficulty Levels', 'fsetips'),
            'edit_item'         => __('Edit Difficulty Level', 'fsetips'),
            'update_item'       => __('Update Difficulty Level', 'fsetips'),
            'add_new_item'      => __('Add New Difficulty Level', 'fsetips'),
            'new_item_name'     => __('New Difficulty Level Name', 'fsetips'),
            'menu_name'         => __('Difficulty Level', 'fsetips'),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'difficulty'),
    ));

    // Topics Taxonomy
    register_taxonomy('fse-topic', array('tutorial', 'snippet', 'blog', 'post'), array(
        'labels' => array(
            'name'              => _x('Topics', 'taxonomy general name', 'fsetips'),
            'singular_name'     => _x('Topic', 'taxonomy singular name', 'fsetips'),
            'search_items'      => __('Search Topics', 'fsetips'),
            'all_items'         => __('All Topics', 'fsetips'),
            'parent_item'       => __('Parent Topic', 'fsetips'),
            'parent_item_colon' => __('Parent Topic:', 'fsetips'),
            'edit_item'         => __('Edit Topic', 'fsetips'),
            'update_item'       => __('Update Topic', 'fsetips'),
            'add_new_item'      => __('Add New Topic', 'fsetips'),
            'new_item_name'     => __('New Topic Name', 'fsetips'),
            'menu_name'         => __('Topics', 'fsetips'),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'topic'),
    ));

    // Code Snippets Type Taxonomy
    register_taxonomy('snippet-type', 'snippet', [
        'labels' => [
            'name'              => _x('Snippet Types', 'taxonomy general name', 'fsetips'),
            'singular_name'     => _x('Snippet Type', 'taxonomy singular name', 'fsetips'),
            'search_items'      => __('Search Snippet Types', 'fsetips'),
            'all_items'         => __('All Snippet Types', 'fsetips'),
            'edit_item'         => __('Edit Snippet Type', 'fsetips'),
            'update_item'       => __('Update Snippet Type', 'fsetips'),
            'add_new_item'      => __('Add New Snippet Type', 'fsetips'),
            'new_item_name'     => __('New Snippet Type Name', 'fsetips'),
            'menu_name'         => __('Snippet Types', 'fsetips'),
        ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'snippet-type'],
    ]);

}
add_action('init', 'fsetips_register_taxonomies');

// Add default terms for Difficulty Level
function fsetips_add_default_difficulty_terms()
{
    $terms = array(
        'Beginner' => 'For those new to FSE and block development',
        'Intermediate' => 'Requires basic understanding of FSE concepts',
        'Advanced' => 'Complex topics and advanced development techniques'
    );

    foreach ($terms as $term => $description) {
        if (!term_exists($term, 'difficulty')) {
            wp_insert_term($term, 'difficulty', array(
                'description' => $description
            ));
        }
    }
}
add_action('init', 'fsetips_add_default_difficulty_terms');

// Add some initial topic terms
function fsetips_add_default_topic_terms()
{
    $terms = array(
        'Block Development' => array(
            'description' => 'Creating custom blocks for the WordPress editor',
            'children' => array(
                'Block Patterns',
                'Block Variations',
                'Dynamic Blocks'
            )
        ),
        'Theme Development' => array(
            'description' => 'Building block themes and working with theme.json',
            'children' => array(
                'Templates',
                'Template Parts',
                'Global Styles'
            )
        ),
        'Performance' => array(
            'description' => 'Optimizing FSE websites for speed and efficiency'
        )
    );

    foreach ($terms as $term => $data) {
        $parent = term_exists($term, 'fse-topic');
        if (!$parent) {
            $parent = wp_insert_term($term, 'fse-topic', array(
                'description' => $data['description']
            ));
        }

        if (isset($data['children']) && !is_wp_error($parent)) {
            foreach ($data['children'] as $child) {
                if (!term_exists($child, 'fse-topic')) {
                    wp_insert_term($child, 'fse-topic', array(
                        'parent' => $parent['term_id']
                    ));
                }
            }
        }
    }
}
add_action('init', 'fsetips_add_default_topic_terms');


// Add default Code Snippet types
function fsetips_add_default_snippet_types()
{
    $types = [
        'Template Modifications' => 'Snippets that modify block templates',
        'Block Customizations' => 'Customizations for core and custom blocks',
        'Theme Features' => 'Add new theme functionality',
        'Editor Enhancements' => 'Improve the block editor experience',
        'Performance Optimizations' => 'Snippets for improving site performance'
    ];

    foreach ($types as $type => $description) {
        if (!term_exists($type, 'snippet-type')) {
            wp_insert_term($type, 'snippet-type', [
                'description' => $description
            ]);
        }
    }
}
add_action('init', 'fsetips_add_default_snippet_types');


// Code Snippet metadata and meta box
function fsetips_register_snippet_meta()
{
    // Register compatibility meta
    register_post_meta('snippet', 'snippet_compatibility', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        }
    ));
}
add_action('init', 'fsetips_register_snippet_meta');

function fsetips_add_snippet_meta_box()
{
    add_meta_box(
        'snippet_details',
        'Snippet Details',
        'fsetips_snippet_meta_box_html',
        'snippet',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'fsetips_add_snippet_meta_box');

// Code Snippets post metadata box HTML
function fsetips_snippet_meta_box_html($post)
{
    $compatibility = get_post_meta($post->ID, 'snippet_compatibility', true);
    wp_nonce_field('snippet_details_nonce', 'snippet_details_nonce');
    ?>
    <p>
        <label for="snippet_compatibility">Compatibility:</label><br>
        <input type="text" id="snippet_compatibility" name="snippet_compatibility" 
               value="<?php echo esc_attr($compatibility); ?>" class="widefat">
        <span class="description">e.g., "WordPress 6.5 and above"</span>
    </p>
    <?php
}


// Save Meta Box Data
function fsetips_save_snippet_meta($post_id)
{
    if (!isset($_POST['snippet_details_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['snippet_details_nonce'], 'snippet_details_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save compatibility
    if (isset($_POST['snippet_compatibility'])) {
        update_post_meta(
            $post_id,
            'snippet_compatibility',
            sanitize_text_field($_POST['snippet_compatibility'])
        );
    }
}
add_action('save_post_snippet', 'fsetips_save_snippet_meta');
