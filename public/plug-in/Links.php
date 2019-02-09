<?php

class Links
{
    public static function GenerateCssLinks($URL, $CURRENTLANGUAGE, $BASEURL)
    {
        $items = explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",$URL));
        $output = '
<link rel="stylesheet" href="' . $BASEURL . 'public/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
';
        for ($i = 1 ; $i < count($items); $i++ )
        {
            $folders = '';
            for ($j = 0 ; $j < $i ; $j ++)
                $folders = $folders . $items[$j] . '/' ;
            $output = $output . '<link rel="stylesheet" type="text/css" href="' . $BASEURL . 'public/css' . $folders . $items[$i] . '.css">';
        }
        return $output;
    }

    public static function GenerateJsLinks($URL, $CURRENTLANGUAGE, $BASEURL)
    {
        $items = explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",$URL));
        $output = '
<script src="' . $BASEURL . 'public/js/jquery.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="' . $BASEURL . 'public/js/jquery.tayyebi.js"></script>
<script src="' . $BASEURL . 'public/js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="' . $BASEURL . 'public/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
';
        for ($i = 1 ; $i < count($items); $i++ )
        {
            $folders = '';
            for ($j = 0 ; $j < $i ; $j ++)
            $folders = $folders . $items[$j] . '/' ;
            $output = $output . '<script src="' . $BASEURL . 'public/js' . $folders . $items[$i] . '.js"></script>';
        }
        return $output;
    }
    public static function GenerateMeta($META_DESCRIPTION, $META_AUTHOR)
    {

        return $output = '
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="' . $META_DESCRIPTION . '">
        <meta name="keywords" content="' . Config::META_KEYWORDS . '">
        <meta name="author" content="' . $META_AUTHOR . '">
        <meta name="generator" content="SnowKMS ' . (new Xei())::THEVERSION . '">
        ';
    }
}