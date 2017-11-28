<?php
class log_set
{
    public $username;
    public $password;
     
    public function login($name, $pass)
    {
        $this->username = $name;
        
        $todo_item_array = $this->toArray();
        return $todo_item_array;
    }
     
    public function toArray()
    {
        return array(
            'username' => $this->username,
            'password' => $this->password
        );
    }
}