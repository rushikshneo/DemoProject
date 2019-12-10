<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contactus;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\email;
class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contact = contactus::latest()->paginate(5);
       // dd($contact);
       return view('pages.ContactusManagement.index',compact('contact'));
    }

    public function create()
    {
       
    }
    public function store(Request $request)
    {
        
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
      $contact = contactus::where('id','=',$id)->get();
      return view('pages.ContactusManagement.edit',compact('contact'));
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
    contactus::where('id','=',$id)->update(['admin_note'=> $request->reply_message]);
        $contact = contactus::where('id','=',$id)->select('id','email','admin_note','name')->get();
         $email  = email::where('email_name','=','Contact_us_customer')->get();
         foreach ( $contact as  $conta) {
         foreach ($email as $value) {
            $email_content=[
                              'email_header'=> $value->email_header,
                              'email_footer'=> $value->email_footer,
                              'email'       => $conta->email,
                              'admin_note'  => $conta->admin_note,
                              'name'        => $conta->name,
                            ];
          // dd( $email_content);
        Mail::send('pages.frontend.email.contact_us_customer', $email_content ,function ($m) use ($contact) {
            $m->from('hello@app.com', 'Shopping Chart');
             foreach ( $contact as  $conta) {
            $m->to($conta->email)->subject('Reply From admin'); 
           }
        });
      return redirect()->route('contactus.index')->with('success','Reply of Customer  Query will be send Successfully.');
       }     
      }
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
