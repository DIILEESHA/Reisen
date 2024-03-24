<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/showapp.css">
</head>

<body>
    <div class="admin_container">
        <div class="admin_grid">
            <div class="admin_sub jkh">
                <div class="admin_card">
                    <div class="hambu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="juy"></div>
                    <div class="admin_links">
                        <div class="admin_sub_links">
                            <!-- Added IDs to the links -->
                            <a class="mug" href="#" id="showAppointments">Table</a>
                        </div>
                        <div class="admin_sub_links">
                            <a class="mug" href="#" id="showUsers">Users List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin_sub" id="appointmentsTable"> <!-- Added ID to the appointments table -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="">
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Vehicle Mileage</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Preferred Time</th>
                            <th scope="col">Preferred Service</th>
                            <th scope="col">Comment</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr class="de">
                                <td>{{ $appointment->vehicle_name }}</td>
                                <td>{{ $appointment->vehicle_mileage }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->preferred_time }}</td>
                                <td>{{ $appointment->preferred_way }}</td>
                                <td>{{ $appointment->comment }}</td>
                                {{-- <td class="halo"> --}}
                                {{-- <button>View</button> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="admin_sub" id="usersTable" style="display:none;">
                <!-- Added ID to the users table and set display:none -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="">
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr class="de">
                                <td>{{ $appointment->customer_name }}</td>
                                <td>{{ $appointment->customer_email }}</td>
                                <td>{{ $appointment->customer_phone }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle between showing appointments and users list
        document.getElementById("showAppointments").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById("appointmentsTable").style.display = "block"; // Show appointments table
            document.getElementById("usersTable").style.display = "none"; // Hide users table
        });

        document.getElementById("showUsers").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById("appointmentsTable").style.display = "none"; // Hide appointments table
            document.getElementById("usersTable").style.display = "block"; // Show users table
        });
    </script>
</body>

</html>
