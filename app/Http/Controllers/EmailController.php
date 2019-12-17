<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\email;
class EmailController extends Controller
{
  
    public function index()
    {
       $email_templets = email::get();
       return view('pages.EmailManagement.index',compact('email_templets'));
    }

    public function create()
    {
       
        return view('pages.EmailManagement.create');   
    }
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

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
         $email = email::where('id','=',$id)->get();
        return view('pages.EmailManagement.edit',compact('email'));
    }

  
    public function update(Request $request, $id)
    {
        // dd($request->all());
        email::where('id','=',$id)->update(['email_name'=>$request->email,'email_header'=>$request->emailheader,'email_main_content'=>$request->emailmaincontent,'email_footer'=>$request->emailfooter]);
        return redirect()->route('email.index')->with('success','Email templet Updated Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
