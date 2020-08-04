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

function getDiffDateRange($startdate = null, $enddate = null)
{
    date_default_timezone_set("Asia/Shanghai");

    $stimestamp = strtotime($startdate);
    $etimestamp = $enddate ? strtotime($enddate) : strtotime(date('Y-m-d')) ;

    // 计算日期段内有多少天
    $days = ($etimestamp-$stimestamp)/86400+1;

    // 保存每天日期
    $date = array();

    for($i=0; $i<$days; $i++){
        $date[] = date('Y-m-d', $stimestamp+(86400*$i));
    }

    return $date;
}