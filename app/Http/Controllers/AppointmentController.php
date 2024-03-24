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

    public function showAppointments()
    {
        // Retrieve all appointments
        $appointments = Appointment::all();
        
        // Pass appointments data to the view
        return view('pages.showappointments', ['appointments' => $appointments]);
    }


    public function store(Request $request)
{
    try {
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
        return redirect('/user-appointments')->back()->with('success', 'Appointment booked successfully!');
    } catch (\Exception $e) {
        // \Log::error($e->getMessage());
        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while booking the appointment. Please try again later.');
    }



}

public function destroy($id)
{
    try {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);
        
        // Delete the appointment
        $appointment->delete();
        
        return redirect('/user-appointments')->with('success', 'Appointment deleted successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while deleting the appointment. Please try again later.');
    }
}

}