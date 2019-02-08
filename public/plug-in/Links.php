<?php

class Links
{
    public static function GenerateCssLinks($URL, $CURRENTLANGUAGE, $BASEURL)
    {
        $items = explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",$URL));
        $output = '';
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
        $output = '';
        for ($i = 1 ; $i < count($items); $i++ )
        {
            $folders = '';
            for ($j = 0 ; $j < $i ; $j ++)
            $folders = $folders . $items[$j] . '/' ;
            $output = $output . '<script src="' . $BASEURL . 'public/js' . $folders . $items[$i] . '.js"></script>';
        }
        return $output;
    }

}