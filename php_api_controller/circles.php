<?php
class circles
{
    private $_params;
     
    public function __construct($params)
    {
        $this->_params = $params;
    }
     
	public function createAction()
	{
        $todo = new TestTest(); 
        $todo->title = $this->_params['title'];
        $todo->description = $this->_params['description'];
        $todo->due_date = $this->_params['due_date'];
        $todo->is_done = 'false';
        
        //pass the user's username and password to authenticate the user
        $todo->save($this->_params['username'], $this->_params['password']);
        
        //return the todo item in array format
        return $todo->toArray();
	}
}
?>