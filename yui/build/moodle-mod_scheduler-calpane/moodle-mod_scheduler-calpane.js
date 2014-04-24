YUI.add('moodle-mod_scheduler-calpane', function (Y, NAME) {

M.mod_scheduler = M.mod_scheduler || {};
M.mod_scheduler.calpane = {
  init: function() {
    Y.CalendarBase.CONTENT_TEMPLATE = Y.CalendarBase.THREE_PANE_TEMPLATE;
    //draw calendar
    var calend = new Y.Calendar({
      contentBox: "#calContainer",
      width:'750px',
      showPrevMonth: true,
      showNextMonth: true,
      selectionMode: 'multiple',
      date: new Date()}).render();
    var dtdate = Y.DataType.Date;

    calend.set("headerRenderer", function (curDate) {
    var ydate = Y.DataType.Date,
       output = ydate.format(curDate, {
       format: "%B %Y"
       }) + " &mdash; " + ydate.format(ydate.addMonths(curDate, 1), {
       format: "%B %Y"
       })+ " &mdash; " + ydate.format(ydate.addMonths(curDate, 2), {
       format: "%B %Y"
       });
    return output;
    });
  // Listen to calendar's selectionChange event.
    calend.on("selectionChange", function (ev) {
        //collect dates from selection
        var listdates = '[{';
        for (var i = 0; i < ev.newSelection.length; i++) {
            listdates += (i === 0 ? "" : ",") + '"'+ i +'":"'+ dtdate.format(ev.newSelection[i])+'"';
		}
        listdates += "}]";
        //set dates to HTML control
////        Y.one("#id_listdates").set('value', listdates);
        Y.one(document.getElementsByName('getlistdates')[0]).set('value', listdates);
    });
  }
};

}, '@VERSION@', {"requires": ["base", "calendar", "datatype-date", "node"]});
