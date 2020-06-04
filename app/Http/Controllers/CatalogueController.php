<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Category;
use App\Product;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // Gets first category available and call subindex
        $response = Http::get('http://mylolo-id.test/api/categories/first');

        return redirect('catalogue/'.$response['data']['category']);
    }

    public function subindex(Request $request, $category)
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

        $params = array();

        if ($request->has('orderby'))
        {
            $params['orderby'] = $request['orderby'];
        }

        // Get products in that category
        $products = Http::get('http://mylolo-id.test/api/categories/'.$active_category['id'].'/products', $params)['data'];

        return view('client/catalogue', compact('categories', 'active_category', 'products', 'params'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
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

        return view('client/catalogue', compact('categories', 'active_category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
