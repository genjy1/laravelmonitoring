<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $goods = Goods::paginate(15);

        return view('goods.list', compact('goods'));

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
        $data = $request->validate(['name'=>'required','code'=>'required']);
        $good = new Goods();

        $good->name = $request->name;
        $good->code = $request->code;
        $good->remains = 1;

        $good->save();

        return back()->with('success','Товар доставлен успешно');
    }

    public function showState()
    {
        $goods = Goods::with('machine')->paginate(10);

//        dd($goods);
        return view('goods.state',compact('goods'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Goods $goods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goods $goods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goods $goods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $goods = Goods::find($id);

        $goods->delete();

        return redirect()->route('goods.list',Auth::user()->id);
    }
}
