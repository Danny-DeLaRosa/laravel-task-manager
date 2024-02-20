<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{

    public function sum_test(): void
    {
        describe('sum', function () {
            it('may sum integers', function () {
                $result = sum(1, 2);
          
                expect($result)->toBe(3);
             });
          
             it('may sum floats', function () {
                $result = sum(1.5, 2.5);
          
                expect($result)->toBe(4);
             });
         });
    }
}