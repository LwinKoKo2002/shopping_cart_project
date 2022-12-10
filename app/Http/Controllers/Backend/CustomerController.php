<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Models\City;
use Illuminate\Contracts\Auth\UserProvider;

class CustomerController extends Controller
{
    public function index()
    {
        return view('backend.customer.index');
    }

    public function ssd()
    {
        $query = User::with('city');
        return DataTables::of($query)
        ->addColumn('plus-icon', function ($each) {
            return null;
        })
        ->editColumn('city_id', function ($each) {
            if ($each->city) {
                $city_name = $each->city->name;
                return $city_name;
            }
            return '-';
        })
        ->editColumn('user_agent', function ($each) {
            if ($each->user_agent) {
                $agent = new Agent();
                $agent->setUserAgent($each->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();

                return "
                        <table class='mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2 mt-2'>
                            <tr class='text-left'>
                                <td>Device</td>
                                <td>".$device ."</td>
                            </tr>
                            <tr class='text-left'>
                                <td>PlatForm</td>
                                <td>".$platform."</td>
                            </tr>
                            <tr class='text-left'>
                                <td>Browser</td>
                                <td>".$browser."</td>
                            </tr>
                        </table>
                    ";
            }
            return "-";
        })
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-0 ml-0" href="'.route('admin.customer.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';

            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->rawColumns(['user_agent','action'])
        ->make(true);
    }
  

    public function create()
    {
        $cities = City::all();
        return view('backend.customer.create', compact('cities'));
    }

   
    public function store(StoreCustomer $request)
    {
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = $request->password;
        $customer->city_id = $request->city_id;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('admin.customer.index')->with(['success'=>'Successfully created']);
    }


    public function edit(User $customer)
    {
        $cities = City::all();
        return view('backend.customer.edit', compact('customer', 'cities'));
    }

 
    public function update(UpdateCustomer $request, User $customer)
    {
        $customer->name = request()->name;
        $customer->email = request()->email;
        $customer->phone = request()->phone;
        $customer->password = request()->password;
        $customer->city_id = request()->city_id;
        $customer->address = request()->address;
        $customer->update();
        return redirect()->route('admin.customer.index')->with(['update'=>'Successfully updated']);
    }

  
    public function destroy(User $customer)
    {
        $customer->delete();
        return "success";
    }
}
