<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comics;
use App\Models\User;
use App\Models\reviews;


class dashboardController extends Controller
{
    public function showDashboard()
    {
        $comicsCount = comics::count();
        $usersCount = User::count();
        $reviewsCount = reviews::count();
        
        $comics = comics::all();
   
        return view('dashboard', compact('comicsCount','comics','usersCount','reviewsCount'));
        
    }

}
