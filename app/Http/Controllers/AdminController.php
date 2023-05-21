<?php

namespace App\Http\Controllers;

use App\Imports\CityImport;
use App\Models\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function home()
    {
        $statelist = City::paginate(5);
        return view('welcome', compact('statelist'));
    }

    public function citylist($stateid)
    {
        // dd($stateid);
        $citylist = City::where('state_id', $stateid)->get();
        // dd($citylist);
        return view('citylist', compact('citylist'));
    }

    public function index()
    {
        $citylist = City::paginate(10);
        return view('admin.home', compact('citylist'));
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
        Excel::import(new CityImport, $request->file('city'));

        return back()->with('massage', 'Imported Successfully');
    }

    public function citydata($id){

        $result = City::find($id);
        return response($result);
    }

    public function search($data){

        $result = City::where('city','like',"%{$data}%")
                    ->orWhere('state_name','like',"%{$data}%")
                    ->orWhere('county_name','like',"%{$data}%")->get();

        return response($result);
    }
}
