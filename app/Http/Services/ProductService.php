<?php


namespace App\Http\Services;


use App\Models\Product;

class ProductService
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handleActive()
    {
        $product = new Product();
        $activeProductList = $product->getActiveList();
        $data = [
            'products' => $activeProductList
        ];
        return view('main', $data);
    }
}
