<?php

namespace PHP\ArrayImplementation\Benchmarks;

use SplFixedArray;

class SPLFixedArrayBench
{
    protected SplFixedArray $a;

    protected SplFixedArray $b;

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
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointPowerOfTwoVectors() : void
    {
        $a = new SplFixedArray(134217728);

        for ($i = 0; $i < 134217728; ++$i) {
            $a[$i] = 42.0;
        }
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createRandomIntegerVectors() : void
    {
        $a = new SplFixedArray(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $a[$i] = rand();
        }
    }

    public function setUpIterate() : void
    {
        $this->a = new SplFixedArray(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a[$i] = 'noot noot';
        }
    }

    /**
     * @Subject
     * @BeforeMethods("setUpIterate")
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function iterate() : void
    {
        foreach ($this->a as $value) {
            $temp = $value;
        }
    }

    public function setUpDotTwoRandomFloatingPointVectors() : void
    {
        $this->a = new SplFixedArray(100000000);
        $this->b = new SplFixedArray(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a[$i] = rand() / PHP_INT_MAX;
            $this->b[$i] = rand() / PHP_INT_MAX;
        }
    }

    /**
     * @Subject
     * @BeforeMethods("setUpDotTwoRandomFloatingPointVectors")
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function dotTwoRandomFloatingPointVectors() : void
    {
        $sigma = 0.0;

        foreach ($this->a as $i => $valueA) {
            $sigma += $valueA * $this->b[$i];
        }
    }
}
