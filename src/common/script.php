<script src="assets/js/jquery.min.js"></script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/fullcalendar-3.6.2/lib/moment.min.js"></script>
<script src="assets/fullcalendar-3.6.2/fullcalendar.min.js"></script>
<script src="assets/fullcalendar-3.6.2/locale/th.js"></script>

<script src="assets/js/aos.min.js"></script>

<script src="assets/js/bs-init.js"></script>

<script src="assets/js/Sidebar-Menu-sidebar.js"></script>

<script src="assets/js/dataTables.js"></script>

<script src="assets/js/dataTables.bootstrap5.js"></script>

<script src="assets/js/dataTables.responsive.js"></script>

<script src="assets/js/responsive.bootstrap5.js"></script>



<script>
    new DataTable('#teble_data', {
        responsive: true,
        order: [[0, 'desc']]  
    });

    // calendar
    $("#calendar").fullCalendar({
        header: {
            left: "prev,next today", //  prevYear nextYea
            center: "title",
            right: "month,agendaWeek,agendaDay",
        },
        buttonIcons: {
            prev: "left-single-arrow",
            next: "right-single-arrow",
            prevYear: "left-double-arrow",
            nextYear: "right-double-arrow",
        },
        //        theme:false,
        //        themeButtonIcons:{
        //            prev: 'circle-triangle-w',
        //            next: 'circle-triangle-e',
        //            prevYear: 'seek-prev',
        //            nextYear: 'seek-next'
        //        },
        //        firstDay:1,
        //        isRTL:false,
        //        weekends:true,
        //        weekNumbers:false,
        //        weekNumberCalculation:'local',
        //        height:'auto',
        //        fixedWeekCount:false,
        events: {
            url: "./systems/executivecalendar/modal/table.php?source=calendar",
            error: function() {},
        },
        eventLimit: true,
        //        hiddenDays: [ 2, 4 ],
        lang: "th",
        dayClick: function() {
            //            alert('a day has been clicked!');
            //            var view = $('#calendar').fullCalendar('getView');
            //            alert("The view's title is " + view.title);
        },
    });
	
    // calendar2
    $("#calendar2").fullCalendar({
        header: {
            left: "prev,next today", //  prevYear nextYea
            center: "title",
            right: "month,agendaWeek,agendaDay",
        },
        buttonIcons: {
            prev: "left-single-arrow",
            next: "right-single-arrow",
            prevYear: "left-double-arrow",
            nextYear: "right-double-arrow",
        },
        //        theme:false,
        //        themeButtonIcons:{
        //            prev: 'circle-triangle-w',
        //            next: 'circle-triangle-e',
        //            prevYear: 'seek-prev',
        //            nextYear: 'seek-next'
        //        },
        //        firstDay:1,
        //        isRTL:false,
        //        weekends:true,
        //        weekNumbers:false,
        //        weekNumberCalculation:'local',
        //        height:'auto',
        //        fixedWeekCount:false,
        events: {
            url: "./systems/room/modal/table.php?source=calendar2",
            error: function() {},
        },
        eventLimit: true,
        //        hiddenDays: [ 2, 4 ],
        lang: "th",
        dayClick: function() {
            //            alert('a day has been clicked!');
            //            var view = $('#calendar').fullCalendar('getView');
            //            alert("The view's title is " + view.title);
        },
    });	
	
</script>