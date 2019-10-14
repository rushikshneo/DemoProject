<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\configure;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    
    public function index()
    {
         $keys = configure::get();
         return view('pages.ConfigManagement.index',compact('keys'));
    }

   
    public function create()
    {
        return view('pages.ConfigManagement.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
                'define_key'    => 'required',
                'define_values' => 'required',
            ]      
        );

         $input = $request->all();
         $user = configure::create($input);
       
        return redirect()->route('config.index')
                         ->with('success',
                            'Configuration key added successfully .');
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $keys = configure::find($id);
        return view('pages.ConfigManagement.edit',compact('keys'));
    }

   
    public function update(Request $request, $id)
    {
         $this->validate($request,[
                'define_key'   => 'required',
                'define_values' => 'required',
            ]      
        );
         $configure = configure::find($id);
         $input     = $request->all();
         $configure->update($input);       
        return redirect()->route('config.index')
                         ->with('success','Configure key & Value updated successfully');
    }

  
    public function destroy($id)
    {
        // dd("here");
        configure::find($id)->delete();
        return redirect()->route('config.index')
                        ->with('success','Configure key deleted successfully');
    }
}
