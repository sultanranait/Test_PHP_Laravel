<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',

        ]);
        return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::find($id);
        //
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
        $client=Client::find($id);
        $client->update($request->all());
        return $client;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Client::destroy($id);
        //
    }
    
   /**
     * Search using name .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($firstname)
    {
        return Client::where('firstname','like','%'.$firstname.'%')->get();
        //
    }
    public function dashboard(Request $request)
    {
        $date = Carbon::today()->subDays(30);
        $users = Client::where('created_at', '>=', $date)->get();
        return $users;
    }
}
