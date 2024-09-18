<?php include 'Files/header.php';
?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="profile">

                    <h4><?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname'); ?></h4>
                    <p><?php echo $this->session->userdata('usercategory'); ?></p>

                </div>
                <ul>
                    <li><a href="<?= base_url('Shipcaptain/dashboard_Home') ?>" class="btn-sidebar active" id="LINK1">DASHBOARD</a></li>
                    <li><a href="<?= base_url('Shipcaptain/assignship') ?>" class="btn-sidebar" id="LINK2">ASSIGN TO SHIP</a></li>
                    <li><a href="<?= base_url('Shipcaptain/request_shorepass') ?>" class="btn-sidebar"id="LINK3">REQUEST SHORE PASSES</a></li>
                    <li><a href="<?= base_url('Shipcaptain/approved_shorepass') ?>" class="btn-sidebar"id="LINK4">APPROVED SHORE PASSES</a></li>

                </ul>
            </div>



    <div class="col-md-10 mx-auto text-center">
        <h1 class="mt-4" align="center">SHIP CAPTAIN DASHBOARD</h1>
        <hr>




