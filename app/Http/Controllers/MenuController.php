<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function index()
    {
      $menu = Menu::where('parent_id', '=', null)->get();
      $allMenu = Menu::pluck('nama','id')->all();
      return view('menu',compact('menu','allMenu'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
        		'nama' => 'required',
        	]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? null : $input['parent_id'];
        
        Menu::create($input);
        return back()->with('success', 'Sukses Tambah Menu Baru.');
    }

    public function delete($id) {
      $menu = Menu::with(['childs'])->find($id);

      foreach($menu['childs'] as $key => $val) {
        Menu::destroy($val['id']);
      }
      Menu::destroy($id);

      return back()->with('success', 'Sukses Hapus Menu.');
    }
}