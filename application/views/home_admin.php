<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Break Status of employees on <?php echo date(DATE_DISPLAY_FORMAT); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Pre Lunch Break Status</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Emp Name</th>
                                <th>Break Taken at</th>
                                <th>Break Ended at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="response_for_break_1"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>