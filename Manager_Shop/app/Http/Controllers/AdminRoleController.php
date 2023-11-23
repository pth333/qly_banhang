<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permisstion;
    public function __construct(Role $role, Permisstion $permisstion)
    {
        $this->role = $role;
        $this->permisstion = $permisstion;
    }
    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permisstionParent = $this->permisstion->where('parent_id', 0)->get();

        return view('admin.role.add', compact('permisstionParent'));
    }
    public function store(Request $request)
    {
        $roles = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles->permisstions()->attach($request->permisstion_id);

        return redirect()->route('roles.index');
    }
    public function edit(string $id)
    {
        $permisstionParent = $this->permisstion->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permisstions;
        return view('admin.role.edit', compact('permisstionParent', 'role', 'permissionChecked'));
    }
    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
       
        $role->permisstions()->sync($request->permisstion_id);

        return redirect()->route('roles.index');
    }
    public function destroy($id){
        return $this->deleteModelTrait($id,$this->role);
    }
  
}
