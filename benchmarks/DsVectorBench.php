<?php

namespace PHP\ArrayImplementation\Benchmarks;

use Ds\Vector;

class DsVectorBench
{
    protected Vector $a;

    protected Vector $b;

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
            $a->push(42.0);
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
            $a->push(42.0);
        }
    }

    /**
     * @Subject
     * @Iterations(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function createRandomIntegerVectors() : void
    {
        $a = new Vector();

        $a->allocate(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $a->push(rand());
        }
    }

    public function setUpIterate() : void
    {
        $this->a = new Vector();

        $this->a->allocate(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a[] = 'noot noot';
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

    public function setUpMapSqrtRandomFloatingPointVector() : void
    {
        $this->a = new Vector();

        $this->a->allocate(100000000);

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
        $b = $this->a->map('sqrt');
    }

    public function setUpDotTwoRandomFloatingPointVectors() : void
    {
        $this->a = new Vector();
        $this->b = new Vector();

        $this->a->allocate(100000000);
        $this->b->allocate(100000000);

        for ($i = 0; $i < 100000000; ++$i) {
            $this->a->push(rand() / PHP_INT_MAX);
            $this->b->push(rand() / PHP_INT_MAX);
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
