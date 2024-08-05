<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MesController extends Controller
{
    public function index()
    {
        return view('mes_dashboard');
    }
    public function stock_insert()
    {
        return view('mes_stock_insert');
    }
    public function stock_query()
    {
        return view('mes_stock_query');
    }
    public function order_query()
    {
        return view('mes_order_query');
    }
    public function stock_update()
    {
        return view('mes_stock_update');
    }
    public function inventory_query()
    {
        return view('mes_inventory_query');
    }
    public function report_stock()
    {
        return view('mes_report_stock');
    }
    public function addressing()
    {
        return view('mes_addressing');
    }
}
