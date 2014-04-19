YUI().add("moodle-mod_scheduler-yui_cal2", function(Y)
{
//  var YAHOO = Y.YUI2;
//  var cal = new YAHOO.widget.Calendar("calContainer");
//  cal.render();
    var CALENDAR = function(config) {
        CALENDAR.superclass.constructor.apply(this, arguments);
    };
    Y.extend(CALENDAR, Y.Base, CALENDAR.prototype, {
        NAME : 'My Calendar Panel',
        ATTRS : {

        }
    });    

    M.mod_scheduler = M.mod_scheduler || {};
    M.mod_scheduler.init_yui_cal2 = function() {
    var YAHOO = Y.YUI2;
    //var cal = new YAHOO.widget.Calendar(document.getElementById('calContainer'));
    var cal = new Y.YUI2.widget.Calendar(document.getElementById('calContainer'), {});
    cal.render();
    var calendar = new Y.Calendar({
          contentBox: "#calContainer",
          height:'200px',
          width:'600px',
          showPrevMonth: true,
          showNextMonth: true,
          date: new Date(2010,11,1)}).render();
      Y.delegate('click', function(e) {    
           alert("You clicked on some fruit");});
 //   Y.delegate('click', function(e) {
        // Alert users when they've clicked on some fruit to tell them the obvious.
 //       alert("You clicked on some fruit");
 
        // Add a border to the fruit so we can see that it was selected.
 //       e.setStyle('border', '1px solid black');
  //  }, Y.config.doc, '.scheduler');
};
});

