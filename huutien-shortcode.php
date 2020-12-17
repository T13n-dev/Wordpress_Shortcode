<?php

/**
 * Plugin name: Learning Shortcode 
 * Plugin Author: Nguyen Huu Tien
 */

function create_shortcode()
{
    echo 'Hello world';
}

add_shortcode('shortcode', 'create_shortcode');
// [shortcode]

// Social
if (!function_exists('shortcode_social')) {
    function shortcode_social($atts, $content)
    {
        $icon = $link = '';
        $attr = shortcode_atts(array(
            'icon' => 'fa-facebook',
            'link' => '#',
        ), $atts);

        echo '<a href="' . $link . '"><i class="fa ' . $icon . '"></i>' . $content . '</a>';
    }
    add_shortcode('social', 'shortcode_social');
}

add_shortcode('social', 'shortcode_social');
// [social icon="fa-facebook" link="https://www.facebook.com/"]Facebook[/social] 
