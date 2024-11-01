<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $sortField = $request->get('sort', 'id'); // Поле для сортировки, по умолчанию 'id'
        $sortDirection = $request->get('direction', 'asc'); // Направление сортировки, по умолчанию 'asc'

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        // Получаем данные с сортировкой и пагинацией
        $sales = Sales::orderBy($sortField, $sortDirection)->paginate(15);

        return view('sales.list', compact('sales', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPDF()
    {
        //
        $sales = Sales::all();

        $pdf = Pdf::loadView('sales.report', compact('sales'));

        return $pdf->download('sales.pdf');
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
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
