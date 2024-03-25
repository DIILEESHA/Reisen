<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- MDB CSS -->
    <link rel="stylesheet" href="/css/admin.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/css/showapp.css">
    <style>


    </style>
    <title>user-appointments</title>
</head>

<body>

    @include('components.nav')
    <div class="show_container">
        <div class="show_grid">
            <div class="show_sub">
                <h2 class="quick">
                    quick links
                </h2>
                <div class="link_area">
                    <div class="sub_links">
                        {{-- <h2>my appointments</h2> --}}
                        <h2>

                            <a style="color: inherit" class="mug" href="#" id="showAppointments">Appointments</a>
                        </h2>

                    </div>
                    <div class="sub_links">
                        {{-- <h2>support</h2> --}}
                        <h2>

                            <a style="color: inherit" class="mug" href="#" id="showUsers">Support</a>
                        </h2>

                    </div>
                    <div class="sub_links">
                        <h2>
                            <a   class="linka" href="/">
                                logout
                            </a>
                        </h2>
                    </div>
                </div>

            </div>
            <div class="show_sub" id="appointmentsTable">
                <h2 class="quick">
                    My appointments
                </h2>
                @if ($appointments->isEmpty())

                    <div class="empty">

                        <div class="imger_sect">
                            <img src="https://tse3.mm.bing.net/th?id=OIP.QmRQ4D64Pm2LEUKNUwzu3QHaHa&pid=Api&P=0&h=220"
                                alt="">
                        </div>
                        <p>No appointments found.</p>

                    </div>
                @else
                    <!-- Table structure -->
                    <table class="table" >
                        <thead class="thead-dark">
                            <tr class="">
                                <th scope="col">Vehicle Name</th>
                                <th scope="col">Vehicle Mileage</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Preferred Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr class="de">
                                    <td>{{ $appointment->vehicle_name }}</td>
                                    <td>{{ $appointment->vehicle_mileage }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td class="heyo">{{ $appointment->preferred_time }}</td>
                                    <td class="halo">
                                        <div class="popup-menu">
                                            <i class="fa-solid fa-ellipsis-vertical"
                                                onclick="togglePopupMenu(this)"></i>
                                            <div class="popup-menu-content">
                                                {{-- <a href="{{ route('appointments.edit', $appointment->id) }}">Edit</a> --}}
                                                <a href="{{ route('appointments.edit', ['id' => $appointment->id]) }}">Edit</a>

                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this appointment?')) { document.getElementById('delete-form-{{ $appointment->id }}').submit(); }">Delete</a>
                                                <form id="delete-form-{{ $appointment->id }}"
                                                    action="{{ route('appointments.destroy', $appointment->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>



            <div class="show_sub" id="usersTable" style="display:none;">
                <h2 class="quick">
                    Support
                </h2>

                <div class="contact_infa">
                    <div class="contatca">
                        <h3>contact number : </h2>
                        <h2 class="bushi">071-654 2345</h2>
                    </div>
                    <div class="contatca">
                        <h3>Email : </h2>
                        <h2 class="bushi">avi@info.com</h2>
                    </div>
                    <div class="contatca">
                        <h3>Address : </h2>
                        <h2 class="bushi">Colombo 07 | Sri Lanka</h2>
                    </div>
                    <div class="contatca">
                        <h3>Careers : </h2>
                        <h2 class="bushi">careers@avi.com</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        function togglePopupMenu(icon) {
            var popupMenu = icon.nextElementSibling;
            popupMenu.style.display = popupMenu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
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
