<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->latest()->paginate(5);

        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            // foreach($request->role_id as $roleItem){
            //     DB::table('role_user')->insert([
            //         'role_id' => $roleItem,
            //         'user_id' => $user->id
            //     ]);
            // }
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line' . $exception->getLine());
        }
    }
    public function edit(string $id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        return view('admin.user.edit', compact('roles', 'user'));
    }
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            // Xem lại
            $user = $this->user->find($id);
            $user->roles()->attach($request->role_id);
            // dd($user);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line' . $exception->getLine());
        }
    }
    public function destroy($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
