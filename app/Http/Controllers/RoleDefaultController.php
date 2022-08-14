<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleDefaultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Role $role)
    {
        if ($role) {
            $before = Role::default();
            $role->default = true;

            if ($before && $before->id != $role->id) {
                $before->default = false;
                DB::transaction(function () use ($role, $before) {
                    if (!$before->save() || !$role->save()) abort(505);
                });
            } else {
                ModelHelper::save($role);
            }

            session()->flash('success', 'Role default changed successfully.');
        }

        return to_route('roles.index');
    }
}
