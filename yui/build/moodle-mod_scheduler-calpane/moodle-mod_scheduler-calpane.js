YUI.add('moodle-mod_scheduler-calpane', function (Y, NAME) {

M.mod_scheduler = M.mod_scheduler || {};
M.mod_scheduler.calpane = {
  init: function() {
   //next -work ok
    Y.one('#calContainer').set('innerHTML', 'Example content');
   //next work
   Y.CalendarBase.CONTENT_TEMPLATE = Y.CalendarBase.TWO_PANE_TEMPLATE;
    var calend = new Y.Calendar({
      contentBox: "#calContainer2",
      width:'700px',
      showPrevMonth: true,
      showNextMonth: true,
      selectionMode: 'multiple',
      date: new Date()}).render();
    var dtdate = Y.DataType.Date;

        // Listen to calendar's selectionChange event.
    calend.on("selectionChange", function (ev) {

      // Get the date from the list of selected
      // dates returned with the event (since only
      // single selection is enabled by default,
      // we expect there to be only one date)
      var newDate = ev.newSelection[0];

      // Format the date and output it to a DOM
      // element.
      Y.one("#myselecteddate").setHTML(dtdate.format(newDate));
    });
  }
};

}, '@VERSION@', {"requires": ["base", "calendar", "node"]});
