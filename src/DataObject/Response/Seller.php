<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Seller implements DataObjectInterface
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $zip;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var Rating
     */
    private $rating;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @param string|null $name
     */
    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string|null $type
     * @return Seller
     */
    public function setType(?string $type): Seller
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $address
     * @return Seller
     */
    public function setAddress(?string $address): Seller
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string|null $city
     * @return Seller
     */
    public function setCity(?string $city): Seller
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string|null $zip
     * @return Seller
     */
    public function setZip(?string $zip): Seller
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @param string|null $country
     * @return Seller
     */
    public function setCountry(?string $country): Seller
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string|null $email
     * @return Seller
     */
    public function setEmail(?string $email): Seller
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string|null $phone
     * @return Seller
     */
    public function setPhone(?string $phone): Seller
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param Rating $rating
     * @return Seller
     */
    public function setRating(Rating $rating): Seller
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return Rating
     */
    public function getRating(): Rating
    {
        return $this->rating;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'address' => $this->address,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'email' => $this->email,
            'phone' => $this->phone,
            'rating' => $this->rating->toArray(),
        ];
    }
}
