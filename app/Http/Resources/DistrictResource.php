<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
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
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $wards = $this->depthFromProvince >= 3 || $this->depthFromDistrict >= 2 ? WardResource::collection($this->wards) : [];

        return [
            'code' => $this->code,
            'name' => $this->name,
            'name_en' => $this->name_en,
            'full_name' => $this->full_name,
            'full_name_en' => $this->full_name_en,
            'code_name' => $this->code_name,
            'province_code' => $this->province_code,
            'administrative_unit_id' => $this->administrative_unit_id,
            'wards' => $wards
        ];
    }

    public static function collection($resource)
    {
        return new DistrictResourceCollection($resource);
    }
}
