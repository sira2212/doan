<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipments;
use App\Models\Rooms;

class EquipmentController extends Controller
{
    
    public function index()
    {
        $equipments = Equipments::with('room')->paginate(10);
        return view('Equipment.index', compact('equipments'));
    }
    
    
    public function create()
    {
        return view('Equipment.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'equipment_name' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        equipments::create($request->all());

        return redirect()->route('admin-equipment')
            ->with('success', 'equipments created successfully.');
    }

    
    public function show(equipments $equipments)
    {
        return view('Equipment.show', compact('equipments'));
    }

    
    public function edit($id)
    {
        $equipments = equipments::findOrFail($id);
        $rooms = Rooms::all();
    
        return view('Equipment.edit', compact('equipments', 'rooms'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'equipment_name' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $equipments = equipments::findOrFail($id);
        $equipments->update($request->all());
    
        return redirect()->route('admin-equipment')
            ->with('success', 'Thiết bị được cập nhật thành công');
    }
    
    
    public function destroy($id)
    {
        $equipments = equipments::findOrFail($id);
        $equipments->delete();
    
        return redirect()->route('admin-equipment')
            ->with('success', 'equipments deleted successfully');
    }
}
