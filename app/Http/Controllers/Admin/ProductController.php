<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Material;
use App\Colour;
use App\Size;
use App\Photo;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gets first category available and call subindex
        $category = Category::first()->category;
        return redirect()->route('admin.product.category', [$category]);
    }

    public function subindex($category)
    {
        $categories = Category::all();

        // Set active_category from the param given
        foreach ($categories as $category_itr)
        {
            if ($category_itr->category == $category)
            {
                $active_category = $category_itr;
            }
        }

        // Get products
        $products = $active_category->products()->get();

        $photos = Photo::all();

        return view('admin/products', compact('categories', 'active_category', 'products', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        $colours = Colour::all();
        $sizes = Size::all();

        return view('admin/products_create', compact('categories', 'materials', 'colours', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        // Check Category
        $category_inp = $input['category'];
        $category_result = Category::where('category', $category_inp)->first();
        // If category does not exist, create a new one.
        if ($category_result == null){
            $category = new Category;
            $category->category = $category_inp;
            $category->save();
            $category_id = $category->id;
        } else {
            $category_id = $category_result->id;
        }

        // Create Product
        $product = new Product;
        $product->category_id = $category_id;
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->save();

        // Check Mateials
        $materials_inp = $input['materials'];
        foreach ($materials_inp as $material_inp){
            $material_result = Material::where('material', $material_inp)->first();
            // Check if material exist, if not, create a new one.
            if ($material_result == null){
                $material = new Material;
                $material->material = $material_inp;
                $material->save();
                $product->materials()->attach($material);
            } else {
                $product->materials()->attach($material_result);
            }
        }

        // Check Colours
        $colours_inp = $input['colours'];
        foreach ($colours_inp as $colour_inp){
            $colour_result = Colour::where('colour', $colour_inp)->first();
            // Check if colour exist, if not, create a new one.
            if ($colour_result == null){
                $colour = new Colour;
                $colour->colour = $colour_inp;
                $colour->save();
                $product->colours()->attach($colour);
            } else {
                $product->colours()->attach($colour_result);
            }
        }

        // Check Sizes
        $sizes_inp = $input['sizes'];
        foreach ($sizes_inp as $size_inp){
            $size_result = Size::where('size', $size_inp)->first();
            // Check if size exist, if not, create a new one.
            if ($size_result == null){
                $size = new Size;
                $size->size = $size_inp;
                $size->save();
                $product->sizes()->attach($size);
            } else {
                $product->sizes()->attach($size_result);
            }
        }
        
        // Upload Images
        $images_inp = $input['images'];
        foreach ($images_inp as $image_inp){
            $ext = $image_inp->getClientOriginalExtension();
            while(true){
                $newName = rand(100000,1001238912).".".$ext;

                if (!file_exists('uploads/images/'.$newName)){
                    $image_inp->move('uploads/images', $newName);
                    break;
                }
            }
            $photo = new Photo;
            $photo->product_id = $product->id;
            $photo->file = $newName;
            $photo->save();
        }

        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $materials = Material::all();
        $colours = Colour::all();
        $sizes = Size::all();

        $product = Product::find($id);

        return view('admin/products_edit', compact('categories', 'materials', 'colours', 'sizes', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $product = Product::findorfail($id);

        // Check Category
        $category_result = Category::where('category', $input['category'])->first();
        // If category does not exist, create a new one.
        if ($category_result == null) { 
            $category = new Category;
            $category->category = $input['category'];
            $category->save();
            $category_id = $category->id;
        } else {
            $category_id = $category_result->id;
        }

        $product->category_id = $category_id;
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->save();

        // Detach all materials from product
        $product->materials()->detach();

        // Check Mateials
        foreach ($input['materials'] as $material_inp){
            $material_result = Material::where('material', $material_inp)->first();
            // Check if material exist, if not, create a new one.
            if ($material_result == null) {
                $material = new Material;
                $material->material = $material_inp;
                $material->save();
                $product->materials()->attach($material);
            } else {
                $product->materials()->attach($material_result);
            }
        }

        // Detach all colours from product
        $product->colours()->detach();

        // Check Colours
        foreach ($input['colours'] as $colour_inp){
            $colour_result = Colour::where('colour', $colour_inp)->first();
            // Check if colour exist, if not, create a new one.
            if ($colour_result == null){
                $colour = new Colour;
                $colour->colour = $colour_inp;
                $colour->save();
                $product->colours()->attach($colour);
            } else {
                $product->colours()->attach($colour_result);
            }
        }

        // Detach all sizes from producty
        $product->sizes()->detach();

        // Check Sizes
        foreach ($input['sizes'] as $size_inp){
            $size_result = Size::where('size', $size_inp)->first();
            // Check if size exist, if not, create a new one.
            if ($size_result == null){
                $size = new Size;
                $size->size = $size_inp;
                $size->save();
                $product->sizes()->attach($size);
            } else {
                $product->sizes()->attach($size_result);
            }
        }

        // Check if user inputed any photos
        if ($request->has('images')){

            // Delete photos from upload folder
            $photos = $product->photos;
            foreach ($photos as $photo) {
                $img_path = 'uploads/images/'.$photo->file;
                unlink($img_path);
            }

            // Delete photos from database
            $product->photos()->delete();

            // Upload Images
            $images_inp = $input['images'];
            foreach ($images_inp as $image_inp)
            {
                $ext = $image_inp->getClientOriginalExtension();
                while(true)
                {
                    $newName = rand(100000,1001238912).".".$ext;

                    if (!file_exists('uploads/images/'.$newName))
                    {
                        $image_inp->move('uploads/images', $newName);
                        break;
                    }
                }
                $photo = new Photo;
                $photo->product_id = $product->id;
                $photo->file = $newName;
                $photo->save();
            }
        }

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);

        // Delete Photos
        $photos = $product->photos;
        foreach ($photos as $photo)
        {
            $img_path = 'uploads/images/'.$photo->file;
            unlink($img_path);
        }

        $product->delete();

        return redirect('admin/products');
    }
}
