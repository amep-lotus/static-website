<?php

function translate_to_tibetan($str) {
    $day_names = array(
        /* Numbers */
        "0" => '༠',
        "1" => '༡',
        "2" => '༢',
        "3" => '༣',
        "4" => '༤',
        "5" => '༥',
        "6" => '༦',
        "7" => '༧',
        "8" => '༨',
        "9" => '༩'
    );

    $converted = $str;

    foreach ($day_names as $name => $value) {

        $converted = str_replace($name, $value, $converted);
    }

    return $converted;
}

add_filter('date', 'translate_to_tibetan');
add_filter('get_the_date', 'translate_to_tibetan');
add_filter('the_date', 'translate_to_tibetan');
add_filter('the_time', 'translate_to_tibetan');
add_filter('post_time', 'translate_to_tibetan');
add_filter('get_comment_date', 'translate_to_tibetan');
add_filter('get_comment_time', 'translate_to_tibetan');
?>