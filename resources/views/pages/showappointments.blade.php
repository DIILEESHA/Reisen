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
    <link rel="stylesheet" href="/css/showapp.css">
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

                <!-- Table structure -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Vehicle Mileage</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Preferred Time</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->vehicle_name }}</td>
                                <td>{{ $appointment->vehicle_mileage }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->preferred_time }}</td>
                                <!-- Add more columns as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @include('components.footer')

</body>

</html>
