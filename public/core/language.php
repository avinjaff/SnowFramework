<?php
namespace core;

class language {

    private $code;
    private $language;
    private $region;
    private $direction;
    private $flag;

    public function __construct ($code, $language, $region, $direction, $flag) {
        if (!isset($_COOKIE["LANG"]))
        {
            setcookie('LANG', 'fa-IR', time() + (86400 * 30), '/');
        }
        $this->code = $code;
        $this->language = $language;
        $this->region = $region;
        $this->direction = $direction;
        $this->flag = $flag;
    }

    public function __get($property) {
        if (property_exists($this, $property))
            return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property))
            $this->$property = $value;
        return $this;
    }

    public function __toString()
    {
        return $this->flag . $this->language;
    }

    function label($key)
    {
        /*
        TODO: What if it was a sentece in last record of dictionary? -It has bug ;)
        */
        $this->language = "fa-IR";
        if(isset($_COOKIE["LANG"])) {
            $this->language = $_COOKIE["LANG"];
        }
        if ($this->language == "fa-IR")
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
                            if (substr($dictionary[$j], 0, strlen($this->language)) == $this->language)
                                return substr($dictionary[$j], strlen($this->language) + 1, strlen($dictionary[$j]) - 1 - strlen($this->language));
                        return $key;
                }
            }
        }
        return $key;
    }


}
?>