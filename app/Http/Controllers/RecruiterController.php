<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecruiterRequest;
use App\Http\Requests\UpdateRecruiterRequest;
use App\Models\Recruiter;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.recruiters.index',[
            "recruiters" => Recruiter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recruiters.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecruiterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruiter $recruiter)
    {
        return view('admin.recruiters.edit');  
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecruiterRequest $request, Recruiter $recruiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiter $recruiter)
    {
        //
    }
}
