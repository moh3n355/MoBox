<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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

    public function ReciveAllUsers(){

        $users = User::all();

        return response()->json($users);
    }
}
