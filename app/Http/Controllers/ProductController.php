<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProductController extends BaseController
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function active()
    {
        try {
            return $this->productService->handleActive();
        } catch (\Exception $e){
            throw new NotFoundHttpException('pisun');
        }
    }
}
