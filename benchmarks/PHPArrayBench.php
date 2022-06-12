<?php

namespace PHP\Array\Bechmarks;

class PHPArrayBench
{
    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointVectors() : void
    {
        $a = array_fill(0, 100000000, 42.0);

        $b = array_fill(0, 100000000, -58.0);
    }
}
