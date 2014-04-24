M.mod_scheduler = M.mod_scheduler || {};
M.mod_scheduler.calpane = {
  init: function() {
    Y.CalendarBase.CONTENT_TEMPLATE = Y.CalendarBase.THREE_PANE_TEMPLATE;
    // Setup basic parameters and draw calendar instance
    var calend = new Y.Calendar({
        contentBox: "#calContainer",
        width:'750px',
        showPrevMonth: true,
        showNextMonth: true,
        selectionMode: 'multiple-sticky',
        minimumDate: new Date(),
        date: new Date()}).render();
    var dtdate = Y.DataType.Date;
    // Create a set of rules to match specific dates. In this case,
    // the "all_weekends" rule will match any Saturday or Sunday.
    var rules = {
        "all": {
            "all": {
                "all": {
                    "0,6": "all_weekends"
                }
            }
        }
    };
    // Set the calendar customRenderer, provides the rules defined above.
    calend.set("customRenderer", {
        rules: rules,
        filterFunction: function (date, node, rules) {
            if (Y.Array.indexOf(rules, 'all_weekends') >= 0) {
                node.addClass("redtext");
            }
        }
    });
    // Set a custom header renderer with a callback function,
    // which receives the current date and outputs a string.
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