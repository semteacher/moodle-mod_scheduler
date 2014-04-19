YUI().use("calendar", function(Y)
{

var calendar = new Y.Calendar({
          contentBox: "#mycalendar",
          height:'200px',
          width:'600px',
          showPrevMonth: true,
          showNextMonth: true,
          date: new Date(2010,11,1)}).render();

//  var YAHOO = Y.YUI2;
//  var cal = new YAHOO.widget.Calendar("calContainer");
//  cal.render();
//M.mod_scheduler = M.mod_scheduler || {};
//M.mod_scheduler.yui_cal1 = {
//    init_date_selectors: function() {
//  var YAHOO = Y.YUI2;
//  var cal = new YAHOO.widget.Calendar("calContainer");
//  cal.render();
 //   Y.delegate('click', function(e) {
        // Alert users when they've clicked on some fruit to tell them the obvious.
 //       alert("You clicked on some fruit");
 
        // Add a border to the fruit so we can see that it was selected.
 //       e.setStyle('border', '1px solid black');
  //  }, Y.config.doc, '.scheduler');
//  }
//};
});