<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
// use App\Http\Requests\StoreCompanyRequest;
// use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);
        
        return view('companies.index',compact('companies'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    // public function archive()
    // {
    //     $companies = Company::latest()->paginate(5);
        
    //     return view('companies.index',compact('companies'))
    //                 ->with('i', (request()->input('page', 1) - 1) * 5);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $request->validated(
            // [
            // 'name'=>'required|min:10|max:255',
            // 'description'=>'required',  
            // ]
    );

        Company::create($request->all());
         
        return redirect()->route('companies.index')
                        ->with('success','companie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
            return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $request->validated(
            // [
            // 'name'=>'required|min:10|max:255',
            // 'description'=>'required', 
            // ]
    );
        $company->update($request->validated());
        
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
         
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}
