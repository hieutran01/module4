<?php

namespace App\Http\Controllers;
use App\Models\Spending;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $totalAmount = Spending::sum('sotien');
        $query = Spending::orderBy('id', 'DESC');
        
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('danhmuc', 'LIKE', "%$search%")
                    ->orWhere('ngay', 'LIKE', "%$search%")
                    ->orWhere('sotien', 'LIKE', "%$search%");
            });
        }
        
        $spendings = $query->paginate(2)->appends(['search' => $search]);
        
        return view('spendings.index', compact('spendings', 'search' ,'totalAmount'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spendings = spending::all();
        return view('spendings.create', compact('spendings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpendingRequest $request)
    {
        $spendings = new Spending();
        $spendings->danhmuc = $request->danhmuc;
        $spendings->ngay = $request->ngay;
        $spendings->sotien = $request->sotien;
     
        $spendings->save();
        return redirect()->route('spending.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $spendings = Spending::find($id);
        return view('spendings.edit', compact('spendings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpendingRequest $request, string $id)
    {
        $spendings = Spending::find($id);
        $spendings->danhmuc = $request->danhmuc;
        $spendings->ngay = $request->ngay;
        $spendings->sotien = $request->sotien;
        $spendings->save();
        return redirect()->route('spending.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spendings = Spending::findOrFail($id);
        $spendings->delete();
        return redirect()->route('spending.index');
    }
}
