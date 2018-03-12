<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
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
        // print_r(Equipment::all());
        // return Equipment::all();
        $equipment = Equipment::orderBy('name', 'asc')->paginate(10);

        return view('equipment.index')->with('equipment', $equipment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * https://laravel.com/docs/5.6/requests
     */
    public function store(Request $request)
    {
        /**
         * Validate form fields
         */
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        /**
         * If success, create equipment
         * @todo drop equipments table or
         *       rollback due to error in
         *       saving null data
         * @link https://stackoverflow.com/questions/31229193/how-to-drop-table-in-laravel
         */

        /**
         * Check if the equipment name already exists
         * @link https://laravel.com/docs/5.6/eloquent#retrieving-aggregates
         */
        if (Equipment::where('name', $request->input('name'))->exists()) {
            return redirect()->back()->with('error', $request->input('name') . ' already exist.');
        }

        $equipment = new Equipment;
        $equipment->name = $request->input('name');
        $equipment->description = $request->input('description');
        $equipment->save();

        return redirect()->route('equipment.index')->with('success', $request->input('name') . ' created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::find($id);

        return view('equipment.show')->with('equipment', $equipment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::find($id);

        return view('equipment.edit')->with('equipment', $equipment);
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
        /**
         * Todo fix the bug
         * @var [type]
         */
        $id = (int)$id;

        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        if (!Equipment::where([['name', $request->input('name')], ['id', $id]])->count()) {
            return redirect()->back()->with('error', $request->input('name') . ' already exist.');
        }

        $equipment = Equipment::find($id);
        $equipment->name = $request->input('name');
        $equipment->description = $request->input('description');
        $equipment->save();

        return redirect()->route('equipment.index')->with('success', $request->input('name') . ' updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int)$id;

        $equipment = Equipment::find($id);
        $equipment->delete();

        return redirect()->route('equipment.index')->with('success', 'Equipment successfully deleted.');
    }
}
