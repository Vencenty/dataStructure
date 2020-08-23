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
    /**
     * 根节点
     *
     * @var
     */
    public $root;

    /**
     * 插入数据节点
     *
     * @param $data
     */
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
     * @param Node $node
     * @param Node $newNode
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

    /**
     * 后序遍历 文件夹系统遍历
     *
     * @param $node
     */
    public function postOrderTraverse($node)
    {
        if ($node != null) {
            $this->postOrderTraverse($node->left);
            $this->postOrderTraverse($node->right);
            dump($node->value);
        }
    }


    /**
     * 添加节点
     *
     * @param $data
     * @param null $left
     * @param null $right
     * @return Node
     */
    public function createNode($data, $left = null, $right = null)
    {
        return new Node($data, $left, $right);
    }

    /**
     * 查找二叉树最小节点
     *
     * @param $node
     * @return mixed
     */
    public function findMin($node)
    {
        while ($node && $node->left != null) {
            $node = $node->left;
        }

        return $node->value;
    }

    /**
     * 寻找最大数值
     *
     * @param $node
     * @return mixed
     */
    public function findMax($node)
    {
        while ($node && $node->right != null) {
            $node = $node->right;
        }

        return $node->value;
    }

    /**
     * 二叉树节点查找
     *
     * @param $node
     * @param $value
     * @return bool
     */
    public function find($node, $value)
    {
        if ($node == null) {
            return false;
        }

        if ($value > $node->value) {
            return $this->find($node->right, $value);
        } elseif ($value < $node->value) {
            return $this->find($node->left, $value);
        } else {
            return true;
        }
    }

    /**
     * 二叉树删除节点
     *
     * @param $node
     * @param $value
     * @return null
     */
    public function removeNode($node, $value)
    {
        if ($node == null) {
            return null;
        }

        if ($value > $node->value) {
            $node->right = $this->removeNode($node->right, $value);
            return $node;
        } elseif ($value < $node->value) {
            $node->left = $this->removeNode($node->left, $value);
            return $node;
        } else {
            // 第一种情况,删除节点是叶子结点,没有左子树也没有右子树,直接删除掉即可
            if ($node->left == null && $node->right == null) {
                return null;
            }


            // 第二种情况,存在一个左节点或者右节点
            if ($node->left == null) {
                $node = $node->right;
                return $node;
            } elseif ($node->right == null) {
                $node = $node->left;
                return $node;
            } else {
                // 第三种情况, 左右节点都有孩子,那么要找到右节点的最小值,
                //把他替换成当前要删除节点的值,然后把原节点删除掉

                $minValue = $this->findMin($node->right);
                $node->value = $minValue;
                $node->right = $this->removeNode($node->right, $minValue);
                return $node;
            }


        }
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
 *               /  \     /  \
 *              4    7   13   20
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
$tree->insertNode(20);
//dd($tree->root);

// 中序遍历测试
//$tree->inOrderTraverse($tree->root);
// 前序遍历测试
//$tree->preOrderTraverse($tree->root);
// 后序遍历测试
//$tree->postOrderTraverse($tree->root);

// 查找最小值测试
//$min = $tree->findMin($tree->root);
//dd($min);
// 查找最大值测试
//$max = $tree->findMax($tree->root);
//dd($max);

// 查找节点
//$nodeExists = $tree->find($tree->root, 9);
//dd($nodeExists);

// 删除节点测试
//dump($tree->root);
//$result = $tree->removeNode($tree->root, 1);
//dd($result);

//dump($tree->root);
$result = $tree->removeNode($tree->root, 8);

dump($result);