<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $category = Http::get('http://mylolo-id.test/api/categories/first');
        return redirect()->route('admin.product.category', [$category['data']['category']]);
    }

    public function subindex($category)
    {
        $categories = Http::get('http://mylolo-id.test/api/categories')['data'];

        // Set active_category from the param given
        foreach ($categories as $category_itr)
        {
            if ($category_itr['category'] == $category)
            {
                $active_category = $category_itr;
            }
        }

        $products = Http::get('http://mylolo-id.test/api/categories/'.$active_category['id'])['data']['products'];

        $photos = Http::get('http://mylolo-id.test/api/photos')['data'];

        return view('admin/products', compact('categories', 'active_category', 'products', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Http::get('http://mylolo-id.test/api/categories')['data'];
        $materials =Http::get('http://mylolo-id.test/api/materials')['data'];
        $colours = Http::get('http://mylolo-id.test/api/colours')['data'];
        $sizes = Http::get('http://mylolo-id.test/api/sizes')['data'];

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
        $storeProduct = Http::post('http://mylolo-id.test/api/products', $request->toArray());

        // Delete all files in uplaods/temp
        $files = glob('uploads/temp/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
            {
                unlink($file); // delete file
            }
        }
        // Upload Images
        $images_inp = $request['images'];
        foreach ($images_inp as $image_inp){
            $ext = $image_inp->getClientOriginalExtension();
            while(true){
                $newName = rand(100000,1001238912).".".$ext;

                if (!file_exists('uploads/temp/'.$newName)){
                    $image_inp->move('uploads/temp', $newName);
                    break;
                }
            }

            $photo = fopen('uploads/temp/'.$newName, 'r');

            $storePhoto = Http::attach(
                'image', $photo, $newName
            )->post('http://mylolo-id.test/api/photos', ['product_id' => $storeProduct['data']['id']]);;
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
        $categories = Http::get('http://mylolo-id.test/api/categories')['data'];
        $materials =Http::get('http://mylolo-id.test/api/materials')['data'];
        $colours = Http::get('http://mylolo-id.test/api/colours')['data'];
        $sizes = Http::get('http://mylolo-id.test/api/sizes')['data'];

        $product = Http::get('http://mylolo-id.test/api/products/'.$id)['data'];

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
        $updateProduct = Http::put('http://mylolo-id.test/api/products/'.$id, $request->toArray());

        // Check if user inputed any photos
        if ($request->has('images')){

            // Delete all files in uplaods/temp
            $files = glob('uploads/temp/*'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file))
                {
                    unlink($file); // delete file
                }
            }

            $deleteProductPhotos = Http::delete('http://mylolo-id.test/api/products/'.$id.'/photos');

            // Upload Images
            $images_inp = $request['images'];
            foreach ($images_inp as $image_inp)
            {
                $ext = $image_inp->getClientOriginalExtension();
                while(true){
                    $newName = rand(100000,1001238912).".".$ext;

                    if (!file_exists('uploads/temp/'.$newName)){
                        $image_inp->move('uploads/temp', $newName);
                        break;
                    }
                }

                $photo = fopen('uploads/temp/'.$newName, 'r');

                $storePhoto = Http::attach(
                    'image', $photo, $newName
                )->post('http://mylolo-id.test/api/photos', ['product_id' => $storeProduct['data']['id']]);;
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
        $deleteProductPhotos = Http::delete('http://mylolo-id.test/api/products/'.$id.'/photos');

        $deleteProduct = Http::delete('http://mylolo-id.test/api/products/'.$id);

        return redirect('admin/products');
    }
}
