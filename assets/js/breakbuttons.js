$(document).ready(function(){
    
   	$.getScript(BASE_URL + 'application/views/js/timerlib.js', function(){	

		//calling the timer javascript library and it is available all over the script body
		//the path needed to be specified manually as it was not taking, so it needs to be 
		//changed if the folder name is changed
    

//==============================================================



    	$.post('Employee/autoChangeButton', function(data){

    		$('#clockbtn').text(data);
    	});
//================================================================

		$.post('Employee/autoChangeBreakButton', function(data){

    		$('#breakbtn').text(data);
    		//alert(data);
    	});


//================================================================

		$.post('Employee/autoDisableOption', function(data){

			

    		data = data.split(",");

    		$(data[0]).prop('disabled', true);
            $(data[1]).prop('disabled', true);
            $(data[2]).prop('disabled', true);
    		

    	});
    

//===============================================================

		$.post('Employee/showTimerOnLoad', function(data){

			if(data)
			{
				$('#timer').timer({//timer starts
            				
            				duration: data,//time value returned from php file

                            countdown: true,
            				
            				callback: function() {
                				
                				$("#timeinfo").html("YOU ARE LATE");

                                //$('#timer').timer('remove');

            				}
        				});
			}

	
				
		});

	
//================================================================

	$('#breakbtn').click(function(){
		//alert('hey');
		if($('#clockbtn').text()=="Clock Out")//checking if he clocked in today or not
		{
			var opt = $('#opt').val();

			if (opt)//while taking break any proper option is selected or not 
			{
				
				//alert(opt1);

				if($('#breakbtn').text()=="break")//if the button is break
				{	
					
					$.post('Employee/inBreak',{opt: opt}, function(data){//inserting 1 in breakstatus and opt value in breakname
					

						$('#breakmsg').html(data);
						
						$('#breakbtn').text("work");//changing the button value to work
						
						
					});

					//time operation starts from here
					var totaltime;
					if(opt== 'fbreak')//setting the time according to the breakname
					{
						totaltime = '10s';
					}
					
					if(opt=='sbreak')
					{
						totaltime = '20s';
					}

					if(opt== 'lbreak')
					{
						totaltime = '10s';
					}

					$('#timer').timer({//timer starts
            				
            				duration: totaltime,//time value

                            countdown: true,
            				
            				callback: function() {
                				
                				$("#timeinfo").html("YOU ARE LATE");

                                                $('#timer').timer('remove');

            				}
        				});


					
					
					//var opt= $('#opt').val();
					//var opt= $('#opt1').val();
				}

				else//if the button is work
				{	
					
					$.post('Employee/showBreakName', function(data){//fetching the breakname from database

						if(opt==data)//checking if the breakname and selected option is same
						{
							$.post('Employee/endBreak', function(data){//inserting 0 in breakstatus column in attendence table

						 		$('#breakbtn').text("break");//changing the button value to break
						 		$('#breakmsg').html('Hope You have enjoyed your break');
						 		$("#"+opt).prop('disabled', true);
						 		$('#timer').timer('remove');
						 		
					 		});

					 		$.post('Employee/storeReturnTime',{opt: opt}, function(data){//inserting 0 in breakstatus column in attendence table

						 		
						 		//alert(data);
					 		});



                                

					 		
						}
				 	
				 		else
				 		{

						 	$('#breakmsg').html('You have not taken that break Choose Properly');
				 		}
					 	
				 		
				 	});
				 	
				}
			}
			else 
			{
				$('#breakmsg').html('Choose a break');
			}
		}
		else
		{
			$('#breakmsg').html('clockin first');
		}
	});

  });

});