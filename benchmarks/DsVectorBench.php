<?php

namespace PHP\Array\Bechmarks;

use Ds\Vector;

class DsVectorBench
{
    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointVectors() : void
    {
        $a = new Vector();

        $a->allocate(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $a->insert($i, 42.0);
        }

        $b = new Vector();

        $b->allocate(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $b->insert($i, 58.0);
        }
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointPowerOfTwoVectors() : void
    {
        $a = new Vector();

        $a->allocate(134217728);

        for ($i = 0; $i < 134217728; ++$i) {
            $a->insert($i, 42.0);
        }

        $b = new Vector();

        $b->allocate(134217728);

        for ($i = 0; $i < 134217728; ++$i) {
            $b->insert($i, 58.0);
        }
    }
}
