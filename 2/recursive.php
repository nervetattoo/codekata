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

        $pos = floor($count / 2);
        $match = array_slice($haystack, $pos, 1, true);

        if (current($match) == $search) return key($match);
        if ($count == 1) return -1;

        if ($search > current($match)) {
            $start = $pos;
            $length = $count;
        }
        else {
            $start = 0;
            $length = $pos;
        }

        return $this->chop($search, 
            array_slice($haystack, $start, $length, true)
        );
    }
}
