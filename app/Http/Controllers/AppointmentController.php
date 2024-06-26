<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function showAppointment()
{
    // Retrieve all appointments
    $appointments = Appointment::all();
    // dd($appointments);
    // Pass appointments data to the view
    return view('dashboard', ['appointments' => $appointments]);
}
 
    
    public function showAppointments()
    {
        // Retrieve appointments only for the authenticated user
        $userAppointments = Auth::user()->appointments;
    
        // Pass appointments data to the view
        return view('pages.showappointments', ['appointments' => $userAppointments]);
    }

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
                'preferred_way'=>'required',

            ]);

            // Create and save the appointment associated with the authenticated user
            $appointment = Auth::user()->appointments()->create($validatedData);
            return redirect('/user-appointments')->with('success', 'Appointment booked successfully!');
        } catch (\Exception $e) {
            // Handle errors
            return redirect()->back()->with('error', 'An error occurred while booking the appointment. Please try again later.');
        }
    }

    public function showEditForm($id)
{
    // Find the appointment by ID
    $appointment = Appointment::findOrFail($id);

    // Return the edit form view with the appointment data
    return view('pages.edit', ['appointment' => $appointment]);
}

    public function update(Request $request, $id)
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
            'preferred_way'=>'required',
        ]);

        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Update the appointment with validated data
        $appointment->update($validatedData);

        return redirect('/user-appointments')->with('success', 'Appointment updated successfully!');
    } catch (\Exception $e) {
        // Handle errors
        return redirect()->back()->with('error', 'An error occurred while updating the appointment. Please try again later.');
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