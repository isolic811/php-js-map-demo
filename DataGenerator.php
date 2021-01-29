<?php
declare(strict_types=1);

include ("NumberGenerator.php");

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
    private const PRECISCION = 4;

    /**
     * @return mixed
     */
    public static function generateCoordinate(): array
    {
        $longitude = NumberGenerator::generateRandomNumber(
            self::MAX_LATITUDE,
            self::MIN_LATITUDE,
            self::PRECISCION
        );

        $latitude = NumberGenerator::generateRandomNumber(
            self::MAX_LONGITUDE,
            self::MIN_LONGITUDE,
            self::PRECISCION
        );

        $coordinate["longitude"] = $longitude;
        $coordinate["latitude"] = $latitude;

        return $coordinate;
    }

    /**
     * @return array
     */
    public static function generateStartData(): array
    {
        $coordinates = [];

        for ($i = 0; $i < self::NUMBER_OF_START_COORDINATES; $i++)
        {
            $coordinates[] = self::generateCoordinate();
        }

        return $coordinates;
    }
}