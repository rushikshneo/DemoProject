<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\email;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $email_templets = email::get();
       return view('pages.EmailManagement.index',compact('email_templets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('pages.EmailManagement.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $email = new email;
         $email['email_name']   =$request->email;
         $email['email_header']=$request->emailheader;
         $email['email_main_content']=$request->emailmaincontent;
         $email['email_footer']=$request->emailfooter;
         $email->save();
         return redirect()->route('email.index')->with('success','The Email templet Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $email = email::where('id','=',$id)->get();
        return view('pages.EmailManagement.edit',compact('email'));
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
        // dd($request->all());
        email::where('id','=',$id)->update(['email_name'=>$request->email,'email_header'=>$request->emailheader,'email_main_content'=>$request->emailmaincontent,'email_footer'=>$request->emailfooter]);
        return redirect()->route('email.index')->with('success','Email templet Updated Successfully.');
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
