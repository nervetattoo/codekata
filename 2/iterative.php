<?php // vim:set tabstop=4 sw=4 et:

/**
 * Binary chop (search) iteratively
 * Codekata
 *
 * @see http://codekata.pragprog.com/2007/01/kata_two_karate.html
 * @author Raymond Julin
 * Created: 2011-04-10
 */
class IterativeBinaryChop {
    /**
     * Search for `$search` in `$haystack` using binary search
     *
     * @param mixed $search
     * @param array $haystack
     * @return int -1 = no match, else position
     */
	public function chop($search, $haystack) {
        $num = count($haystack);
        $stack = $haystack;
        if (!$num) return -1;
        $offset = 0;
        while (true) {
            if ($num == 1) return ($haystack[0] == $search) ? $offset : -1;

            $split = round($num / 2);

            // We might be lucky as hell and want the first one
            if ($search == $haystack[$split]) return $split + $offset;

            /**
             * Right side, all values higher than search
             * Given [0,1,2,3] split would be 4 / 2 = 2
             * search = 3 gives:
             * 3 > stack[2] (2) => true
             * stack = [2,3]
             *
             * 3 > stack[1] (3) === return
             */
            if ($search > $haystack[$split])
            {
                $haystack = array_slice($haystack, $split);
            }
            else
            {
                $haystack = array_slice($haystack, 0, $split);
            }
            $num = count($haystack);
        }
        return -1;
	}
}
