<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Taq;
use Session;

class TaqController extends Controller
{
    public function __construct(){

       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taqs=Taq::all();
        return view('taq.index')->withTaqs($taqs);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|max:255'
            ));
        $taqs = new Taq;
        $taqs->name=$request->name;
        $taqs->save();

        Session::flash('success','New taq was craeted successfuly ');
        return redirect()->route('taqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags=Taq::find($id);
        return view('taq.show')->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags=Taq::find($id);
        return view('taq.edit')->withTags($tags);
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
        $tags=Taq::find($id);
        $this->validate($request,[
        'name'=>'required|max:255'
            ]);

        $tags->name=$request->name;
        $tags->save();

        Session::flash('success','The Tage was changed');
        return redirect()->route('taqs.show',$tags->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tags=Taq::find($id);
       $tags->post()->detach();
       $tags->delete();

       Session::flash('success','Delete was successfuly');

       return redirect()->route('taqs.index');
    }
}
