<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $imageFile, $imageName, $imageDirectory, $imageUrl;

    public static function createProduct($request)
    {
        self::$imageFile = $request->file('image');
        if (self::$imageFile)
        {
            self::$imageName = rand(10,1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'backend/img/upload/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }

        self::$product                      = new Product();
        self::$product->name                = $request->name;
        self::$product->category_name       = $request->category_name;
        self::$product->brand_name          = $request->brand_name;
        self::$product->description         = $request->description;
        self::$product->image               = self::$imageUrl;
        self::$product->status              = $request->status;
        self::$product->save();
    }
    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($id);
        self::$imageFile = $request->file('image');
        if(self::$imageFile)
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageName = rand(10,1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'backend/img/upload/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
            self::$imageUrl = self::$product->image;
        }
        self::$product->name                = $request->name;
        self::$product->category_name       = $request->category_name;
        self::$product->brand_name          = $request->brand_name;
        self::$product->description         = $request->description;
        self::$product->image               = self::$imageUrl;
        self::$product->status              = $request->status;
        self::$product->save();
    }
}
