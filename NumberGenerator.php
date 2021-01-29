<?php
declare(strict_types=1);

/**
 * Class Generator
 */
final class NumberGenerator
{
    /**
     * @param float $maxNumber
     * @param float $minNumber
     * @param int $precision
     * @return false|float
     */
    public static function generateRandomNumber(float $maxNumber, float $minNumber, int $precision)
    {
        $range = $maxNumber - $minNumber;
        $num = $minNumber + $range * (mt_rand() / mt_getrandmax());

        return round($num, $precision);
    }

}