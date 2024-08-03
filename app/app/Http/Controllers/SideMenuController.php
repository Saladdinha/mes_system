<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SideMenu;

class SideMenuController extends Controller
{
    public function store(Request $request)
    {
        $response = [];
        foreach ($request->all() as $k => $item) {
            $result = SideMenu::firstOrCreate([
                'name' => $item['name'],
                'icon' => $item['icon'],
                'route' => $item['route'],
                'group' => $item['group'],
            ]);
            $response[$k] = ['result' => $result];
        }
        return response()->json(['success' => 'success', 'response' => $response], 200);    
    }
    public function all()
    {
        return SideMenu::all();
    }
    public function delete(Request $request)
    {
        SideMenu::truncate();
        return 'success';
    }
    public function update(Request $request)
    {

    }
}
