<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class Node
{
    /**
     * 数据域,存放数据
     *
     * @var
     */
    public $data;

    /**
     * 指向下一个节点
     *
     * @var
     */
    public $next;

    /**
     * 创建Node节点
     *
     * Node constructor.
     * @param $data
     * @param $prev
     * @param $next
     */
    public function __construct($data, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

class SingleList
{
    /**
     * 头指针
     *
     * @var
     */
    public $head;

    /**
     * 当前游标
     *
     * @var
     */
    public $cursor;

    /**
     * 创建节点
     *
     * @param $data
     * @return Node
     */
    public function createNode($data)
    {
        return new Node($data);
    }

    /**
     * 尾插法插入链表
     *
     * @param $data
     * @return SingleList
     */
    public function insertNodeByTail($data)
    {
        $node = $this->createNode($data);

        if ($this->head == null) {
            $this->cursor = $this->head = $node;
        } else {
            $this->cursor->next = $node;
            $this->cursor = $this->cursor->next;
        }

        return $this;
    }

    /**
     * 头插法插入链表
     *
     * @param $data
     * @return SingleList
     */
    public function insertNodeByHead($data)
    {
        $node = $this->createNode($data);

        if ($this->head == null) {
            $this->head = $node;
        } else {
            $node->next = $this->head->next;
            $this->head->next = $node;
        }

        return $this;
    }

}

$linkList = new SingleList;
//$linkList->insertNodeByHead(1);
//$linkList->insertNodeByHead(2);
//$linkList->insertNodeByHead(3);
//dd($linkList);

$linkList->insertNodeByTail(1);
$linkList->insertNodeByTail(2);
$linkList->insertNodeByTail(3);
dd($linkList);