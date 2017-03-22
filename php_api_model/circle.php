<?php
class TestTest
{
    public $todo_id;
    public $title;
    public $description;
    public $due_date;
    public $is_done;
     
    public function save($username, $userpass)
    {
        $this->todo_id = time();
        $todo_item_array = $this->toArray();
        return $todo_item_array;
    }
     
    public function toArray()
    {
        return array(
            'todo_id' => $this->todo_id,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'is_done' => $this->is_done
        );
    }
}