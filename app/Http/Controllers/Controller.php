<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Tenants() {
        $ten = Tenant::all();
        $data = array(
            'ten' => $ten,
        );
        return view('Tenants', $data);
    }
}
