<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\TypeRoom;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::orderBy('id')->paginate(10);
        return view('Classroom.room', [
            'rooms'=>$rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typerooms= TypeRoom::all();
        // dd($typerooms);
        return view('Classroom.create', [
            'type'=>$typerooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room=Rooms::find($id);
        $room->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
