<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('checkuser')->only('store');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $uEmail= $request->has('email')?$request->get('email'):'';
        $pass= $request->has('pass')?$request->get('pass'):'';

        $userInfo = User::where('email','=', $uEmail )->where('password','=', $pass)->first();

        if(isset($userInfo) && $userInfo!=null)
        {

            $book_controller = new BookController();
            return $book_controller->index();
        }
        else
        {
            return redirect()->back();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        User::insert([

            'name'=>$request->has('uname')? $request->get('uname'):'',
            'email'=>$request->has('email')? $request->get('email'):'',
            'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
            'password'=>$request->has('pass')? $request->get('pass'):'',

        ]);
        return redirect('/')->with('success', 'Registration Successfull');
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
        $user = User::find($id);
        return view('member.edit' , compact('user'));
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
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('member.member');
        // User::update([

        //     'name'=>$request->has('uname')? $request->get('uname'):'',
        //     'email'=>$request->has('email')? $request->get('email'):'',
        //     'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
        //     'password'=>$request->has('pass')? $request->get('pass'):'',

        //     User::update('update users set votes = 100 where name = ?', ['John']);
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('member.member');  
    }

    public function member(Request $request)
    {
        $user = User::all();
        return view('member.member' , compact('user'));
    }
}
