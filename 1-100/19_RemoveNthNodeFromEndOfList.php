/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $node1 = new ListNode(0);
        $node2 = new ListNode(0);
        $pre = $node2;
        $node1->next = $head;
        $node2->next = $head;

        $i = 0;
        while ($node1->next) {
            $node1 = $node1->next;
            if ($i == $n) {
                $node2 = $node2->next;
            }
            $i = $i < $n ? ($i + 1) : $n;
        }

        if ($node2->next->next) {
            $node2->next = $node2->next->next;

        } else {
            $node2->next = null;
        }

        return $pre->next;
    }

}
