<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProvinceResourceCollection extends ResourceCollection
{
    protected $depthFromProvince;

    public function depthFromProvince($value)
    {
        $this->depthFromProvince = $value;
        return $this;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function (ProvinceResource $resource) use ($request) {
            return $resource->depthFromProvince($this->depthFromProvince)
                ->toArray($request);
        })->all();
    }
}
