<?php
declare(strict_types=1);

/**
 * Class Coordinate
 */
class Coordinate
{
    /**
     * @var float
     */
    private float $longitude;

    /**
     * @var float
     */
    private float $latitude;

    /**
     * Coordinate constructor.
     * @param float $longitude
     * @param float $latitude
     */
    public function __construct(float $longitude, float $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /**
     * @return array<string, float>
     */
    public function __serialize(): array
    {
        return [
            'longitude' => $this->longitude,
            'latitude' => $this->latitude
        ];
    }
}