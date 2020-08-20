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

    /**
     * 用于输出顺序排序
     *
     * @param $node
     */
    public function inOrderTraverse($node)
    {
        if ($node != null) {
            $this->inOrderTraverse($node->left);
            dump($node->value);
            $this->inOrderTraverse($node->right);
        }
    }

    /**
     * 前序遍历,用于复制二叉树
     *
     * @param $node
     */
    public function preOrderTraverse($node)
    {
        if ($node != null) {
            dump($node->value);
            $this->preOrderTraverse($node->left);
            $this->preOrderTraverse($node->right);
        }
    }

    public function createNode($data, $left = null, $right = null)
    {
        return new Node($data, $left, $right);
    }
}



/**
 * 二叉树结构图,参考慕课网课程
 * https://www.imooc.com/video/15746
 *
 *                   8
 *                 /    \
 *              3        10
 *            /   \        \
 *         1       6       14
 *               /  \     /
 *              4    7   13
 *
 *
 */

$tree = new BinaryTree;
$tree->insertNode(8);
$tree->insertNode(3);
$tree->insertNode(10);
$tree->insertNode(1);
$tree->insertNode(6);
$tree->insertNode(14);
$tree->insertNode(4);
$tree->insertNode(7);
$tree->insertNode(13);
//dd($tree->root);

// 中序遍历测试
//$tree->inOrderTraverse($tree->root);
// 前序遍历测试
//$tree->preOrderTraverse($tree->root);
