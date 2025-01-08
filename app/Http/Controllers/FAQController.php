<?php
// app/Http/Controllers/FAQController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Menampilkan halaman FAQ.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.faq'); // Mengembalikan view faq.blade.php
    }
}
