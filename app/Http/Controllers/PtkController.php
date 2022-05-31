<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfilUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PtkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getData()
    {
    // $query = User::select(['fullname'])->where('is_active', '1')->role('ptk')->get();
    $query = DB::table('users')->select(['fullname'])->where('is_active', '1')->get();
    // return $query;
        $data = datatables()->of($query)
            // ->addColumn('link', '<a href="#">Html Column</a>')
            // ->addColumn('action', 'guru.action-datatables')
            // ->addColumn('avatar', 'guru.avatar-datatables')
            // ->rawColumns(['link', 'action', 'avatar'])
            ->addIndexColumn()
            ->toJson();
            // return $data;
        return view('pages.home');
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
        //
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
