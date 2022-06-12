<?php

namespace PHP\Array\Bechmarks;

use SplFixedArray;

class SplArrayBench
{
    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointVectors() : void
    {
        $a = new SplFixedArray(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $a[$i] = 42.0;
        }

        $b = new SplFixedArray(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $b[$i] = 58.0;
        }
    }
}
