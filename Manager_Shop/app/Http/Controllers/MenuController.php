<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $menu;
    private $menuRecusive;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menu = $menu;
        $this->menuRecusive = $menuRecusive;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menus.index', compact('menus'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
     
        return view('admin.menus.add',compact('optionSelect'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuFollowEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowEdit->parent_id);
        return view('admin.menus.edit',compact('menuFollowEdit','optionSelect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
