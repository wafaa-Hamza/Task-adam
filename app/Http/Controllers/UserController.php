<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    public function deactivateTestUsers()
    {
        Artisan::call('users:change-status-to-inactive');
        $deactivatedUsers = User::where('email', 'like', '%test%')->where('status', 'inactive')->get();

        return response()->json(['message' => 'Deactivated users with "test" in their email.',
                                 'deactivatedUsers'=>$deactivatedUsers,
        ]);
    }

    public function softDeleteInactiveUsers()
    {
        Artisan::call('app:soft-delete-inactive-users');
        $softDeletedUsers = User::onlyTrashed()->where('status', 'inactive')->get();

        return response()->json(['message' => 'Soft deleted inactive users.',
        'softDeletedUsers'=>$softDeletedUsers,

    ]);
    }}
