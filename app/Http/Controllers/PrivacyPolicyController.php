<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{ /**
  * Menampilkan halaman FAQ.
  *
  * @return \Illuminate\View\View
  */
    public function index()
    {
        return view('user.privacy'); // Mengembalikan view faq.blade.php
    }
}
