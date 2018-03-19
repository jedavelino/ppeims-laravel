<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $employees = Employee::orderBy('name', 'asc')->paginate(10);

        foreach ($employees as $employee) {
            $employee->name = prettyName($employee->name);
            $employee->department = Department::find($employee->department_id)->name;
        }

        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $options = [];

        foreach($departments as $department) {
            $options[$department->id] = $department->name;
        }

        return view('employee.create')->with('options', $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * regex that allows alphabet and spaces /^[A-Za-z ]+$/
     */
    public function store(Request $request)
    {
        /**
         * Todo, do something to save the department
         */

        $this->validate($request, [
            'first_name' => 'required|regex:/^[A-Za-z ]+$/',
            'last_name' => 'required|regex:/^[A-Za-z ]+$/',
            'middle_name' => 'required|regex:/^[A-Za-z ]+$/',
            'department' => 'required'
        ]);

        $joined_name = $request->input('last_name') . ';' . $request->input('first_name') . ';' . $request->input('middle_name');
        
        $employee = new Employee;
        $employee->name = $joined_name;
        $employee->department_id = $request->input('department');
        $employee->save();

        return redirect()->route('employee.index')->with('success', _prettyName($joined_name) . ' created.');
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
        return view('employee.edit')->with('employee', Employee::find($id));
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
            'first_name' => 'required|regex:/^[A-Za-z ]+$/',
            'last_name' => 'required|regex:/^[A-Za-z ]+$/',
            'middle_name' => 'required|regex:/^[A-Za-z ]+$/',
        ]);

        $joined_name = $request->input('last_name') . ';' . $request->input('first_name') . ';' . $request->input('middle_name');
        
        $employee = Employee::find($id);
        $employee->name = $joined_name;
        $employee->save();

        return redirect()->route('employee.index')->with('success', _prettyName($joined_name) . ' updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect()->route('employee.index')->with('success', 'Employee successfully deleted.');
    }
}
