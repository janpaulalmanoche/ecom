<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResellerController extends Controller
{
    public function __construct()
    {
        $this->model = new Reseller();
    }
    public function index()
    {
        $type = Type::where('type','reseller')->first();

        $resellers = User::where('type_id',$type->id)->get();
        // dd($resellers);
  
        return view('admin.reseller.index',compact('resellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.reseller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|min:2',
            'middle_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|min:5',
            'password' => 'required|min:3',
        ]);

        $type = Type::where('type','reseller')->first();
        $new_user = new User;
        $new_user->email = $request->email;
        $new_user->password = Hash::make($request->password);
        $new_user->f_name = $request->first_name;
        $new_user->m_name = $request->middle_name;
        $new_user->type_id = $type->id;
        $new_user->l_name = $request->last_name;
        $new_user->save();

    

        return redirect(route('reseller.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function show(Reseller $reseller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $reseller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $reseller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        //
    }
}
