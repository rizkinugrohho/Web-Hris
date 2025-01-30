<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('limit', 10);

        // localhost:8000/API/company?id=1
        if($id)
        {
            $company = Company::with(['users'])->find($id);

            if($company)
            {
                return ResponseFormatter::success($company, 'Company found');
            }
            return ResponseFormatter::error('Company not found');
        }

        // localhost:8000/API/company
        $companies = Company::with(['users']);

        if ($name) {
            $companies->where('name', 'like', '%'. $name . '%');
        }

        // Paginate
        return ResponseFormatter::success(
            $companies->paginate($limit),
            'Companies Found'
        );
    }
}
