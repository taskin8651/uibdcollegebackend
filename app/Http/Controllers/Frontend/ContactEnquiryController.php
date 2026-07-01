<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'mobile'     => 'required|string|max:20',
            'email'      => 'nullable|email|max:255',
            'query_type' => 'required|string|max:255',
            'subject'    => 'nullable|string|max:255',
            'message'    => 'nullable|string',
        ]);

        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        ContactEnquiry::create($data);

        return back()->with('message', 'Thank you! Your enquiry has been submitted successfully.');
    }
}