<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminUser;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('backend.admin_user.index');
    }


    public function ssd()
    {
        $query = AdminUser::query();
        return DataTables::of($query)
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
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-0 ml-0" href="'.route('admin.admin-user.edit', $each->id).'">Edit</a>';
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
        return view('backend.admin_user.create');
    }

 
    public function store(StoreAdminUser $request)
    {
        $admin_user = new AdminUser();
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = $request->password;
        $admin_user->save();
        return redirect()->route('admin.admin-user.index')->with(['success'=>'Successfully created']);
    }


    public function edit(AdminUser $admin_user)
    {
        return view('backend.admin_user.edit', compact('admin_user'));
    }

  
    public function update(UpdateAdminUser $request, AdminUser $admin_user)
    {
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = $request->password;
        $admin_user->update();
        return redirect()->route('admin.admin-user.index')->with(['update'=>'Successfully updated']);
    }

  
    public function destroy(AdminUser $admin_user)
    {
        $admin_user->delete();
        return 'success';
    }
}
