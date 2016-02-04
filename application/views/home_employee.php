<div id="page-wrapper">
    <div class="container-fluid">        
        <div class="page-header">
            <h1>Attendance</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <?php if(is_object($clockin)): ?>
                <div class="panel panel-green" id="clockin_div">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-clock-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo date(TIME_DISPLAY_FORMAT, strtotime($clockin->attend_at)); ?> HRS</div>
                                <div class="today_date"><?php echo date(DATE_DISPLAY_FORMAT_LONG, strtotime($clockin->attend_at)); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <a href="javascript:void(0);" id="clockin" data-id-user="<?php echo $this->session->userdata('id_user'); ?>">
                    <div class="panel panel-red" id="clockin_div">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Clock in</div>
                                    <div class="today_date"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-12">
                <?php if(is_object($clockout)): ?>
                <div class="panel panel-green" id="clockout_div">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-clock-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo date(TIME_DISPLAY_FORMAT, strtotime($clockout->attend_at)); ?> HRS</div>
                                <div class="today_date"><?php echo date(DATE_DISPLAY_FORMAT_LONG, strtotime($clockout->attend_at)); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <a href="javascript:void(0);" id="clockout" data-id-user="<?php echo $this->session->userdata('id_user'); ?>">
                    <div class="panel panel-red" id="clockout_div">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Clock out</div>
                                    <div class="today_date"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="page-header">
            <h1>Pre Lunch Break</h1>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <a style="text-decoration: none;" href="javascript:void(0);" class="breaks" data-break-type="1" data-break-status="0" data-user-id="<?php echo $this->session->userdata('id_user'); ?>">
                    <div class="panel panel-green" id="start_break_div_1">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="start_break_1">Take this break</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_time_div_1">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_time_1">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_div_1">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_1">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="clock_div_1">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="clock_1">Break Status</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <h1>Lunch Break</h1>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <a style="text-decoration: none;" href="javascript:void(0);" class="breaks" data-break-type="2" data-break-status="0" data-user-id="<?php echo $this->session->userdata('id_user'); ?>">
                    <div class="panel panel-green" id="start_break_div_2">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="start_break_2">Take this break</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_time_div_2">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_time_2">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_div_2">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_2">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="clock_div_2">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="clock_2">Break Status</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <h1>Post Lunch Break</h1>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <a style="text-decoration: none;" href="javascript:void(0);" class="breaks" data-break-type="3" data-break-status="0" data-user-id="<?php echo $this->session->userdata('id_user'); ?>">
                    <div class="panel panel-green" id="start_break_div_1">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="start_break_3">Take this break</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_time_div_3">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_time_3">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="end_break_div_3">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="end_break_3">Break status</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-green" id="clock_div_3">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="clock_3">Break Status</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->