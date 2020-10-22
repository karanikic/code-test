<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{

    protected $fillable = [
        'name', 'description', 'price',
    ];
    /**
     * The Product associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param array $data
     *
     * @return Product
     */
    public static function createProduct(array $data)
    {
        Log::info($data);
        return static::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
        ]);
    }

    public function updateProduct(Product $product, array $data)
    {
        if($product) {
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->image =  $data['image'];

            $product->save();
            return response()->json([
                "message" => "Product sucesfully updated"
            ], 202);

        } else {
            return response()->json([
                "message" => "Product with such id not found"
            ], 404);
        }
    }

    public function deleteProduct(Product $product)
    {
        if($product) {
            $product->delete();
            return response()->json([
                "message" => "Product deleted"
            ], 202);

        } else {
            return response()->json([
                "message" => "Product with such id not found"
            ], 404);
        }
    }


}
