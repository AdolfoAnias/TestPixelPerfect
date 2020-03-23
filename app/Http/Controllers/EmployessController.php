<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IEmployRepository;
use App\Contracts\ICompaniesRepository;

class EmployessController extends Controller
{
    private $employessRepo;
    private $companiesRepo;
    
    public function __construct(IEmployRepository $employessRepo,ICompaniesRepository $companiesRepo) {
        $this->middleware('auth');
        $this->employessRepo = $employessRepo;
        $this->companiesRepo = $companiesRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employess = $this->employessRepo->paginate(config('app.paginateListSize'));
        return view('employess.index', compact('employess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->companiesRepo->all();
        return view('employess.new', compact('companies'));
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
           'firstName' => 'required|max:255',
           'lastName' => 'required|max:255',
           'company_id' => 'required',
        ]);

        if ($request->firstName != null){
            $data['first_name'] = $request->firstName;
        }
        if ($request->lastName != null){
            $data['last_name'] = $request->lastName;
        }
        if ($request->email != null){
            $data['email'] = $request->email;
        }
        if ($request->phone != null){
            $data['phone'] = $request->phone;
        }

//        if ($request->file('imagen') != null){
//            $data['image'] = $this->generalRepo->processImage($request->file('imagen'),'N');
//        }
        if ($request->company_id != null){
            $data['company_id'] = $request->company_id;
        }
        
        $this->employessRepo->create($data);

        return redirect('employess')->with('success', 'New employ add sucessfull!');
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
        $companies = $this->companiesRepo->all();
        $employ = $this->employessRepo->findBy('id',$id);
        return view('employess.edit', compact('employ','companies'));      
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
        if ($request->firstName != null){
            $data['first_name'] = $request->firstName;
        }
        if ($request->lastName != null){
            $data['last_name'] = $request->lastName;
        }
        if ($request->email != null){
            $data['email'] = $request->email;
        }
        if ($request->phone != null){
            $data['phone'] = $request->phone;
        }
        if ($request->company_id != null){
            $data['company_id'] = $request->company_id;
        }

//        if ($request->file('imagen') != null){
//            $data['image'] = $this->generalRepo->processImage($request->file('imagen'),'U');
//        }

        $this->employessRepo->update('id',$id,$data);

        return redirect('employess')->with('success', 'Employ update sucessfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->employessRepo->delete($id);
       return redirect('employess')->with('success', 'Employ erase sucessfull!');
    }
}
