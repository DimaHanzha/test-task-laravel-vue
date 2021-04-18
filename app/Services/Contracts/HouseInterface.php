<?php

namespace App\Services\Contracts;

/**
 * Interface HouseInterface
 * @package App\Services\Contracts
 */
interface HouseInterface
{
    public function searchHouses(array $data): ?object;
}
