<?php
declare(strict_types=1);

include ("NumberGenerator.php");
include("Coordinate.php");

/**
 * Class DataGenerator
 */
class DataGenerator
{
    private const MAX_LATITUDE = 45.8650;
    private const MIN_LATITUDE = 45.7550;

    private const MAX_LONGITUDE = 16.1411;
    private const MIN_LONGITUDE = 15.8340;

    private const NUMBER_OF_START_COORDINATES = 50;
    private const PRECISION = 4;

    /**
     * @return Coordinate
     */
    public static function generateCoordinate(): Coordinate
    {
        $longitude = NumberGenerator::generateRandomNumber(
            self::MAX_LATITUDE,
            self::MIN_LATITUDE,
            self::PRECISION
        );

        $latitude = NumberGenerator::generateRandomNumber(
            self::MAX_LONGITUDE,
            self::MIN_LONGITUDE,
            self::PRECISION
        );

        return new Coordinate($longitude, $latitude);
    }

    /**
     * @return array
     */
    public static function generateStartData(): array
    {
        $coordinates = [];

        for ($i = 0; $i < self::NUMBER_OF_START_COORDINATES; $i++)
        {
            $coordinate = self::generateCoordinate();
            $coordinates[] = $coordinate->__serialize();
        }

        return $coordinates;
    }
}