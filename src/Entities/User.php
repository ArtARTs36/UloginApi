<?php

namespace ArtARTs36\ULoginApi\Entities;

class User
{
    public const REQUIRED_FIELDS = [
        'first_name',
        'last_name',
        'identity',
        'network',
    ];

    private $firstName;

    private $lastName;

    private $identity;

    private $network;

    private $uid;

    private $city;

    private $email;

    /**
     * @param array<string, string|integer> $rawData
     */
    public function __construct(string $network, array $rawData)
    {
        $this->network = $network;
        $this->firstName = $rawData['first_name'];
        $this->lastName = $rawData['last_name'];
        $this->identity = $rawData['identity'];
        $this->uid = $rawData['uid'] ?? null;
        $this->city = $rawData['original_city'] ?? null;
        $this->email = $rawData['email'] ?? null;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function identity(): string
    {
        return $this->identity;
    }

    public function network(): string
    {
        return $this->network;
    }

    public function isOfNetwork(string $name): bool
    {
        return $this->network === $name;
    }

    public function uid(): ?int
    {
        return $this->uid;
    }

    public function city(): ?int
    {
        return $this->city;
    }

    public function isOfCity(string $city): bool
    {
        return !empty($this->city) && $this->city === $city;
    }

    public function email(): ?string
    {
        return $this->email;
    }
}
