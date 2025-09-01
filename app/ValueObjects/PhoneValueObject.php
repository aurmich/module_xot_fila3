<?php

declare(strict_types=1);

namespace Modules\Xot\ValueObjects;

use function Safe\preg_match;

/**
 * @see https://medium.com/@sliusarchyn/value-objects-in-laravel-use-it-12ba71b00281
 */
class PhoneValueObject
{
<<<<<<< HEAD
<<<<<<< HEAD
    private function __construct(private readonly string $phone) {}

    public static function fromString(string $phone): self
    {
        if (preg_match('/^\+1\d{10}$/', $phone) === 0) {
=======
    private function __construct(private readonly string $phone)
    {
    }

    public static function fromString(string $phone): self
    {
        if (0 === preg_match('/^\+1\d{10}$/', $phone)) {
>>>>>>> e697a77b (.)
=======
    private function __construct(private readonly string $phone)
    {
    }

    public static function fromString(string $phone): self
    {
        if (0 === preg_match('/^\+1\d{10}$/', $phone)) {
>>>>>>> 89d0c8f4 (.)
            throw new \InvalidArgumentException('It is not valid phone value');
        }

        return new self($phone);
    }

    public function toString(): string
    {
        return $this->phone;
    }
}
