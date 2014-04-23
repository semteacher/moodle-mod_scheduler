M.mod_scheduler = M.mod_scheduler || {};
M.mod_scheduler.calpane = {
  init: function() {
    Y.CalendarBase.CONTENT_TEMPLATE = Y.CalendarBase.TWO_PANE_TEMPLATE;
    //draw calendar
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
        //collect dates from selection
        var listdates = '[{';
        for (var i = 0; i < ev.newSelection.length; i++) {
            listdates += (i === 0 ? "" : ",") + '"'+ i +'":"'+ dtdate.format(ev.newSelection[i])+'"';
		}
        listdates += "}]";
/////      Y.one("#myselecteddate").setHTML(dtdate.format(newDate));
        //set dates to HTML control
        Y.one("#id_listdates").set('value', listdates);
    });
  }
};