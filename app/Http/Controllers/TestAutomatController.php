<?php

namespace App\Http\Controllers;

use App\Models\TestAutomat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestAutomatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// В вашем контроллере
    public function index(Request $request)
    {
        // Количество элементов на странице (по умолчанию 15, можно изменить)
        $perPage = $request->input('per_page', 15);

        try {
            // Используем метод paginate вместо get
            $automat = DB::connection('second')->table('event')->paginate($perPage);
            return response()->json($automat);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Database connection error: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function showResponse()
    {
        //
        return view('response.index');
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
    public function show(TestAutomat $testAutomat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestAutomat $testAutomat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestAutomat $testAutomat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestAutomat $testAutomat)
    {
        //
    }
}
