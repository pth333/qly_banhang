<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use StorageImageTrait;
    use DeleteModelTrait;
    private $product;
    private $category;
    private $productImage;
    private $productTag;
    private $tag;
    public function __construct(Product $product, Category $category, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add',compact('htmlOption'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductAddRequest $request)
    {
        try {
            // bdau 
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            // dd($dataProductCreate);
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product' );
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            // chen data vao product_images
            if($request->hasFile('image_path')){
                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    // dd($dataProductImageDetail);
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            // chen tags cho product
            // dd($request->tags);
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    // chen vaof tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->attach($tagIds);
            }

            
          
            // dam bao chay dung het ms insert dlieu
            DB::commit();
            return redirect()->route('products.index');
            

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
        
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit',compact('product','htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // bdau 
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product' );
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // pthuc update trar ve gtri true hoac false nen ko ther gan
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            // chen data vao product_images
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    // dd($dataProductImageDetail);
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            // chen tags cho product
            // dd($request->tags);
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    // chen vaof tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }

            
          
            // dam bao chay dung het ms insert dlieu
            DB::commit();
            return redirect()->route('products.index');
            

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->deleteModelTrait($id,$this->product);
    }
}
