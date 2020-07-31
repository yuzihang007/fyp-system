<?php


/**
 * 成功提示
 *
 * @param array $data
 * @param string $dataName
 *
 * @return \Illuminate\Http\JsonResponse
 */
function success($data = [], $dataName = 'data', $message = 'success')
{
    return response()->json(['message' => $message, 'code' => 1, "{$dataName}" => $data], 200);
}

function error($msg = '未知错误', $code = -1, $httpStatus = 422)
{
    return response()->json(['message' => $msg, 'code' => $code, 'data' => ''], $httpStatus);
}
