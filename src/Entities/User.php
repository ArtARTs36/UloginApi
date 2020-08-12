<?php

namespace ArtARTs36\ULoginApi\Entities;

/**
 * Class User
 * @package ArtARTs36\ULoginApi\Entities
 */
class User
{
    /** @var string[] */
    public const REQUIRED_FIELDS = [
        'first_name',
        'last_name',
        'identity',
        'network',
    ];

    /** @var mixed */
    private $firstName;

    /** @var mixed */
    private $lastName;

    /** @var mixed */
    private $identity;

    /** @var string */
    private $network;

    /** @var int|null */
    private $uid;

    /** @var string|null */
    private $city;

    /**
     * @param string $network
     * @param array $rawData
     */
    public function __construct(string $network, array $rawData)
    {
        $this->network = $network;
        $this->firstName = $rawData['first_name'];
        $this->lastName = $rawData['last_name'];
        $this->identity = $rawData['identity'];
        $this->uid = $rawData['uid'] ?? null;
        $this->city = $rawData['original_city'] ?? null;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function identity(): string
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function network(): string
    {
        return $this->network;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isOfNetwork(string $name): bool
    {
        return $this->network === $name;
    }

    /**
     * @return int|null
     */
    public function uid(): ?int
    {
        return $this->uid;
    }

    /**
     * @return int|null
     */
    public function city(): ?int
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return bool
     */
    public function isOfCity(string $city): bool
    {
        return !empty($this->city) && $this->city === $city;
    }
}
