<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        return LoanResource::collection(Loan::all());
    }

    public function store(LoanRequest $request)
    {
        return new LoanResource(Loan::create($request->validated()));
    }

    public function show(Loan $loan)
    {
        return new LoanResource($loan);
    }

    public function update(LoanRequest $request, Loan $loan)
    {
        $loan->update($request->validated());

        return new LoanResource($loan);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json();
    }
}
