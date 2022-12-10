<?php

namespace App\Http\Controllers\Backend;

use App\Models\Duration;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.duration.index');
    }
    public function ssd()
    {
        $query = Duration::query();
        return DataTables::of($query)
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-2" href="'.route('admin.duration.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn delete-icon my-2 ml-2" href="#" data-id="'.$each->id.'">Delete</a>';
            
            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->make(true);
    }

    public function create()
    {
        return view('backend.duration.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'delivery_time'=>['required']
        ], [
            'delivery_time.required'=>'Please filled your delivery time'
        ]);
        $duration = new Duration();
        $duration->delivery_time = $request->delivery_time;
        $duration->save();
        return redirect()->route('admin.duration.index')->with(['success'=>'Successfully created']);
    }


    public function edit(Duration $duration)
    {
        return view('backend.duration.edit', compact('duration'));
    }

  
    public function update(Request $request, Duration $duration)
    {
        $request->validate([
            'delivery_time'=>['required']
        ], [
            'delivery_time.required'=>'Please filled your delivery time'
        ]);
        $duration->delivery_time = $request->delivery_time;
        $duration->update();
        return redirect()->route('admin.duration.index')->with(['update'=>'Successfully updated']);
    }

  
    public function destroy(Duration $duration)
    {
        $duration->delete();
        return 'success';
    }
}
