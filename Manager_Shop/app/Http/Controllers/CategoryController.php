<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Traits\DeleteModelTrait;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DeleteModelTrait;
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
      
        return view('admin.category.add',compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
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
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit(string $id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
       
        return view('admin.category.edit',compact('category','htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->deleteModelTrait($id,$this->category);
    }
}
