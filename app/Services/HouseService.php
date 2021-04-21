<?php

namespace App\Services;

use App\Models\House;
use App\Services\Contracts\HouseInterface;

/**
 * Class HouseService
 * @package App\Services
 */
class HouseService implements HouseInterface
{
    /**
     * Search Houses.
     *
     * @param array $data
     * @return object|null
     */
    public function searchHouses(array $data): ?object
    {
        return House::query()
            ->when($data['name'] ?? null, function ($query) use ($data) {
                return $query->where('name', 'like', '%'.$data['name'].'%');
            })
            ->when($data['bedrooms'] != null, function ($query) use ($data) {
                return $query->where('bedrooms', $data['bedrooms']);
            })
            ->when($data['bathrooms'] != null, function ($query) use ($data) {
                return $query->where('bathrooms', $data['bathrooms']);
            })
            ->when($data['storeys'] != null, function ($query) use ($data) {
                return $query->where('storeys', $data['storeys']);
            })
            ->when($data['garages'] != null, function ($query) use ($data) {
                return $query->where('bedrooms', $data['garages']);
            })
            ->when($data['min_price'] != null, function ($query) use ($data) {
                return $query->where('price', '>=', $data['min_price']);
            })
            ->when($data['max_price'] != null, function ($query) use ($data) {
                return $query->where('price', '<=', $data['max_price']);
            })
            ->paginate(10);
    }
}
