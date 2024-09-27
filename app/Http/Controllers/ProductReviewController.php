<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        return view('admin.product.reviews.index');
    }
}
