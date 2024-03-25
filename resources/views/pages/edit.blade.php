<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book an appointement</title>
    <link rel="stylesheet" href="/css/appointement.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
</head>

<body>
    @include('components.nav')
    <div class="contas">
        <div class="about_description">
            <h2 class="abouter">EIDT AN APPOINTMENT </h2>
            <div class="about_fg">
                <h2 class="dg"><a class="linka" href="/">home </a></h2>

                <h2 class="dg">></h2>
                <h2 class="dg">EIDT AN APPOINTMENT</h2>

            </div>
        </div>
    </div>
    <div class="appointement_container">
        <h1 class="customer_title">EIDT AN APPOINTMENT</h1>
        {{-- <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class=""> --}}
            <form action="{{ route('appointments.update', ['id' => $appointment->id]) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="appointment_form">
                <div class="appointment_input">
                    <label for="">vehicle name</label>
                    <input required id="vehicle_name" name="vehicle_name" type="text"
                        value="{{ $appointment->vehicle_name }}" placeholder="Enter the vehicle name">
                </div>
                <div class="appointment_input">
                    <label for="">milege </label>
                    <input required id="vehicle_mileage" name="vehicle_mileage" type="text"
                        value="{{ $appointment->vehicle_mileage }}" placeholder="Enter the vehicle milege">
                </div>

                <div class="appointment_input">
                    <label for="">Appointment Date</label>
                    <input required id="appointment_date" name="appointment_date" type="date"
                        value="{{ $appointment->appointment_date }}" placeholder="Enter the vehicle milege">
                </div>
                <div class="appointment_input">
                    <label for="preferred_time">Preferred Time Frame</label>
                    <select id="preferred_time" name="preferred_time">
                        <!-- Options for times from 9:00 AM to 6:00 PM -->
                        <option value="09:00"{{ $appointment->preferred_time == '09:00' ? ' selected' : '' }}>09:00 AM
                            - 10:00 AM</option>
                        <option value="10:00"{{ $appointment->preferred_time == '10:00' ? ' selected' : '' }}>10:00 AM
                            - 11:00 AM</option>
                        <option value="11:00"{{ $appointment->preferred_time == '11:00' ? ' selected' : '' }}>11:00 AM
                            - 12:00 PM</option>
                        <option value="12:00"{{ $appointment->preferred_time == '12:00' ? ' selected' : '' }}>12:00 PM
                            - 01:00 PM</option>
                        <option value="13:00"{{ $appointment->preferred_time == '13:00' ? ' selected' : '' }}>01:00 PM
                            - 02:00 PM</option>
                        <option value="14:00"{{ $appointment->preferred_time == '14:00' ? ' selected' : '' }}>02:00 PM
                            - 03:00 PM</option>
                        <option value="15:00"{{ $appointment->preferred_time == '15:00' ? ' selected' : '' }}>03:00 PM
                            - 04:00 PM</option>
                        <option value="16:00"{{ $appointment->preferred_time == '16:00' ? ' selected' : '' }}>04:00 PM
                            - 05:00 PM</option>
                        <option value="17:00"{{ $appointment->preferred_time == '17:00' ? ' selected' : '' }}>05:00 PM
                            - 06:00 PM</option>
                    </select>
                </div>
                <div class="appointment_input">
                    <label for="">Your name</label>
                    <input required id="customer_name" name="customer_name" type="text" placeholder="Enter Your Name"
                        value="{{ $appointment->customer_name }}">
                </div>
                <div class="appointment_input">
                    <label for="">Your email</label>
                    <input required name="customer_email" id="customer_email" type="text"
                        value="{{ $appointment->customer_email }}" placeholder="Enter Your E-mail" />
                </div>
                <div class="appointment_input">
                    <label for="">Your phone</label>
                    <input required id="customer_phone" name="customer_phone" type="text"
                        value="{{ $appointment->customer_phone }}" placeholder="Enter Your Phone-nummber" />
                </div>


                <div class="appointment_input">
                    <label for="">Select Service Needed</label>
                    <select id="preferred_way" name="preferred_way">
                        <option
                            value="Air conditioning"{{ $appointment->preferred_way == 'Air conditioning' ? ' selected' : '' }}>
                            Air conditioning</option>
                        <option
                            value="Brakes repair"{{ $appointment->preferred_way == 'Brakes repair' ? ' selected' : '' }}>
                            Brakes repair</option>
                        <option
                            value="Engine repair"{{ $appointment->preferred_way == 'Engine repair' ? ' selected' : '' }}>
                            Engine repair</option>
                        <option
                            value="Heating & Cooling"{{ $appointment->preferred_way == 'Heating & Cooling' ? ' selected' : '' }}>
                            Heating & Cooling</option>
                        <option
                            value="Oil Lube & Filters"{{ $appointment->preferred_way == 'Oil Lube & Filters' ? ' selected' : '' }}>
                            Oil Lube & Filters</option>
                        <option
                            value="Steering & Suspensions"{{ $appointment->preferred_way == 'Steering & Suspensions' ? ' selected' : '' }}>
                            Steering & Suspensions</option>
                        <option
                            value="Transmission Repair"{{ $appointment->preferred_way == 'Transmission Repair' ? ' selected' : '' }}>
                            Transmission Repair</option>
                        <option
                            value="Wheel Alignment"{{ $appointment->preferred_way == 'Wheel Alignment' ? ' selected' : '' }}>
                            Wheel Alignment</option>
                    </select>
                </div>

                <div class="appointment_input pp">
                    <label for="">Enter comment</label>
                    <textarea required placeholder="Enter Your comment | Message" name="comment" id="comment" cols="30"
                        rows="10">{{ $appointment->comment }}</textarea>
                </div>
                <div class="appointment_input ll">
                    <button type="submit">submit</button>
                </div>

            </div>
        </form>
    </div>
    @include('components.footer')


    <!-- Include JavaScript libraries for datepicker and timepicker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        // Apply date range picker to preferred time input
        $('#preferred_time').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 30,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
    </script>
</body>

</html>
