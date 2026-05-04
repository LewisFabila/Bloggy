<?php

function time_ago($datetime)
{
    $time = strtotime($datetime);
    $diff = time() - $time;

    if ($diff < 60) return 'Hace segundos';
    if ($diff < 3600) return floor($diff/60) . ' min';
    if ($diff < 86400) return floor($diff/3600) . ' h';
    return floor($diff/86400) . ' días';
}