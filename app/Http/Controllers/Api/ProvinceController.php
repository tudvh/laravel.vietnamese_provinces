<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $search = '%' . str_replace(' ', '%', $request->input('search')) . '%';
        $sortBy = $request->input('sort_by', 'code');

        $provinces = Province::where('full_name', 'like', $search);

        if ($sortBy == 'administrative_unit') {
            $provinces->orderBy('administrative_unit_id');
        }

        $provinces = $provinces->orderBy('code')
            ->get();

        return ProvinceResource::collection($provinces);
    }

    public function show($provinceCode)
    {
        $province = Province::where('code', $provinceCode)
            ->orWhere('code_name', $provinceCode)
            ->firstOrFail();

        return ProvinceResource::make($province);
    }
}
