<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Sales;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
        return view('reports.index');
    }
    public function generate(Request $request){
        $request->validate([
            'from'=>'required',
            'to'=>'required',
        ]);

        //get data
        $startDate = date('Y-m-d H:i:s',strtotime($request->from."00:00:00"));
        $endDate = date('Y-m-d H:i:s',strtotime($request->to."23:59:59"));

        $sales = Sales::whereBetween('created_at',[$startDate,$endDate])
            ->where('payment_status','paid')->get();

        // Debugging
        // dd($sales,$startDate,$endDate);

        $total = $sales->sum('total_received');

        return view('reports.index',compact('startDate','endDate','sales','total'));
    }

    public function export(Request $request){
        // return Excel::download(new SalesExport($request->from, $request->to),'sales.xlsx');
    }

}
