<?php

/**
 * Block Pattern Category Registration
 */

function fsetips_register_block_pattern_category()
{
    if (!function_exists('register_block_pattern_category')) {
        return;
    }

    register_block_pattern_category(
        'fsetips',
        array('label' => __('FSE Tips', 'fsetips'))
    );
}
add_action('init', 'fsetips_register_block_pattern_category');
