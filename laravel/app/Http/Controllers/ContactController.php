<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'index of contacts here!';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create of contacts here!';
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'store of contacts here!';
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show of contacts here!';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'edit of contacts here!';
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update of contacts here!';
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy of contacts here!';
        //
    }
}
