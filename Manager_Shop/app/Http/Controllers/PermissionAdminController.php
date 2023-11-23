<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use Illuminate\Http\Request;

class PermissionAdminController extends Controller
{
    public function createPermission()
    {
        return view('admin.permission.add');
    }
    public function store(Request $request)
    {
        $permission = Permisstion::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
        ]);
        foreach($request->module_children as $value){
            Permisstion::create([
                'name' => $value,
                'display_name' => $value,
                'parent_id' => $permission->id,
                'key_code' => $value . '_' . $request->module_parent
            ]);
          
        }
    }
}
