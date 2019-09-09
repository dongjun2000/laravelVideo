<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeUpdateReuqest;
use Illuminate\Http\Request;

class MeController extends CommonController
{
    public function show()
    {
        return view('admin.me.show');
    }

    public function update(MeUpdateReuqest $request)
    {
        $user = \Auth::guard('admin')->user();
        $user->nickname = $request->get('nickname');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return back()->with('success', '更新成功！');
    }
}
