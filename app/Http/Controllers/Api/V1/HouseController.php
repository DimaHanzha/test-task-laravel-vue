<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\HouseResource;
use App\Services\Contracts\HouseInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class HouseController
 * @package App\Http\Controllers\Api\V1
 */
class HouseController extends Controller
{
    /**
     * @var HouseInterface
     */
    protected $houseInterface;

    /**
     * HouseController constructor.
     *
     * @param HouseInterface $houseInterface
     */
    public function __construct(
        HouseInterface $houseInterface
    ){
        $this->houseInterface = $houseInterface;
    }

    /**
     * @param SearchRequest $request
     * @return AnonymousResourceCollection|null
     */
    public function indexSearch(SearchRequest $request): ?AnonymousResourceCollection
    {
        $data = $request->validated();
        $houses = $this->houseInterface->searchHouses($data);

        return HouseResource::collection($houses);
    }
}
