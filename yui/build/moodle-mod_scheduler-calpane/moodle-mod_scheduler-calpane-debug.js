YUI.add('moodle-mod_scheduler-calpane', function (Y, NAME) {

M.mod_scheduler = M.mod_scheduler || {};
M.mod_scheduler.calpane = {
  init: function() {
   //next -work ok
//    Y.one('#calContainer').set('innerHTML', 'Example content');
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

    var listdates = "";
    var listdates2 = '[{';
    for (var i = 0; i < ev.newSelection.length; i++) {
    
        listdates += (i === 0 ? "" : ",") + dtdate.format(ev.newSelection[i]);
        listdates2 += (i === 0 ? "" : ",") + '"'+ i +'":"'+ dtdate.format(ev.newSelection[i])+'"';
		}
    listdates2 += "}]";
      // Get the date from the list of selected
      // dates returned with the event (since only
      // single selection is enabled by default,
      // we expect there to be only one date)
/////      var newDate = ev.newSelection[0];

      // Format the date and output it to a DOM
      // element.
/////      Y.one("#myselecteddate").setHTML(dtdate.format(newDate));
    Y.one("#myselecteddate").setHTML(listdates);
    Y.one("#id_listdates").set('value', listdates2);
    });
  }
};

}, '@VERSION@', {"requires": ["base", "calendar", "datatype-date", "node"]});
