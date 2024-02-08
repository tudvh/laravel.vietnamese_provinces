<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DistrictResourceCollection extends ResourceCollection
{
    protected $depthFromProvince;
    protected $depthFromDistrict;

    public function depthFromProvince($value)
    {
        $this->depthFromProvince = $value;
        return $this;
    }

    public function depthFromDistrict($value)
    {
        $this->depthFromDistrict = $value;
        return $this;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function (DistrictResource $resource) use ($request) {
            return $resource->depthFromProvince($this->depthFromProvince)
                ->depthFromDistrict($this->depthFromDistrict)
                ->toArray($request);
        })->all();
    }
}
