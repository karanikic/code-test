<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function listAllProducts()
    {
        return ProductResource::collection(Product::all());
    }

    public function listSingleProduct($product_id)
    {
        return ProductResource::collection(Product::find($product_id));
    }

    public function listUsersProducts($user_id)
    {
        $user = User::find($user_id);

        return ProductResource::collection(Product::UsersProducts($user));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::createProduct($request->validated());

        if($product) {

            return response()->json([
                "message" => "Product created"
            ], 200);

        } else {
            return response()->json([
                "message" => "Whoops something happened!"
            ], 404);
        }
    }

    public function update(ProductRequest $request, $product_id)
    {
        $product = Product::find($product_id);

        return $product->updateProduct($product, $request->validated());

    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);

        return $product->deleteProduct();
    }

    public function addUserToProduct($product_id)
    {
        $product = Product::find($product_id);

        return $product->addUser($product);
    }

    public function removeUserFromProduct($product_id)
    {
        $product = Product::find($product_id);

        return $product->removeUser($product);
    }
}
