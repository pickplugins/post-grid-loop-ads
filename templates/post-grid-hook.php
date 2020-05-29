<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_action('post_grid_loop', 'post_grid_loop_ads');

function post_grid_loop_ads($args){

    $loop_count = isset($args['loop_count']) ? $args['loop_count'] : '';

    if($loop_count == 1 || $loop_count == 3){

        ?>
        <div class="item">
            <a href="#ads-url"><img src="https://i.imgur.com/LWCYk60.png"></a>

        </div>
        <?php
    }



}






