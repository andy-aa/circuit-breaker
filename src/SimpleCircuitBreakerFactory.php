<?php

namespace PrestaShop\CircuitBreaker;

use PrestaShop\CircuitBreaker\Contracts\Factory;
use PrestaShop\CircuitBreaker\Places\ClosedPlace;
use PrestaShop\CircuitBreaker\Places\HalfOpenPlace;
use PrestaShop\CircuitBreaker\Places\OpenPlace;

/**
 * Main implementation of Circuit Breaker Factory
 * Used to create a SimpleCircuitBreaker instance.
 */
final class SimpleCircuitBreakerFactory implements Factory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $settings)
    {
        $openPlace = OpenPlace::fromArray($settings['open']);
        $halfOpenPlace = HalfOpenPlace::fromArray($settings['half_open']);
        $closedPlace = ClosedPlace::fromArray($settings['closed']);

        return new SimpleCircuitBreaker(
            $openPlace,
            $halfOpenPlace,
            $closedPlace
        );
    }
}
