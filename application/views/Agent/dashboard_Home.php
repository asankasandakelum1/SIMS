<?php include 'dashboard.php';?>

    <div>

        <a href="<?= base_url('Agent/ship_Registration') ?>" class="image-button">
            <img src="<?= base_url('Assets/SHIP_REGISTER.png') ?>" alt="Button 1" width="100" height="50">
            <span class="button-text">SHIP REGISTRATION</span>
        </a>


        <a href="<?= base_url('Agent/voyage_Registration') ?>" class="image-button">
            <img src="<?= base_url('Assets/VOYAGE_REGISTER.jpeg') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">VOYAGE REGISTRATION</span>
        </a>

        <a href="<?= base_url('Agent/crew_Registration') ?>" class="image-button">
            <img src="<?= base_url('Assets/CREW_REGISTER.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">CREW REGISTRATION</span>
        </a>

        <a href="<?= base_url('Agent/RequestArrivalClearance') ?>" class="image-button">
            <img src="<?= base_url('Assets/REQUEST_SHIP_CLEARANCE.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">REQUEST SHIP ARRIVAL CLERARANCE</span>
        </a>

        <a href="<?= base_url('Agent/approvedClearance') ?>" class="image-button">
            <img src="<?= base_url('Assets/APPROVED_CLEARANCE.jpeg') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">APPROVED ARRIVAL CLEARANCE</span>
        </a>


    </div>


<?php include 'Files/footer.php';
