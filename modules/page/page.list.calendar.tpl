<!-- BEGIN: MAIN -->
<link href="js/jquery-ui-custom/css/custom-theme/jquery-ui-1.9.1.custom.min.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-ui-custom/js/jquery-ui-1.9.1.custom.min.js" type="text/javascript"></script>

<link rel='stylesheet' type='text/css' href='js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='js/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='js/fullcalendar/fullcalendar.js'></script>

{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}

    <h2 class="message"><a href="{PHP|cot_url('admin','m=other&p=order')}">{PHP.L.order_title}</a></h2>

    <script type='text/javascript' >
	$(document).ready(function() {

	    $('#calendar').fullCalendar({
	    events: {LIST_CALENDAR_JSON},
	    
	    firstDay: 1,
	    monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
	    monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	    dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
	    dayNamesShort: ['Вск.','Пн.','Вт.','Ср.','Чт.','Пт.','Сб.'],
	
	    theme: false

	    });

	});
    </script>

    <div id='calendar'></div>


<!-- END: MAIN -->