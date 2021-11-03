var p = MindFusion.Scheduling;

//create new calendar instance/object
var calendar = new p.Calendar(document.getElementById("calendar"));
calendar.currentView = p.CalendarView.SingleMonth; //specify the view of the calendar
calendar.theme = "peach"; //Theme of the calendar
calendar.selectionEnd.addEventListener(handleSelection);

function handleSelection(render, args){
	
	if(render.CurrentView === p.CalendarView.SingleMonth){
		
		args.cancel = true;
		var start = args.startTime;
		var end = args.endTime;
		
		render.timetableSettings.dates.clear();
		
		while(start < end){
			render.timetableSettings.dates.add(start);
			start = p.DateTime.addDays(start, 1);
		}
		
		render.CurrentView = p.CalendarView.Timetable;
	}
}


//Display calendar
calendar.render();

