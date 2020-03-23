<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ICompaniesRepository;
use App\Helpers\GeneralHelper;

class CompaniesController extends Controller
{   
    private $companiesRepo;
    private $generalHelper;

    public function __construct(ICompaniesRepository $companiesRepo, GeneralHelper $generalHelper) {
        $this->middleware('auth');
        $this->companiesRepo = $companiesRepo;
        $this->generalHelper = $generalHelper;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companiesRepo->paginate(config('app.paginateListSize'));
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|max:255',
        ]);
        
        if ($request->name != null){
            $data['name'] = $request->name;
        }
        if ($request->email != null){
            $data['email'] = $request->email;
        }
        if ($request->website != null){
            $data['website'] = $request->website;
        }
        if ($request->file('imagen') != null){
            $data['logo'] = $this->generalHelper->processImage($request->file('imagen'),'N');
        }
        
        $this->companiesRepo->create($data);

        return redirect('companies')->with('success', 'New company add sucessfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companiesRepo->findBy('id',$id);
        return view('companies.edit', compact('company'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|max:255',
        ]);

        if ($request->name != null){
            $data['name'] = $request->name;
        }
        if ($request->email != null){
            $data['email'] = $request->email;
        }
        if ($request->website != null){
            $data['website'] = $request->website;
        }
        if ($request->file('imagen') != null){
            $data['logo'] = $this->generalHelper->processImage($request->file('imagen'),'U');
        }

        $this->companiesRepo->update('id',$id,$data);

        return redirect('companies')->with('success', 'Company update sucessfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->companiesRepo->delete($id);
       return redirect('companies')->with('success', 'Company erase sucessfull!');
    }
}
