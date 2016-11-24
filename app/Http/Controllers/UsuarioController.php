<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsuarioController extends Controller
{
    //

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUsers(Request $request)
    {
        //
        $request = request();
        // handle sort option
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = User::orderBy($sortCol, $sortDir);
        } else {
            $query = User::orderBy('id', 'asc');
        }
        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('name', 'like', $value)
                    ->orWhere('username', 'like', $value)
                    ->orWhere('tipo', 'like', $value);
            });
        }
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        // The headers 'Access-Control-Allow-Origin' and 'Access-Control-Allow-Methods'
        // are to allow you to call this from any domain (see CORS for more info).
        // This is for local testing only. You should not do this in production server,
        // unless you know what it means.
        return response()->json(
                $query->paginate($perPage)
            );
        //    ->header('Access-Control-Allow-Origin', '*')
        //    ->header('Access-Control-Allow-Methods', 'GET');            
    }

    public function index(Request $request)
    {
        //Retorna la vista correspondiente
        return view('users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('users.create-modal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        //
        $user = $request->all();

        User::create([
            'username' => $user['username'],
            'name' => $user['name'],
            'tipo' => $user['tipo'],
            'password' => bcrypt($user['password'])
        ]);

        return redirect('/admin')->with('message','store');
        
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
        //
        $user = User::find($id);

        return response()->json($user);
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
        //
        $user = User::find($id);
        $user = fill($request->all());
        $user->save();

        return response()->json([ "mensaje"=> "listo"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar Usuario
        User::find($id)->delete();
        return response()->json(['done']);
}


}
