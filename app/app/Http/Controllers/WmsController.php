<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WmsController extends Controller
{
    public function index()
    {
        return view('wms_dashboard');
    }
    public function stock_insert()
    {
        return view('wms_stock_insert');
    }
    public function stock_query()
    {
        return view('wms_stock_query');
    }
    public function order_query()
    {
        return view('wms_order_query');
    }
    public function stock_update()
    {
        return view('wms_stock_update');
    }
    public function inventory_query()
    {
        return view('wms_inventory_query');
    }
    public function report_stock()
    {
        return view('wms_report_stock');
    }
    public function addressing()
    {
        return view('wms_addressing');
    }
}
