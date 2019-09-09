<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * json返回成功信息
     *
     * @param $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($message, $status = 200)
    {
        return response()->json(['message' => $message, 'valid' => 1], $status);
    }

    /**
     * json返回失败信息
     *
     * @param $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $status = 200)
    {
        return response()->json(['message' => $message, 'valid' => 0], $status);
    }
}