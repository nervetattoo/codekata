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
	public function chop($search, $haystack, $debug = false) {
        $count = count($haystack);
        // Return early if possible
        if ($count == 0) return -1;

        if ($debug) var_dump("Search '$search' in : " . implode(",", $haystack));

        while ($count >= 1) {
            $position = round($count / 2, 0);

            $match = array_slice($haystack, $position - 1, 1, true);
            $key = key($match);
            $match = current($match);

            if ($match == $search)
                return $key;

            if ($search > $match)
                $haystack = array_slice($haystack, $position, $count, true);
            else
                $haystack = array_slice($haystack, 0, $position - 1, true);
            $count = count($haystack);
        }
        return -1;
    }
}
