<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use App\Models\Geo;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index():View
    {
        $users = User::all();

        $usernames = array();
        $numberOfPosts = array();

        foreach ($users as $user) {
            $userId = $user->id;
            $queryUsers = DB::table("users")
                ->where("id", "=",$userId)
                ->value("username");

            array_push($usernames, $queryUsers);

            $queryPosts = DB::table("posts")
                ->where("userId", $userId)
                ->whereDate("created_at", ">=", Carbon::now()->subDays(7))
                ->count();

            array_push($numberOfPosts, $queryPosts);
        }

        return view("chart", [
            "usernames" => $usernames,
            "posts" => $numberOfPosts,
        ]);

    }
}
