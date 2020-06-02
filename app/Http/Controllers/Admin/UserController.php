<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        return view('admin/users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/users_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'phone' => $input['phone'],
        ]);

        $user->save(); 

        return redirect()->route('users.index')->with('success','User Added');
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
        $user = User::find($id);

        return view('admin/users_edit', compact('user'));    
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
        $validation = Validator::make ($request->all(), [
            'name'=> 'required|alpha',
            'email'=> 'required|email',
            'phone'=> 'required|min:10|max:13',
            'is_admin'=> 'required',
        ]);

        if($validation->fails()){
            return redirect()->route('users.index')->with('error','Validation Error');     
        }

        $user = User::find($id);
        $user->name = $request->get('name');

        if (!($request->get('email') == $user->email))
        {
            $validation = Validator::make ($request->all(), [
                'email'=> 'unique.users',
            ]);

            if($validation->fails()){
                return redirect()->route('users.index')->with('error','Email has already been used');     
            }

            $user->email = $request->get('email');
        }

        $user->phone = $request->get('phone');

        if ($request->get('is_admin') == "Admin")
        {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }

        $user->save(); 

        return redirect()->route('users.index')->with('success','User Added');
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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data Deleted');
    }
}
