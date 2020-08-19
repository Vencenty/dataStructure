<?php

require_once __DIR__ . '/../../vendor/autoload.php';


class Stack
{
    public $data;

    public $top = -1;

    public $size = 0;

    public function push($data)
    {
        $this->data[++$this->size] = $data;
    }

    public function pop()
    {
        $value = $this->data[$this->size];
        unset($this->data[$this->size]);
        $this->size--;
        return $value;
    }


}

$stack = new Stack;

$stack->push(1);
$stack->push(2);
$stack->push(3);

dump($stack->pop(), $stack->data);
dump($stack->pop(), $stack->data);
dump($stack->pop(), $stack->data);