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
                    <li><a href="<?= base_url('Agent/dashboard_Home') ?>" class="btn-sidebar active" id="Link1">DASHBOARD</a></li>
                    <li><a href="<?= base_url('Agent/ship_Registration') ?>" class="btn-sidebar" id="Link2">SHIP REGISTRATION</a></li>
                    <li><a href="<?= base_url('Agent/voyage_Registration') ?>" class="btn-sidebar"id="Link3">VOYAGE REGISTRATION</a></li>
                    <li><a href="<?= base_url('Agent/crew_Registration') ?>" class="btn-sidebar"id="Link4">CREW REGISTRATION</a></li>
                    <li><a href="<?= base_url('Agent/RequestArrivalClearance') ?>" class="btn-sidebar"id="Link5">REQUEST SHIP ARRIVAL CLEARANCE</a></li>
                    <li><a href="<?= base_url('Agent/approvedClearance') ?>" class="btn-sidebar"id="Link6">APPROVED ARRIVAL CLEARANCE</a></li>

                </ul>
            </div>



    <div class="col-md-10 mx-auto text-center">
        <h1 class="mt-4">AGENT DASHBOARD</h1>
        <hr>




