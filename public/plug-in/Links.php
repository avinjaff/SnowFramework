<?php

class Links
{
    public static function GenerateCssLinks($BASEURL)
    {
        // include_once $parent . '/meta/render.php';
        // $c = 1 + count(explode('/', config::Url_PATH));
        // $c -= count(explode('.', config::Url_SUBDOMAIN)); // TODO: BUG: dots in address has some problems; eg -> www. | .com
        // $items =  explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",str_replace("://", "/", str_replace("?", "/", $BASEURL))));
        // for ($i= $c + 1 ; $i < count($items); $i++ )
        // {
        //   echo '
        //   <link href="' . $npath . '/css';
        //     if ($i == $c + 1)
        //   echo '/master';
        //   else
        //   for ($j= $c + 2; $j <= $i; $j++ )
        //   echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
        //     echo '.css" rel="stylesheet" />';
        // }
        // echo '<link href="' . $npath . '/css/' . $CURRENTLANGUAGE . '.css" rel="stylesheet" />';
        return "";
    }

    public static function GenerateJsLinks($BASEURL)
    {
        // for ($i=1 + $c; $i < count($items); $i++ )
        // {
        //     echo '<script type="text/javascript" src="' . $npath . '/js';
        //     if ($i == 1 + $c)
        //     echo '/master';
        //     else
        //         for ($j=2 + $c; $j <= $i; $j++ )
        //             echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
        //     echo '.js" ></script>';
        // }
        return "test.js";
    }

}