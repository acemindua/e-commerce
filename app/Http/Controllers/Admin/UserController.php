<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 
     * 
     */
    public function __construct() {
        $this->middleware(['permission:user-view'])->only('index', 'show');
        $this->middleware(['permission:user-edit'])->only('edit', 'update');
        $this->middleware(['permission:user-add'])->only('create', 'store');
        $this->middleware(['permission:user-delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function($q){
                $q->where('name', '!=', 'super-user');
            });

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('id', function($data){ 
                    $id = sprintf("%04d", $data->id);
                    return $id;
                })
                ->addColumn('role', function($data){ 
                    $role = $data->roles->first()->name;

                    return '<span class="text-capitalize">'. $role .'</span>';
                })
                ->editColumn('status', function($data){ 
                    if(!empty($data->remember_token)){ return 'Active';}
                    return 'Check Email';
                })
                ->editColumn('created_at', function($data){ 
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d.m.Y'); 
                    return $formatedDate; 
                })
                ->addColumn('action', function($data){
                    $html = '<div class="d-flex gap-3">';
                    $html .= '<a href="'.route('users.show', $data->id).'" class="show"><i class="fa fa-eye"></i> Show</a>';
                    $html .= '<a href="'.route('users.edit', $data->id).'" class="edit"><i class="fa fa-edit"></i> Edit</a>';
                    $html .= '<a href="javascript:void(0)" onclick="confirm('. $data->id .')" class="delete"><i class="fa fa-trash-o"></i> Delete</a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['id', 'role', 'status', 'created_at', 'action'])
                ->make(true);
        };

        //
        return view('admin.users.index');
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
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
