<?php 

if(! function_exists("asset")) {
    function asset($path)
    {
        echo URL . "assets/web/$path";
    }
}

if(! function_exists("uploads")) {
    function uploads($path)
    {
        echo URL . "uploads/$path";
    }
}

if(! function_exists("url")) {
    function url($path)
    {
        echo URL . $path;
    }
}

