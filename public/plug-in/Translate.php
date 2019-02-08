<?php

class Translate
{
    public static function Label($key)
    {
        /*
        TODO: What if it was a sentece in last record of dictionary? -It has bug ;)
        */
        $language = "fa-IR";
        if(isset($_COOKIE["LANG"])) {
            $language = $_COOKIE["LANG"];
        }
        if ($language == "fa-IR")
        {
            return $key;
        }
        $dictionary = explode("\n", file_get_contents('variable/dictionary.yaml'));
        $keys = [];
        for( $i= 0 ; $i <= sizeof($dictionary) ; $i++ )
        {  
            if (substr($dictionary[$i], 0, 1) == "-")
            {
                if ($key == substr($dictionary[$i], 1, strlen($dictionary[$i]) - 1))
                {
                    $k = $i;
                    for ($j = $i + 1; $j <= sizeof($dictionary) ; $j++  )
                    {
                        if (substr($dictionary[$j], 0, 1) == "-")
                        {
                            $k = $j;
                            break;
                        }
                    }
                    if ($k > $i + 1)
                        for ($j = $i + 1; $j <= $k ; $j++  )
                            if (substr($dictionary[$j], 0, strlen($language)) == $language)
                                return substr($dictionary[$j], strlen($language) + 1, strlen($dictionary[$j]) - 1 - strlen($language));
                        return $key;
                }
            }
        }
        return $key;
    }
}