<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'home') ? 'class="active"' : '';?>><a href="<?php echo base_url('home'); ?>"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-employess') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-employess'); ?>"><i class="fa fa-user"></i> Manage Employees</a></li>
<!--        <li>
            <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
        </li>
        <li>
            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
        </li>
        <li>
            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
        </li>
        <li>
            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
        </li>-->
    </ul>
</div>