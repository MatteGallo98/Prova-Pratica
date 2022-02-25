<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage= request('perPage') ? request('perPage') : 2;

        $users = User::when(request('search'), function($query) {
            $query->where(
                'name', 'LIKE', '%'.request('search').'%'
            )
            ->orWhere(
                'email', 'LIKE', '%'.request('search').'%'
            );
        })
        ->when(request('column'), function($query) {
            $query->orderBy(request('column'), request('type'));
        })
        ->paginate($perPage)->withQueryString();

        $query = User::query();

        if(request('search')) {
            $query = $query->where();
        }

        $query = $query->paginate();

        return view('gest_utenti')->with([
            'users'=> $users,
            'perPage'=>$perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'agency_name' => 'nullable',
            "address" => 'required',
            "phone" => 'nullable|digits_between:7,9',
            "email" => 'required|email|unique:users,email',
            "password" => 'required',
            "admin" => 'boolean'
        ]);
        
        User::create([
            'name'=>$request->name,
            'agency_name'=>$request->agency_name,
            "address" => $request->address,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "admin" => ($request->admin === "1" ? 1 : 0)
        ]);

        return redirect()->route('gest_utenti');
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
        return view('user')->with('user', User::where('id', $id)->first());
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
        $validated = $request->validate([
            'name' => 'required|string',
            'agency_name' => 'nullable|string',
            "address" => 'required|string',
            "phone" => 'nullable|digits_between:7,9',
            "email" =>  [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            "password" => 'nullable',
            "admin" => 'boolean'
        ]);

         $user_inf = [
            'name'=>$request->name,
            'agency_name'=>$request->agency_name,
            "address" => $request->address,
            "phone" => $request->phone,
            "email" => $request->email,
            "admin" => ($request->admin === "1" ? 1 : 0)
        ];

        if(isset($request->password)){
            $array['password']= Hash::make($request->password);
        }

        User::where('id', $id)->update($user_inf);

        return redirect()->route('gest_utenti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        User::find($id)->delete();
        echo ("Utente cancellato con successo.");
        return redirect()->route('gest_utenti');
    }

}
