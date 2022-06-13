<?php

namespace PHP\Array\Benchmarks;

class PHPArrayBench
{
    protected array $a;

    protected array $b;

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointVector() : void
    {
        $a = array_fill(0, 100000000, 42.0);
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createConstantFloatingPointPowerOfTwoVector() : void
    {
        $a = array_fill(0, 134217728, 42.0);
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createRandomIntegerVector() : void
    {
        $a = [];

        for ($i = 0; $i < 100000000; ++$i) {
            $a[] = rand();
        }
    }

    public function setUpIterate() : void
    {
        $this->a = array_fill(0, 100000000, 'noot noot');
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

    public function setUpMapSqrtRandomFloatingPointVector() : void
    {
        $this->a = [];

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a[] = rand() / PHP_INT_MAX;
        }
    }

    /**
     * @Subject
     * @BeforeMethods("setUpMapSqrtRandomFloatingPointVector")
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function mapSqrtRandomFloatingPointVector() : void
    {
        $b = array_map('sqrt', $this->a);
    }

    public function setUpDotTwoRandomFloatingPointVectors() : void
    {
        $this->a = $this->b = [];

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a[] = rand() / PHP_INT_MAX;
            $this->b[] = rand() / PHP_INT_MAX;
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
