<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    public function redirectPath()
    {
        return route('admin.home');
    }

    /**
     * 登录表单
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginForm()
    {
        return view('admin.login');
    }

    /**
     * 登录操作
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $data = $request->only('username', 'password');

        if ($this->guard()->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectPath());
        }

        session()->flash('error', '用户名或密码错误');
        return back()->withInput();
    }

    /**
     * 用户退出
     *
     * @return $this
     */
    public function logout()
    {
        $this->guard()->logout();

        return redirect()->route('admin.login')->with('success', '退出成功!');
    }

    /**
     * 后台首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('admin.home');
    }

    /**
     * 自定义看守器
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return \Auth::guard('admin');
    }
}
