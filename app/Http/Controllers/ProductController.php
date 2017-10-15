<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $prd_detail;

    public function __construct(Product $prd_detail)
    {
        $this->prd_detail = $prd_detail;
    }

    public function detail()
    {
        $prd_detail = $this->prd_detail->first();
        return view('sites.product', compact('prd_detail'));
    }
}
