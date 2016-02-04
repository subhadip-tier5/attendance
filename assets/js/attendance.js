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
                        $('#start_break_' + break_type).text('Break time starts at: ' + result.break_start_time + ' HRS');
                    }else if(result.status == 'error'){

                    }
                }
            });
            
        });
    });
})(jQuery);

