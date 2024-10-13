<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->paginate(5);
        return view('Menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::whereNull('parent_id')->get();
        return view('Menu.create', [
            'menu'=>$menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'link' => 'required|url',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'IsActive' => 'required|boolean',
        ]);
        Menu::create([
            'menu_name' => $request->menu_name,
            'link' => $request->link,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id,
            'order' => $request->order,
            'IsActive' => (int)$request->IsActive,
        ]);
        // dd($request->IsActive);
        return redirect()->route('admin-menu')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id); // Lấy menu đang chỉnh sửa
        $menus = Menu::where('id', '!=', $id)->get();
        return view('menu.update',compact('menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::where('id', $id)->first();

        $request->validate([
            'menu_name' => 'required|string|max:255',
            'link' => 'required|url',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'IsActive' => 'required|boolean',
        ]);

        $menu->update([
            'menu_name' => $request->menu_name,
            'link' => $request->link,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id ?: null,
            'order' => $request->order,
            'IsActive' => (int)$request->IsActive,
        ]);
        // dd($menu->IsActive);
        return redirect()->route('admin-menu')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::find($id);
        $menu->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
