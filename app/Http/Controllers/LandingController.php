<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        return view('landing.index', [
            'pageTitle' => 'CI HR - Complete HR Management System'
        ]);
    }

    /**
     * Display the features page.
     */
    public function features()
    {
        return view('landing.features', [
            'pageTitle' => 'Features - CI HR'
        ]);
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('landing.about', [
            'pageTitle' => 'About - CI HR'
        ]);
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('landing.contact', [
            'pageTitle' => 'Contact - CI HR'
        ]);
    }
}

