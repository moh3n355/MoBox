<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReciveDataController extends Controller
{
    public function ReciveAddresses() {
    $addresses = json_decode(auth()->user()->address, true);

    if(is_array($addresses) && isset($addresses['city'])) {
        $addresses = [$addresses];
    }

    if(!$addresses) {
        $addresses = [];
    }

        return view('edit-profile', compact('addresses'));
    }
}
