<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use Carbon\Carbon;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * 
     * 
     */
    public function __construct() {
        $this->middleware(['permission:role-view'])->only('index', 'show');
        $this->middleware(['permission:role-edit'])->only('edit', 'update');
        $this->middleware(['permission:role-add'])->only('create', 'store');
        $this->middleware(['permission:role-delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('id', function($data){ 
                    $id = sprintf("%04d", $data->id);
                    return $id;
                })
                ->editColumn('created_at', function($data){ 
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/y'); 
                    return $formatedDate; 
                })
                ->addColumn('action', function($data){
                    $html = '<div class="d-flex gap-3 justify-content-center">';
                    $html .= '<a href="'.route('roles.show', $data->id).'" class="show"><i class="fa fa-eye"></i> Show</a>';
                    $html .= '<a href="'.route('roles.edit', $data->id).'" class="edit"><i class="fa fa-edit"></i> Edit</a>';
                    $html .= '<a href="javascript:void(0)" onclick="confirm('. $data->id .')" class="delete"><i class="fa fa-trash-o"></i> Delete</a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['id', 'role', 'status', 'created_at', 'action'])
                ->make(true);
        };

        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort(404);
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
        abort(404);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('admin.roles.edit', compact(['role','permissions']));
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
        $request->validate([
            'name'          => 'required|max:255|unique:roles,name,' .$id,
            'permissions'   => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' =>$request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
        //
        return redirect()->back()->with('success','Role has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort(404);
    }
}
