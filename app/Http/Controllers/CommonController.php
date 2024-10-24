<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($id)
    {
        //
        $user = User::find($id);
        $machines = Machine::whereBelongsTo($user)->paginate(15);


        return view('machine.welcome',compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Common $common)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Common $common)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Common $common)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Common $common)
    {
        //
    }
}
