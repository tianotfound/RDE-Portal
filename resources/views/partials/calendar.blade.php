<div class="card mt-3 mb-3">
    <div class="card-body">
        <h5><i class="fas fa-calendar-alt"></i> Calendar of Activities
            <button class="btn btn-primary btn-sm float-end">Add</button>
        </h5>
        <hr>
        <div id="calendar"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
</script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>