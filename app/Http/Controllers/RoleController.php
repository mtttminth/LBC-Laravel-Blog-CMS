<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', ['roles' => $roles]);
    }
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function store()
    {
        $input = request()->validate([
            'name' => ['required'],
        ]);

        Role::create([
            'name' => Str::ucfirst(Str::lower(request('name'))),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        session()->flash('role-created', $input['name'] . ' was created');
        return back();
    }
    public function update(Role $role)
    {
        request()->validate([
            'name' => ['required'],
        ]);

        // alternative
        // $role->update([
        //     'name' => Str::ucfirst(Str::lower(request('name'))),
        //     'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        // ]);

        // session()->flash('updated', 'Role ' . $role->name . ' updated!');

        // alternative
        $role->name = Str::ucfirst(Str::lower(request('name')));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($role->isDirty('name')) {
            session()->flash('updated', 'Role ' . $role->name . ' updated!');
            $role->save();
        } else {
            session()->flash('updated', 'Nothing updated!');
        }

        return back();
    }

    public function attach(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        session()->flash('updated', 'Role Attached!');
        return back();
    }

    public function detach(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        session()->flash('updated', 'Role Detached!');
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('deleted', 'Deleted role ' . $role->name);

        return back();
    }
}
