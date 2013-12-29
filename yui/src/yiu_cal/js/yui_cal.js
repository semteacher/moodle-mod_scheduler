YUI().use("moodle-mod_scheduler-yui_cal", function(Y)
{
  var YAHOO = Y.YUI2;
  var cal = new YAHOO.widget.Calendar("calContainer");
  cal.render();
  
  M.mod_scheduler = M.mod_scheduler || {};
  M.mod_scheduler.yui_cal = {
    init: function() {

    }
  };  
});