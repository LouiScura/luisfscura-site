<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects/Index');
    }
}
