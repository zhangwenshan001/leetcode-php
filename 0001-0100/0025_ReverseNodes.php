<?php

require('ListNode.php');

class ReverseNodes
{

    /**
     * @param ListNode $head
     * @param Integer  $k
     *
     * @return ListNode
     */
    function reverseKGroup($head, $k)
    {
        if ($k < 2) {
            return $head;
        }

        $pCount = $head;
        //校验剩余是否存在k个节点
        for ($i = 0; $i < $k; $i++) {
            if (!$pCount) {
                return $head;
            } else {
                $pCount = $pCount->next;
            }
        }

        $i = 0;

        $p1 = null;
        $p2 = $head;

        while ($i < $k) {
            $tmp = $p2->next;
            $p2->next = $p1;

            $p1 = $p2;
            $p2 = $tmp;
            $i++;
        }

        //p1指向第k个 p2 = pCount
        if (!$p2) {
            return $p1;
        }

        $head->next = $this->reverseKGroup($p2, $k);
        return $p1;
    }
}

$l11       = new ListNode(1);
$l12       = new ListNode(2);
$l13       = new ListNode(3);
$l14       = new ListNode(4);
$l15       = new ListNode(5);
$l11->next = $l12;
$l12->next = $l13;
$l13->next = $l14;
$l14->next = $l15;
$result = (new ReverseNodes())->reverseKGroup($l11, 4);
while ($result) {
    echo $result->val.PHP_EOL;
    $result = $result->next;
}