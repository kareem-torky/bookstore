<?php 

if(! function_exists("asset")) {
    function asset($path)
    {
        echo URL . "assets/web/$path";
    }
}

if(! function_exists("dasset")) {
    function dasset($path)
    {
        echo URL . "assets/admin/$path";
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

if(! function_exists("durl")) {
    function durl($path)
    {
        echo AURL . $path;
    }
}

if(! function_exists("authCheck")) {
    function authCheck()
    {
        return Core\Auth::check();
    }
}

