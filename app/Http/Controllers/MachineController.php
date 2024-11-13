<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
        $machine = Machine::find($id);

        return response()->json($machine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        //
    }

    public function showState()
    {
        // Получаем параметры сортировки из запроса
//        $sortField = $request->get('sort', 'id'); // По умолчанию сортировка по 'id'
//        $sortDirection = $request->get('direction', 'asc'); // По умолчанию по возрастанию

        // Валидация направления сортировки
//        if (!in_array($sortDirection, ['asc', 'desc'])) {
//            $sortDirection = 'asc';
//        }

//        $user = User::find($id);
        $machines = Machine::paginate(10);


        return response()->json($machines);
//        return view('machine.state',compact('machines','sortDirection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $machine = Machine::find($id);

        $request->validate(['number'=>'required|int','address'=>'required|string','name'=>'required|string','balance'=>'nullable|numeric']);
        $machine->number = $request->number;
        $machine->address = $request->address;
        $machine->name = $request->name;
        $machine->balance = $request->balance;

        $machine->update();

        return redirect()->route('machine.show',$id)->with('success','Информация об автомате успешно обновилась');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        //
    }

    public function attachPost(Request $request, $user_id)
    {
        $controllerId = $request->only('controller_id');
        $machine = Machine::where('controller_id',$controllerId)->first();

        $machine->user_id = $user_id;

        $machine->update();

        return redirect()->route('common.home',Auth::user()->id)->with('success','Автомат успешно привязан');
    }

    public function attach()
    {
        return view('machine.attach');
    }
}
