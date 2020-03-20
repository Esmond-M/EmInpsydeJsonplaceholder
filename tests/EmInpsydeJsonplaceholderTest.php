<?php

use PHPUnit\Framework\TestCase;

    class EmInpsydeJsonplaceholder extends TestCase
    {

        /**
        @test
        Assert whether var returns a null value
         */
        public function tests_emCustomEndpointUrl()
        {
            $inpsydeEndpoint = filter_input(
                INPUT_GET,
                'inpsyde-endpoint', FILTER_VALIDATE_URL
            );
            $this->assertNull($inpsydeEndpoint);
        }
}
