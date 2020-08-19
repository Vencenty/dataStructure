<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class Node
{
    /**
     * 左叶子节点
     *
     * @var
     */
    public $left;

    /**
     * 右叶子节点
     *
     * @var
     */
    public $right;

    /**
     * 节点数据
     *
     * @var
     */
    public $value;

    /**
     * 生成叶子节点
     *
     * Node constructor.
     * @param $value
     * @param $left
     * @param $right
     */
    public function __construct($value, $left, $right)
    {
        $this->left = $left;
        $this->right = $right;
        $this->value = $value;
    }

}

class BinaryTree
{
    public $root;

    public function insertNode($data)
    {
        $node = $this->createNode($data);

        if (is_null($this->root)) {
            $this->root = $node;
        } else {
            $this->insert($this->root, $node);
        }
    }

    /**
     * 插入左节点
     *
     * @param $data
     */
    public function insert(Node $node, Node $newNode)
    {
        if ($newNode->value < $node->value) {
            if ($node->left == null) {
                $node->left = $newNode;
            } else {
                $this->insert($node->left, $newNode);
            }
        }

        if ($newNode->value > $node->value) {
            if ($node->right == null) {
                $node->right = $newNode;
            } else {
                $this->insert($node->right, $newNode);
            }
        }

    }


    public function createNode($data, $left = null, $right = null)
    {
        return new Node($data, $left, $right);
    }
}
// 1
//  2
//     8
//   7
//  4
$tree = new BinaryTree;
$tree->insertNode(1);
$tree->insertNode(2);
$tree->insertNode(8);
$tree->insertNode(7);
$tree->insertNode(4);
dd($tree);