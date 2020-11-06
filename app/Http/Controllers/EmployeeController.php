<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $d['emp']=Employee::orderBy("id","desc")->simplePaginate(3);
       $d['title']="Employee";
       return view("employee",$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sts= $request->validate([
         "name"=>"required",
         "email"=>"required|email|unique:employees",
         "phone"=>"required|max:10",
         "address"=>"required",
         "dob"=>"required",
         "about"=>"required",
         'file' => 'required|mimes:jpg,gif,jpeg,png'
        ]);
        
        

        $emp=new Employee;
        $emp->name=$request->input('name');
        $emp->email=$request->input('email');
        $emp->phone=$request->input('phone');
        $emp->address=$request->input('address');
        $emp->photo=$request->file("file")->store("employee");
        $emp->dob=$request->input('dob');
        $emp->about=$request->input('about');
        $emp->save();
        
        $data='<tr id="'.$emp->id.'">
                <td><img src="storage/app/'.$emp->photo.'" style="height:100px;width:100px;"></td>
                <td>'.$emp->name.'</td>
                <td>'.$emp->phone.'</td>
                <td>'.$emp->dob.'</td>
                <td>'.$emp->address.'</td>
                <td>'.$emp->email.'</td>
                <td>'.$emp->about.'</td>
                <td><button class="btn btn-success btn-xs edit"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs del"><i class="fa fa-trash"></i></button></td>
             </tr>';
        return $data;
   
    }

    //kc1fiqsjum

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
       $data=Employee::find($id);

        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $emp=Employee::find($request->id);
        $emp->name=$request->input('name');
        $emp->email=$request->input('email');
        $emp->phone=$request->input('phone');
        $emp->address=$request->input('address');
        $emp->dob=$request->input('dob');
        $emp->about=$request->input('about');
        $emp->save();
        return $emp;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $emp=Employee::find($id);
      $emp->delete();

      return "Data Deleted";

    }
}
