<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
    public function CreateSales()
    {   
       $items = DB::table('item')->get();
        $item= json_encode($items);
        // dd($item);
        $pagetitle = "POS Terminal";
         return view ('test',compact('item','pagetitle')); 
    }
    function serviceinvoice()
    {
        return  view('invoice.ServiceSaleinvoice');
    }

}