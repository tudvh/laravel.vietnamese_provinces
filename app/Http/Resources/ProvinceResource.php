<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// https://stackoverflow.com/questions/50638257/laravel-5-6-pass-additional-parameters-to-api-resource

class ProvinceResource extends JsonResource
{
    protected $depthFromProvince;

    public function depthFromProvince($value)
    {
        $this->depthFromProvince = $value;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $districts = $this->depthFromProvince >= 2 ? DistrictResource::collection($this->districts)->depthFromProvince($this->depthFromProvince) : [];

        return [
            'code' => $this->code,
            'name' => $this->name,
            'name_en' => $this->name_en,
            'full_name' => $this->full_name,
            'full_name_en' => $this->full_name_en,
            'code_name' => $this->code_name,
            'administrative_unit_id' => $this->administrative_unit_id,
            'administrative_region_id' => $this->administrative_region_id,
            'districts' => $districts
        ];
    }

    public static function collection($resource)
    {
        return new ProvinceResourceCollection($resource);
    }
}
