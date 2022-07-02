<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
class EmailController extends Controller
{
    public function create()
    {
        return view('email');
    }

    public function SendEmail()
    {
        $items = DB::table('item')->get();
        $supplier = DB::table('supplier')->get();
        $vhno = DB::table('invoice_master')->select(DB::raw('max(InvoiceMasterID)+1 as VHNO'))->get();
        
        $pdf = PDF::loadView('email',compact('items','supplier','vhno'));
        $pdf->setpaper('A4','portiate');
        
        $data["email"] = "badshah20111996@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $data ['filename'] = $items[0]->ItemType .'-'.$supplier[0]->SupplierName .'-'.
        $supplier[0]->SupplierID .'-'. date('Y-d-m');
 
        Mail::send('email-template', $data, function($message)use($data, $pdf) {
            $fale = $data['filename'];
            $message->to($data["email"], $data["email"])
                            ->subject($data["title"])
                            ->attachData($pdf->output(), $fale.".pdf");
                }); 
        }
    }
