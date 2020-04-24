<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Rating;
use Teas\AlphaApiClient\DataObject\Response\Seller;

class SellerTest extends TestCase
{
    public function testAll()
    {
        $name = uniqid();
        $type = uniqid();
        $address = uniqid();
        $city = uniqid();
        $zip = uniqid();
        $email = uniqid();
        $phone = uniqid();
        $country = uniqid();
        $rating = $this->createMock(Rating::class);
        $ratingData = [
            'average' => uniqid(),
            'count' => uniqid(),
        ];
        $rating->expects(self::once())
            ->method('toArray')
            ->willReturn($ratingData);

        $seller = new Seller($name);
        $seller->setAddress($address);
        $seller->setCity($city);
        $seller->setZip($zip);
        $seller->setType($type);
        $seller->setCountry($country);
        $seller->setEmail($email);
        $seller->setPhone($phone);
        $seller->setRating($rating);
        $this->assertSame($name, $seller->getName());
        $this->assertSame($type, $seller->getType());
        $this->assertSame($address, $seller->getAddress());
        $this->assertSame($city, $seller->getCity());
        $this->assertSame($zip, $seller->getZip());
        $this->assertSame($email, $seller->getEmail());
        $this->assertSame($phone, $seller->getPhone());
        $this->assertSame($country, $seller->getCountry());
        $this->assertSame($rating, $seller->getRating());

        $data = [
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'city' => $city,
            'zip' => $zip,
            'country' => $country,
            'email' => $email,
            'phone' => $phone,
            'rating' => $ratingData,
        ];
        $this->assertSame($data, $seller->toArray());
    }
}
