<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
    public function index()
    {
        return view('admin.discount.index');
    }

    public function create()
    {
        return view('admin.discount.create');
    }
}
