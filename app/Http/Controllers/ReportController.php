<?php

namespace App\Http\Controllers;
use App\order;
use App\User;
use App\coupon;
use Illuminate\Http\Request;
use PDF;
class ReportController extends Controller
{

    public function index()
    {
        return view('pages.ReportManagement.index');
    }


     public function reportgenrate(Request $request){
      $fromdate = $request->fromdate;
      $todate = $request->todate;
       if($request->report_type =="order_report"){
         $data_order = order::whereBetween('created_at',[$fromdate, $todate])
                       ->with('product')->get();
                       // foreach ($data_order as $value) {
                       //      dd();
                       //    foreach ($value->product as  $v) {
                       //       dd($v);
                       //    }
                       // }
                       // dd($data_order);
       }else if($request->report_type =="customer_report"){
         $data_customer = User::whereBetween('created_at',[$fromdate, $todate])
                          ->where('role','=','Customer')
                          ->get();
                          // dd($data_customer);
       }else if($request->report_type =="coupons_report"){
         $data_coupons = coupon::whereBetween('updated_at',[$fromdate, $todate])->get();
         // dd($data_coupons); 
       }
       return view('pages.ReportManagement.show',compact('data_order','data_customer','data_coupons'));
      }

      // public function pdfview($name){ 
      //     // dd()
      //       $pdf = PDF::loadView('invoice');
      //       return $pdf->download('pdfview.pdf');
        
      // }

   public function showreport($data)
   {
       return view('pages.ReportManagement.show',compact('data'));
   }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
