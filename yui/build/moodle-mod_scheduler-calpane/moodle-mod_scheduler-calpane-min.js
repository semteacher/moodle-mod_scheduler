YUI.add("moodle-mod_scheduler-calpane",function(e,t){M.mod_scheduler=M.mod_scheduler||{},M.mod_scheduler.calpane={init:function(){e.CalendarBase.CONTENT_TEMPLATE=e.CalendarBase.TWO_PANE_TEMPLATE;var t=(new e.Calendar({contentBox:"#calContainer2",width:"700px",showPrevMonth:!0,showNextMonth:!0,selectionMode:"multiple",date:new Date})).render(),n=e.DataType.Date;t.on("selectionChange",function(t){var r="";for(var i=0;i<t.newSelection.length;i++)r+=(i===0?"":",")+n.format(t.newSelection[i]);e.one("#myselecteddate").setHTML(r)})}}},"@VERSION@",{requires:["base","calendar","datatype-date","node"]});
