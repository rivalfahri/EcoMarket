<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AdminAffiliateController extends Controller
{
    public function index()
    {
        $customers = Affiliate::all(); // Fetch all customers from the database
        return view('admin.affiliate.index', compact('customers')); // Pass the data to the view
    }
}
