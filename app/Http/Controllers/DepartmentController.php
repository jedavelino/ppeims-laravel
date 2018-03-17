<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Department;
use App\Employee;

class DepartmentController extends Controller
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
        $department = Department::orderBy('name', 'asc')->paginate(10);

        return view('department.index')->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'name' => 'required|unique:departments',
            'description' => 'nullable'
        ]);

        Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('department.index')->with('success', $request->input('name') . ' created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        // $employees = Employee::where('employee_id', 1)->get();

        return view('department.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return view('department.edit')->with('department', $department);
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
            'name' => ['required', Rule::unique('departments')->ignore($id)],
            'description' => 'nullable'
        ]);

        Department::find($id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('department.index')->with('success', $request->input('name') . ' updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();

        return redirect()->route('department.index')->with('success', 'Equipment successfully deleted.');
    }
}
