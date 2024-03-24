<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/css/showapp.css">
    <style>


    </style>
    <title>Document</title>
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
                        <h2>my appointments</h2>
                    </div>
                    <div class="sub_links">
                        <h2>support</h2>
                    </div>
                    <div class="sub_links">
                        <h2>logout</h2>
                    </div>
                </div>

            </div>
            <div class="show_sub">
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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="">
                                <th scope="col">Vehicle Name</th>
                                <th scope="col">Vehicle Mileage</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Preferred Time</th>
                                <th scope="col">Actions</th>
                                <!-- Add more columns as needed -->
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
                                                <a href="#">Edit</a>
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
                                    <!-- Add more columns as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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

</body>

</html>
