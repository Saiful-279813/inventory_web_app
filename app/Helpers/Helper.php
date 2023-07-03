<?php

function admin_id()
{
    return session()->get('admin')['id'];
}

function send_ms($msg, $status)
{
    return response()->json([
        'status' => $status,
        'message' => $msg,
    ]);
}

function send_single_data($dataKey, $data, $status)
{
    return response()->json([
        'status' => $status,
        $dataKey => $data,
    ]);
}

function send_single_data_with_message($dataKey, $data, $status, $message)
{
    return response()->json([
        'status' => $status,
        'message' => $message,
        $dataKey => $data,
    ]);
}

function activeInactive($dataKey, $data, $status, $message)
{
    return response()->json([
        'status' => $status,
        $dataKey => $data,
        'message' => $message,
    ]);
}
