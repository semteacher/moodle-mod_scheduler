﻿YUI().use('calendar', function (Y) {

  // Create a new instance of Calendar, setting its width 
  // and height, allowing the dates from the previous
  // and next month to be visible and setting the initial
  // date to be November, 1982.
  var calendar = new Y.Calendar({
          contentBox: "#mycalendar",
          height:'200px',
          width:'600px',
          showPrevMonth: true,
          showNextMonth: true,
          date: new Date(1982,11,1)}).render();

});