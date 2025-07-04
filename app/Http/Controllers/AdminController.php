<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main-admin');
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin_article()
    {
        return view('admin.article_manager');
    }

    public function admin_restaurant()
    {
        return view('admin.resto-manager');
    }

    public function admin_user()
    {
        return view('admin.user_manager');
    }

    public function admin_events()
    {
        return view('admin.events_manager');
    }

    public function admin_settings()
    {
        return view('');
    }
}