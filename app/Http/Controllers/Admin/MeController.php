<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeUpdateReuqest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function show()
    {
        return view('admin.me.show');
    }

    public function update(MeUpdateReuqest $request)
    {

        dd($request->all());
    }
}
