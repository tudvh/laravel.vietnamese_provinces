<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'name_en' => $this->name_en,
            'full_name' => $this->full_name,
            'full_name_en' => $this->full_name_en,
            'code_name' => $this->code_name,
            'district_code' => $this->province_code,
            'administrative_unit_id' => $this->administrative_unit_id
        ];
    }
}
