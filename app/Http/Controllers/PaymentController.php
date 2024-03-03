<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Servant;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class PaymentController extends Controller
{
    public function index(){
        $tables = Table::all();
        $categories=Category::all();
        $servants = Servant::all();
        return view('payments.index',compact('tables','categories','servants'));
    }

}
