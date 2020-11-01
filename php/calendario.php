<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../css/main.css' rel='stylesheet' />
<link href='../css/css.css' rel='stylesheet' />
<script src='../js/main.js'></script>
<script src='../js/locales-all.js'></script>
<script src='../locales/pt-br.js'></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'pt-br';
    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      //initialDate: '2020-09-12',
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2020-09-01'
        }
      ]
    });

    calendar.render();

    // build the locale selector's options
    calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
      var optionEl = document.createElement('option');
      optionEl.value = localeCode;
      optionEl.selected = localeCode == initialLocaleCode;
      optionEl.innerText = localeCode;
      localeSelectorEl.appendChild(optionEl);
    });

    // when the selected option changes, dynamically change the calendar option
    localeSelectorEl.addEventListener('change', function() {
      if (this.value) {
        calendar.setOption('locale', this.value);
      }
    });

  });

</script>
</head>
<body>


  <div id='calendar'></div>

</body>
</html>
