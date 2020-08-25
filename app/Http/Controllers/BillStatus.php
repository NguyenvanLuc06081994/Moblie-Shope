<?php


namespace App\Http\Controllers;


interface BillStatus
{
    const Handling = 'đang xử lý';
    const Shipping = 'đang giao hàng';
    const Done = 'đã hoàn thành';
}
