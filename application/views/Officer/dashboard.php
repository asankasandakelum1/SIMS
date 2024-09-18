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
                    <li><a href="<?= base_url('Officer/dashboard_Home') ?>" class="btn-sidebar active" id="Link1">DASHBOARD</a></li>
                    <li><a href="<?= base_url('Officer/assigncaptain') ?>" class="btn-sidebar"id="Link2">ASSIGN SHIP CAPTAIN</a></li>
                    <li><a href="<?= base_url('Officer/issueArrivalClearance') ?>" class="btn-sidebar" id="Link3">ISSUE ARRIVAL CLEARANCE</a></li>
                    <li><a href="<?= base_url('Officer/issueShorePass') ?>" class="btn-sidebar"id="Link4">ISSUE SHORE PASS</a></li>
                    <li><a href="<?= base_url('Officer/searchCrew') ?>" class="btn-sidebar"id="Link5">CREW SEARCH</a></li>

                </ul>
            </div>



    <div class="col-md-10 mx-auto text-center">
        <h1 class="mt-4">IMMIGRATION DASHBOARD</h1>
        <hr>




