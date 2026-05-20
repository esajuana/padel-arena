@extends('admin.layouts.app')

@section('content')

<h2 class="mb-4">
    Kalender Booking
</h2>

<div class="card shadow border-0">

    <div class="card-body">

        <div id="calendar"></div>

    </div>

</div>

<!-- FULLCALENDAR -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css"
    rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js">
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        height: 750,

        events: '/admin/calendar/events',

        headerToolbar: {

            left: 'prev,next today',

            center: 'title',

            right: 'dayGridMonth,timeGridWeek,timeGridDay'

        }

    });

    calendar.render();

});

</script>

@endsection