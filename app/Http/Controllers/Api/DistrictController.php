<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getByProvinceCode($provinceCode, Request $request)
    {
        $search = '%' . str_replace(' ', '%', $request->input('search')) . '%';
        $sortBy = $request->input('sort_by', 'code');

        $districts = District::where('province_code', $provinceCode)
            ->where('full_name', 'like', $search);

        if ($sortBy == 'administrative_unit') {
            $districts->orderBy('administrative_unit_id');
        }

        $districts = $districts->orderBy('code')
            ->get();

        return DistrictResource::collection($districts);
    }

    public function show($provinceCode, $districtCode)
    {
        $district = District::where('province_code', $provinceCode)
            ->where('code', $districtCode)
            ->orWhere('code_name', $districtCode)
            ->firstOrFail();

        return DistrictResource::make($district);
    }
}
