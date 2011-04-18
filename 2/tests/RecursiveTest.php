<?php // vim:set tabstop=4 sw=4 et:

require_once $path . "recursive.php";

/**
 * Test the iterative implementation of binary chop
 *
 * @see http://codekata.pragprog.com/2007/01/kata_two_karate.html
 * @author Raymond Julin
 * Created: 2011-04-18
 */
class RecursiveTest extends PHPUnit_Framework_TestCase {
	public function testChop() {
		$algo = new RecursiveBinaryChop;

		$arr = array(1,3,5);
		$this->assertEquals(-1, $algo->chop(3, array()));
		$this->assertEquals(-1, $algo->chop(3, array(1)));
		$this->assertEquals(0, $algo->chop(1, array(1)));

		$this->assertEquals(0, $algo->chop(1, $arr));
		$this->assertEquals(1, $algo->chop(3, $arr));
		$this->assertEquals(2, $algo->chop(5, $arr));

		foreach (array(0,2,4,6) as $pos)
			$this->assertEquals(-1, $algo->chop($pos, $arr));

		$arr = array(1,3,5,7);
		$this->assertEquals(0, $algo->chop(1, $arr));
		$this->assertEquals(1, $algo->chop(3, $arr));
		$this->assertEquals(2, $algo->chop(5, $arr));
		$this->assertEquals(3, $algo->chop(7, $arr));

		foreach (array(0,2,4,6,8) as $pos)
			$this->assertEquals(-1, $algo->chop($pos, $arr));

        $high = 100;
        $low = 0;
        $step = 2;
        $arr = range($low, $high, $step);
        for ($i = $low; $i < $high; $i++) {
            $expect = ($i % $step == 0) ? array_search($i, $arr) : -1;
            $msg = "$low -> $high => $i";
            $this->assertEquals($expect, $algo->chop($i, $arr), $msg);
        }
	}
}
