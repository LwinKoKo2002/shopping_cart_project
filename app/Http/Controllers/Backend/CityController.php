<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Duration;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.city.index');
    }

    public function ssd()
    {
        $query = City::with('duration');
        return DataTables::of($query)
        ->addColumn('delivery_time', function ($each) {
            if ($each->duration) {
                $deliveryTime = $each->duration->delivery_time;
                return $deliveryTime;
            }
        })
        ->filterColumn('delivery_time', function ($query, $keyword) {
            $query->whereHas('duration', function ($query) use ($keyword) {
                $query->where('delivery_time', 'like', '%'.$keyword.'%');
            });
        })
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-2" href="'.route('admin.city.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';


            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $durations = Duration::all();
        return view('backend.city.create', [
            'durations'=>$durations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>['required','min:3'],
                'delivery_time'=>['required']
            ],
            [
                'name.required'=>'Please enter the city name',
                'delivery_time'=>'please filled your delivery time.'
            ]
        );
        $city = new City();
        $city->name = $request->name;
        $city->duration_id = $request->delivery_time;
        $city->save();
        return redirect()->route('admin.city.index')->with(['success'=>'Successfully created']);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $durations = Duration::all();
        return view('backend.city.edit', compact('city', 'durations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate(
            [
                'name'=>['required','min:3'],
                'delivery_time'=>['required']
            ],
            [
                'name.required'=>'Please enter the city name',
                'delivery_time'=>'please filled your delivery time.'
            ]
        );
        $city->name = $request->name;
        $city->duration_id =$request->delivery_time;
        $city->update();
        return redirect()->route('admin.city.index')->with(['update'=>'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return 'success';
    }
}
