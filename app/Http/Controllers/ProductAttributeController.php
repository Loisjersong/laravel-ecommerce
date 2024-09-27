<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        return view('admin.product.attribute.index');
    }

    public function create()
    {
        return view('admin.product.attribute.create');
    }
}
