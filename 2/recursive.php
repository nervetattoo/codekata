<?php // vim:set tabstop=4 sw=4 et:

/**
 * Binary chop (search) recursively
 * Codekata 2
 *
 * @see http://codekata.pragprog.com/2007/01/kata_two_karate.html
 * @author Raymond Julin
 * Created: 2011-04-18
 */
class RecursiveBinaryChop {
    /**
     * Search for `$search` in `$haystack` using binary search
     *
     * @param mixed $search The value to search for
     * @param array $haystack Array to search in
     *
     * @return int -1 = no match, else position
     */
	public function chop($search, $haystack) {
        $count = count($haystack);
        if ($count == 0) return -1;

        list($left, $right) = array_chunk($haystack, ceil($count/2), true);
        $test = end($left);

        if ($search == $test) return key($left);
        elseif ($search < $test) $right = array_slice($left,0,-1,true);

        return $this->chop($search, $right);
    }
}
