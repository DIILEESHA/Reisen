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
            <h2 class="abouter">BOOK AN APPOINTMENT </h2>
            <div class="about_fg">
                <h2 class="dg"><a class="linka" href="/">home </a></h2>

                <h2 class="dg">></h2>
                <h2 class="dg">BOOK AN APPOINTMENT</h2>

            </div>
        </div>
    </div>
    <div class="appointement_container">
        <h1 class="customer_title">BOOK AN APPOINTMENT</h1>
        <form action="{{ route('appointments.store') }}" method="POST" class="appointment_form">

            @csrf
            <div class="appointment_input">
                <label for="">name</label>
                <input id="vehicle_name" name="vehicle_name" type="text" placeholder="Enter the vehicle name">
            </div>
            <div class="appointment_input">
                <label for="">name</label>
                <input id="vehicle_mileage" name="vehicle_mileage" type="text" placeholder="Enter the vehicle milege">
            </div>

            <div class="appointment_input">
                <label for="">APPOINTMENT DATE</label>
                <input id="appointment_date" name="appointment_date" type="date" placeholder="Enter the vehicle milege">
            </div>
            <div class="appointment_input">
                <label for="">PREFFERED TIME FRAME</label>
                {{-- <input type="text" id="preferred_time" placeholder="Select preferred time frame"> --}}
                <select id="preferred_time" name="preferred_time">
                    <!-- Options for times from 9:00 to 18:00 -->
                    <option value="09:00">09:00 - 10:00</option>
                    <option value="10:00">10:00 - 11:00</option>
                    <option value="11:00">11:00 - 12:00</option>
                    <option value="12:00">12:00 - 13:00</option>
                    <option value="13:00">13:00 - 14:00</option>
                    <option value="14:00">14:00 - 15:00</option>
                    <option value="15:00">15:00 - 16:00</option>
                    <option value="16:00">16:00 - 17:00</option>
                    <option value="17:00">17:00 - 18:00</option>
                </select>
            </div>
            <div class="appointment_input">
                <label for="">Your name</label>
                <input id="customer_name" name="customer_name" type="text" placeholder="Enter the vehicle milege">
            </div>
            <div class="appointment_input">
                <label for="">Your email</label>
                <input name="customer_email" id="customer_email" type="text" placeholder="Enter the vehicle milege">
            </div>
            <div class="appointment_input">
                <label for="">Your phone</label>
                <input id="customer_phone" name="customer_phone" type="text" placeholder="Enter the vehicle milege">
            </div>


            {{-- <div class="appointment_input">
                <label for="">PREFFERED TIME FRAME</label>
                <select id="preferred_way" name="preferred_way">
                    <option value="09:00">Air conditioning</option>
                    <option value="10:00">Brakes repair</option>
                    <option value="11:00">Engine repair </option>
                    <option value="12:00">Heating & Cooling</option>
                    <option value="13:00">Oil Lube & Filters</option>
                    <option value="14:00">Steering & Suspensions</option>
                    <option value="15:00">Transmission Repair</option>
                    <option value="16:00">Wheel Alignment</option>
                </select>
            </div> --}}
            <div class="appointment_input">
                <label for="">comment</label>
                <textarea placeholder="Enter the vehicle milege" name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="appointment_input">
                <button type="submit">submit</button>
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
