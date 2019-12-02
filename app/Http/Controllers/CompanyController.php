<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

use App\Company;
use App\Employee;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $companies = Company::paginate(10);
        $companies = Company::all();

        return view('company.index')->with(['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        
        //Save Logo
        if($request->file('image') !== null){
            $path = $request->file('image')->store('logos');
            $request->merge(['logo' => $path]);
        }

        Company::create($request->only((new Company)->getFillable()));

        Mail::to('admin@admin.com')->send(new SendEmail($request->name, $request->email, $request->website)); 

        return redirect('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $data = Company::find($company)->first();

        return view('company.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $data = Company::find($company)->first();

        return view('company.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();

        if($request->file('image') !== null){
            //Delete previous logo
            $logo = Company::where('id', $company->id)->value('logo');
            \Storage::delete($logo);

            //Save New logo
            $path = $request->file('image')->store('logos');
            $request->merge(['logo' => $path]);
        }

        Company::where('id', $company->id)->update($request->only((new Company)->getFillable()));

        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //Delete all Employees under Company
        Employee::where('company_id', $company->id)->delete();

        //Delete Company Logo
        $logo = Company::where('id', $company->id)->value('logo');
        \Storage::delete($logo);

        //Delete Company Data
        Company::destroy($company->id);

        return redirect('company');
    }
}
