/**
*Author: Pedro Santana Minalla
*Date:23/09/2016
*/
$(document).ready(function () {

    var url = window.location; //url
    // Add active class to navigation links
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
    // Adds active class for relative and absolute hrefs
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    /*====================================================*/

	//Triggers datatable on employee table
    $('#employeeTable').DataTable({
      responsive: true
    });
    
    $('#tableQuizzes').DataTable({
      responsive: true
    });

    /*====================================================*/

    //Triggers datatable on template files
    $("#templateFilesTable").DataTable({
      responsive: true
    });

    /*======================================================*/

    //Triggers datatable on shifts table
    $("#shiftTable").DataTable({
      responsive: true
    });

    /*====================================================*/

    //Triggers datatable on training material table
    $("#trainingMaterialTable").DataTable({
      responsive: true
    }); 

    /*====================================================*/

    //Triggers datatable on training material table
    $("#eventTable").DataTable({
      responsive: true
    });

    //Triggers datatable on messages table
    $("#messagesTable").DataTable({
      responsive: true
    });

    

    //Triggers datatable on other shifts table
    $("#othersShiftTable").DataTable({
      responsive: true
    });


    //Triggers datatable on other timeoff table
    $("#timeOffTable").DataTable({
      responsive: true
    });

    /*====================================================*/

     //Displays event calendar   
    $('#calendar').fullCalendar({
        header: {
                left: 'prev,next today', //calendar  left buttons
                center: 'title',
                right: 'month,agendaWeek,agendaDay' //Calendar right buttons
            },
        defaultView: 'month',
        theme: true,
        eventSources: [
            {
                url: 'load/calendar', //Gets messages from database
                color: 'blue',    // Background on for an event!
                textColor: 'white'  // Text color of event!
            }
        ]
    });   

    /*====================================================*/ 
    
    //Datetime picker
    $('.datepicker').datetimepicker();
    //Adds class to data table search
    $('input[type=search]').addClass('form-control');

    //Autocomplete call for selecting a user when sending a message
    $('.searchUsername').autocomplete({
        minLength: 1,
        autoFocus: true,
        source: $('#route-url').val(),
        select: function(e, ui){ ui.item.value},
    });

    //Success alert call
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });

    //Danger alert call
    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#danger-alert").slideUp(500);
    });

    var count = 0; //Questions counter
    var qCount = 0;
    //Displays a question inputs when addQuestion button is click
    $("#addQuestion").click(function() {
        qCount += 1;
        $("#questions").append('<div class="form-group">' +
            '<label class="col-md-2 control-label">' +
            'Question #'+ qCount  + '</label><div class="col-md-8">' +
            '<input type="text" class="form-control" name="questions['+count+'][question]" required/>' +
            '</div></div><div class="form-group">' +
            '<label class="col-md-2 control-label">Wrong answer 1</label>' +
            '<div class="col-md-8"><input type="text" class="form-control" name="questions['+count+'][wrongAnswers][]" required/></div></div>' +
            '<div class="form-group"><label class="col-md-2 control-label">Wrong answer 2</label>' +
            '<div class="col-md-8"><input type="text" class="form-control" name="questions['+count+'][wrongAnswers][]" required/></div></div>' +
            '<div class="form-group"><label class="col-md-2 control-label">Wrong answer 3</label>' +
            '<div class="col-md-8"><input type="text" class="form-control" name="questions['+count+'][wrongAnswers][]" required/></div></div>' +
            '<div class="form-group"><label class="col-md-2 control-label">Correct Answer</label>' +
            '<div class="col-md-8"><input type="text" class="form-control" name="questions['+count+'][correctAnswers][]" required/></div>' +
            '</div>'
        );
        count++;
    });


});


