<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentContoller extends Controller
{
    public function payment()
  {
    return view('admin.payment.payment');
  }
  public function deve()
  {
    return view('admin.deve');
  }
}
