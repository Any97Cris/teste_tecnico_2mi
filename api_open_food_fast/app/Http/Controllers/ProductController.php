<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductFormRequest;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'message' => 'Sucesso ao Cadastrar' 
        ],201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        if(!$id = Product::find($product)){
            return response()->json(['message' => 'Not Found'], 404);
        } 

        return $id;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $product)
    {

        if(!$id = Product::find($product)){
            return response()->json(['message' => 'Not Found'], 404);
        }        

        $id->update($request->all());
        return response()->json($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        if(!$id = Product::find($product)){
            return response()->json(['message' => 'Not Found'], 404);
        } 

        $id->destroy($product);
        return response()->json([
            'message' => 'Delete Realizado com Sucesso'
        ]);
    }

    public function cron(){        

        $client = new Client();

        $response = $client->request('GET', 'https://world.openfoodfacts.org/api/v2/search?fields=code,product_name,url,creator,created_t,last_modified_t,product_name,quantity,brands,categories,labels,cities,purchase_places,stores,ingredients_text,traces,serving_size,serving_quantity,nutriscore_score,nutriscore_grade,main_category,image_url&page_count=100&page_size=100');

        $body = $response->getBody();

        $api = json_decode($body);

        foreach($api->products as $product){
            Product::create((array)$product);
        }

        return response()->json([
            'message' => 'Cadastrado com Sucesso'
        ],201);

    }
}
