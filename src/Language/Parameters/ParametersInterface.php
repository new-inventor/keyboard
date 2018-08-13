<?php
/**
 * Created by Ionov George (new-inventor).
 * Date: 12.08.2018
 */

namespace KeyboardAnalytics\Language\Parameters;


interface ParametersInterface
{
    public function getWeight(string $series): float;

    public function getSigns(): array;

    public function getDoubleSeries(): array;

    public function getTripleSeries(): array;
}