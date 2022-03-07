<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columnsHead = [
            'tipo'=>'admin',
            'nome'=>'name',
            'azienda'=>'agency_name',
            'email'=>'email',
            'tel'=>'phone',
            'ind'=>'address'
        ];

        $perPage= request('perPage') ? request('perPage') : 5;
        $search = request('search') ? request('search') : '';

        $users = User::when(request('search'), function($query) {
            $query->where(
                'name', 'LIKE', '%'.request('search').'%'
            )
            ->orWhere(
                'email', 'LIKE', '%'.request('search').'%'
            );
        })
        ->when(request('column'), function($query) use ($columnsHead) {
            $query->orderBy($columnsHead[request('column')], request('type'));
        })
        ->paginate($perPage)->withQueryString();

        return Inertia::render('Gest_Table')->with([
            'data'=> [
                'users'=> $users,
                'perPage'=> $perPage,
                'mainRoute' => 'gest_utenti',
                'addRoute' => 'user.create',
                'columnsHead'=> [
                    'Tipo Utente'=>'tipo',
                    'Nome Utente'=>'nome',
                    'Azienda'=>'azienda',
                    'Email'=>'email',
                    'Telefono'=>'tel',
                    'Indirizzo'=>'ind'
                ]
            ],
            'table_type'=> 'users',
            'title' => 'Utenti',
            'search'=> $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Add_Update_User');
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
        return Inertia::render('Add_Update_User')->with('userUpdate', User::where('id', $id)->first());
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
    public function destroy($id, $perPage)
    {
        User::find($id)->delete();
        echo ("Utente cancellato con successo.");
        return redirect()->route('gest_utenti', [
            'perPage'=> $perPage 
        ]);
    }

}
