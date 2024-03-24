<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{


    public function showAppointmentForm()
    {
        // Only authenticated users can access this route
        if (Auth::check()) {
            return view('pages.appointment');
        } else {
            // Redirect to the login page if the user is not authenticated
            return redirect('/login')->withErrors(['error' => 'Please log in to access the appointment section.']);
        }
    }


    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'vehicle_mileage' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'preferred_time' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'comment' => 'nullable|string',
        ]);

        // Create and save the appointment
        $appointment = Appointment::create($validatedData);

        // Redirect or do something else
        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
}
