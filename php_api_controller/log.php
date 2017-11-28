<?php
class log
{
    private $_params;
     
    public function __construct($params)
    {
        $this->_params = $params;
    }
     
	public function inAction()
	{
        print ('hi');
        $todo = new log_set();
        $todo->username = $this->_params['username'];
        $todo->password = $this->_params['password'];
        $todo->login($this->_params['username'], $this->_params['password']);
        
        return $todo->toArray();
	}
}
?>