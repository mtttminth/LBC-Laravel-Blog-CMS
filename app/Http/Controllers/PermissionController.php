<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', ['permissions' => $permissions]);
    }
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
        ]);

        Permission::create([
            'name' => Str::ucfirst(Str::lower(request('name'))),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        return back();
    }
    public function update(Permission $permission)
    {
        request()->validate([
            'name' => ['required'],
        ]);

        // alternative
        // $permission->update([
        //     'name' => Str::ucfirst(Str::lower(request('name'))),
        //     'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        // ]);

        // session()->flash('updated', 'Permission ' . $permission->name . ' updated!');

        // alternative
        $permission->name = Str::ucfirst(Str::lower(request('name')));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

        if ($permission->isDirty('name')) {
            session()->flash('updated', 'Permission ' . $permission->name . ' updated!');
            $permission->save();
        } else {
            session()->flash('updated', 'Nothing has been updated!');
        }

        return back();
    }

    public function attach(Permission $permission)
    {
        $permission->permissions()->attach(request('permission'));

        return back();
    }

    public function detach(Permission $permission)
    {
        $permission->permissions()->detach(request('permission'));

        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('deleted', 'Deleted permission ' . $permission->name);

        return back();
    }
}