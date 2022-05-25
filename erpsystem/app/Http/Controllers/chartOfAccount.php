<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class chartOfAccount extends Controller{

    public function index(){
        $ChartOfAccountID_L1 = DB::table('chartofaccount')->select('*')
            ->where(DB::raw('right(ChartOfAccountID,5)') , '=', 00000) ->get();
        $ChartOfAccountID_L2 = DB::table('chartofaccount')->select('*')
            ->where(DB::raw('right(ChartOfAccountID,2)') , '=', 00)
            ->where(DB::raw('right(ChartOfAccountID,5)') , '!=', 00000)
            ->where(DB::raw('right(ChartOfAccountID,4)') , '!=', 0000)
            ->get();

        $allData = DB::table('chartofaccount')->select('*')->get();

        return view('chartofaccount',compact(['ChartOfAccountID_L1','ChartOfAccountID_L2','allData']));
    }
    public function StoreChartOfAccountID_L1(Request $request){
        $validate_data = $this->validate($request, [
        	'ChartOfAccountID' => 'required',
        	'ChartOfAccountName' => 'required', ]);


        $CODEA = substr($request->ChartOfAccountID, 0, 1) . '00000';
        $CODE = substr($request->ChartOfAccountID, 0, 1);
        if ($CODE == 1)
        {
            $CODE = "A";
        }
        if ($CODE == 2)
        {
            $CODE = 'L';
        }
        if ($CODE == 3)
        {
            $CODE = 'C';
        }
        if ($CODE == 4)
        {
            $CODE = 'R';
        }
        if ($CODE == 5)
        {
            $CODE = 'E';
        }
        if ($CODE == 6)
        {
            $CODE = 'S';
        }

        $getID = DB::table('chartofaccount')
        ->select(DB::raw('max(ChartOfAccountID)+10000 as ChartOfAccountID'))
        ->where(DB::raw('left(ChartOfAccountID,1)') , '=', substr($request->ChartOfAccountID, 0, 1))
        ->where(DB::raw('right(ChartOfAccountID,4)') , '=', 0000)->get();


        $data = array(
            'ChartOfAccountID' => $getID[0]->ChartOfAccountID,
            'CODE' => $CODE,
            'ChartOfAccountName' => $request->ChartOfAccountName,
            'L1' => $request->ChartOfAccountID,
            'L2' => $getID[0]->ChartOfAccountID,
            'L3' => $getID[0]->ChartOfAccountID,
        );
        // dd($data);
        $success = DB::table('chartofaccount')->insert($data);
        return redirect('chartofaccount')->with('success', 'Data has been submitted Successfully!');
    }
    public function StoreChartOfAccountID_L2(Request $request){
        $validate_data = $this->validate($request, [
        	'ChartOfAccountID' => 'required',
	        'ChartOfAccountName' => 'required', ]);


	 $CODEA = substr($request->ChartOfAccountID, 0, 1) . '00000';
	 $CODEB = substr($request->ChartOfAccountID, 0, 2) . '0000';
	        $CODE = substr($request->ChartOfAccountID, 0, 1);
	        if ($CODE == 1)
	        {
	            $CODE = "A";
	        }
	        if ($CODE == 2)
	        {
	            $CODE = 'L';
	        }
	        if ($CODE == 3)
	        {
	            $CODE = 'C';
	        }
	        if ($CODE == 4)
	        {
	            $CODE = 'R';
	        }
	        if ($CODE == 5)
	        {
	            $CODE = 'E';
	        }
	        if ($CODE == 6)
	        {
	            $CODE = 'S';
	        }

	        // dd(substr($request->ChartOfAccountID, 0, 4));
	        $getID = DB::table('chartofaccount')
			->select(DB::raw('max(ChartOfAccountID)+5 as ChartOfAccountID'))
			->where(DB::raw('left(ChartOfAccountID, 4)') , '=',substr($request->ChartOfAccountID, 0, 4))->get();

	        $data = array(
	            'ChartOfAccountID' => $getID[0]->ChartOfAccountID,
	            'CODE' => $CODE,
	            'ChartOfAccountName' => $request->ChartOfAccountName,
	            
	            'L1' => $CODEA,
	            'L2' => $CODEB,
	            'L3' => $request->ChartOfAccountID,
	        );
	        $success = DB::table('chartofaccount')->insert($data);
        return redirect('chartofaccount')->with('success', 'Data has been submitted Successfully!');
    }
   	public function EditChartOfAccountID_L1($ChartOfAccountID){
        $ChartOfAccountID_data = DB::table('chartofaccount')->where('ChartOfAccountID',$ChartOfAccountID)->get();
        
       return view('chartofaccount_edit')->with('ChartOfAccountID_data',$ChartOfAccountID_data);
    }
    public function UpdateChartOfAccountID_L1(Request $request, $ChartOfAccountID){
        $validate_data = $this->validate($request, [
        	'ChartOfAccountName' => 'required', 
        	]);

        $data = DB::table('chartofaccount')->where('ChartOfAccountID', '=', $ChartOfAccountID)->update($validate_data);
        return redirect('chartofaccount')->with('success', 'Data is successfully updated');
    }
    public function DeleteChartOfAccountID($ChartOfAccountID){

        $delete = DB::table('chartofaccount')->where('ChartOfAccountID', '=',$ChartOfAccountID);
        $delete->delete();
        return redirect('chartofaccount')->with('success', 'Data deleted successfully');
    }



    // Testing Ajax data storing in database using Datalist

    public function test()
    {
    	return view('test');
    	# code...
    }
   
}

