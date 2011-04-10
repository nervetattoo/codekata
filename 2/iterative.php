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
        $to = count($haystack);
        $from = 0;

        // If no haystack, -1 always
        if ($to == 0) return -1;
        if ($to == 1) return ($haystack[0] == $search) ? 0 : -1;


        $half = 0;
        $i = 0;
        $l = implode(",", $haystack);
        if ($debug)
            var_dump("Search '$search' in '$l'");
        while ($half >= 0) {
            $i++;
            // Find test point and where to start searching
            $lastHalf = $half;
            $half = $from + floor(($to - $from) / 2);
            $match = $haystack[$half];
            if ($half == $lastHalf) {
                if ($debug) echo "Iterations : $i\n";
                return ($match == $search) ? $half : -1;
            }

            // We might be lucky as hell and want the first one
            if ($search == $match) {
                if ($debug) echo "Iterations : $i\n";
                return $half;
            }


            // More likely though, search a more narrow set
            if ($search > $match) {
                $from = $half;
            }
            else {
                $from = 0;
                $to = $half;
            }
        }
        return -1;
	}
}
