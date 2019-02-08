<?php

class Text{
    public static function GenerateAbstractForPost($input, $lenght, $allowed_tags = null)
    {
        // TODO : bug : question mark at the end of the string for persian characters
        // mb_internal_encoding('UTF-8');     
        // return mb_substr(strip_tags($input, $allowed_tags), 0, $lenght, "UTF-8") . " ...";
        return
        (substr(strip_tags($input, $allowed_tags), 0, $lenght) .
        ((strlen($input) > $lenght) ?
        " ..." :
        "")
        );
    }
}