<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class Queue
{
    /**
     * 保存队列数据,这里用数组来保存
     *
     * @var
     */
    public $list;

    /**
     * 要出对的第元素索引
     *
     * @var int
     */
    public $popIndex = 0;

    /**
     * 队列当前索引
     *
     * @var int
     */
    public $index = 0;

    /**
     * 推送数据到队列
     *
     * @param $data
     * @return Queue
     */
    public function push($data)
    {
        $this->list[$this->index++] = $data;
        return $this;
    }

    /**
     * 直接卸载掉队列,然后要弹出的元素索引+1,这样就从0开始慢慢把队列元素出队
     *
     * @return mixed
     */
    public function pop()
    {
        $value = $this->list[$this->popIndex];
        unset($this->list[$this->popIndex]);
        $this->popIndex++;
        return $value;
    }

    /**
     * 获取队列长度
     *
     * @return int
     */
    public function length()
    {
        return count($this->list);
    }
}

$queue = new Queue;
$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->push(4);
$queue->push(5);
$queue->push(6);
$queue->push(7);
$queue->push(8);

dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->pop());
dump($queue->length());
