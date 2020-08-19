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
     * 指向上一个节点
     *
     * @var
     */
    public $prev;
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
    public function __construct($data, $prev = null, $next = null)
    {
        $this->data = $data;
        $this->prev = $prev;
        $this->next = $next;
    }
}


class DoubleLinkList
{
    /**
     * 头指针
     *
     * @var
     */
    public $head;

    /**
     * 游标指针,指向当前的节点
     *
     * @var
     */
    public $cursor;

    /**
     * 插入节点
     *
     * @param $data
     * @return $this
     */
    public function insertNode($data)
    {
        $node = $this->createNode($data);
        if (is_null($this->head)) {
            $this->cursor = $this->head = $node;
        } else {
            // 创建的新节点的指针前一个指针指向头指针的前指针，也就是null
            $node->prev = $this->cursor;
            // 当前指针的下一个指向当前节点
//            $this->cursor->prev->next = $node->next;
            $this->cursor->next = $node;
            // 指针后移,当前节点移动到后面新创建的节点
            $this->cursor = $this->cursor->next;
        }
        return $this;
    }

    /**
     * 创建节点出来
     *
     * @param $data
     * @param null $prev
     * @param null $next
     * @return Node
     */
    private function createNode($data, $prev = null, $next = null)
    {
        return new Node($data, $prev, $next);
    }

    /**
     * 获取头指针
     *
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * 获取下一个节点的值
     *
     * @return mixed
     */
    public function next()
    {
        $this->head = $this->head->next;
        return is_null($this->head) ? null : $this->head->data;
    }

    /**
     * 获取当前节点的值
     *
     * @return mixed
     */
    public function current()
    {
        return is_null($this->head) ? null : $this->head->data;

    }

    /**
     * 获取前一个节点的值
     *
     * @return mixed
     */
    public function prev()
    {
        $this->head = $this->head->prev;
        return is_null($this->head) ? null : $this->head->data;
    }

}


$linkList = new DoubleLinkList();
$linkList->insertNode(1);
$linkList->insertNode(2);
$linkList->insertNode(3);
$linkList->insertNode(4);
dump($linkList->current());
dump($linkList->next());
dump($linkList->next());
dump($linkList->prev());
dump($linkList->next());
dump($linkList->next());
dump($linkList->prev());
dump($linkList->prev());
dump($linkList->prev());
dump($linkList->prev());
