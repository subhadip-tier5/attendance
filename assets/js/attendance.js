(function($){
    $(function(){
        $('#clockin').click(function(){
            var user_id = $(this).data('id-user');
            $.ajax({
                url: 'ajax/clockin',
                type:'POST',
                data: {user_id: user_id},
                success: function(response){
                    console.log(response);
                    var result = $.parseJSON(response);
                    if(result.status == 'success'){
                        $('#clockin_div').unwrap('a');
                        $('#clockin_div').removeClass('panel-red').addClass('panel-green');
                        $('#clockin_div .huge').text(result.clockin_time + ' HRS');
                        $('#clockin_div .today_date').text(result.clockin_date);
                    }else if(result.status == 'error'){
                        
                    }
                }
            });
        });
        
        $('#clockout').click(function(){
            if(confirm('Are you sure want to leave for the day?') == false){
                return false;
            }
            var user_id = $(this).data('id-user');
            $.ajax({
                url: 'ajax/clockout',
                type:'POST',
                data: {user_id: user_id},
                success: function(response){
                    console.log(response);
                    var result = $.parseJSON(response);
                    if(result.status == 'success'){
                        $('#clockout_div').unwrap('a');
                        $('#clockout_div').removeClass('panel-red').addClass('panel-green');
                        $('#clockout_div .huge').text(result.clockout_time + ' HRS');
                        $('#clockout_div .today_date').text(result.clockout_date);
                    }else if(result.status == 'error'){
                        alert(result.message);
                        return false;
                    }
                }
            });
        });
        
        $(document).delegate('.breaks', 'click', function(){
            var $this = $(this);
            var break_type = $this.data('break-type');
            var break_status = $this.data('break-status');
            var user_id = $this.data('user-id');
            
            $.ajax({
                url: 'ajax/storeAbreak',
                type:'POST',
                data: {user_id: user_id, break_type: break_type, break_status: break_status},
                success: function(response){
                    var result = $.parseJSON(response);
                    if(result.status == 'success'){
                        $('#start_break_' + break_type).html('Break time started at: <strong>' + result.break_start_time + ' HRS</strong>');
                        $('#start_break_div_' + break_type).unwrap('a');
                        $('#end_break_time_' + break_type).text('Break end time at: ' + result.break_end_time + ' HRS');
                        $('#end_break_time_div_' + break_type).removeClass('panel-green').addClass('panel-yellow');
                        $('#end_break_div_' + break_type).removeClass('panel-green').addClass('panel-red').wrap('<a style="text-decoration: none;" href="javascript:void(0);" class="end_breaks" data-break-type="' + break_type + '" data-break-status="1" data-user-id="' + user_id + '">');
                        $('#end_break_' + break_type).html('End break');
                        $('#clock_div_' + break_type).removeClass('panel-green').addClass('panel-yellow');
                        $('#clock_' + break_type).countdown(result.countdown_endtime, {elapse: true})
                        .on('update.countdown', function(event) {
                            if(event.elapsed) {
                                $('#clock_div_' + break_type).removeClass('panel-yellow').addClass('panel-red');
                                $(this).html(event.strftime('%M:%S late'));
                            }else{
                                $(this).html(event.strftime('%M:%S left'));
                            }
                        });
                    }else if(result.status == 'error'){

                    }
                }
            });
        });
        
        $(document).delegate('.end_breaks', 'click', function(){
            var $this = $(this);
            var break_type = $this.data('break-type');
            var break_status = $this.data('break-status');
            var user_id = $this.data('user-id');
            
            $.ajax({
                url: 'ajax/storeAbreak',
                type:'POST',
                data: {user_id: user_id, break_type: break_type, break_status: break_status},
                success: function(response){
                    var result = $.parseJSON(response);
                    if(result.status == 'success'){
                        $('#end_break_div_' + break_type).unwrap('a').removeClass('panel-red').addClass('panel-green');
                        $('#end_break_' + break_type).html('Break time ended at: <strong>' + result.break_start_time + ' HRS</strong>');
                        $('#clock_' + break_type).countdown('stop');
                    }else if(result.status == 'error'){

                    }
                }
            });
        });
    });
})(jQuery);

