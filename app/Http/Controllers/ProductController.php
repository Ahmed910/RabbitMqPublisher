<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create(['name' => $request->name, 'description' => $request->description]);

        ProductCreated::dispatch('966507828453', 'Hi Donia,This Is Test From Product Service')->onQueue('sms_queue');

        return response()->json(['product' => $product, 'msg' => 'message sent successfully']);
    }
}
