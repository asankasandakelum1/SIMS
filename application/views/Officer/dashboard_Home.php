<?php include 'dashboard.php';?>

    <div>

        <a href="<?= base_url('Officer/assigncaptain') ?>" class="image-button">
            <img src="<?= base_url('Assets/assign_captain.png') ?>" alt="Button 1" width="100" height="50">
            <span class="button-text">ASSIGN SHIP CAPTAIN</span>
        </a>


        <a href="<?= base_url('Officer/issueArrivalClearance') ?>" class="image-button">
            <img src="<?= base_url('Assets/issue_clearance.jpeg') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">ISSUE ARRIVAL CLEARANCE</span>
        </a>

        <a href="<?= base_url('Officer/issueShorePass') ?>" class="image-button">
            <img src="<?= base_url('Assets/approved_shorepass.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">ISSUE SHORE PASS</span>
        </a>

        <a href="<?= base_url('Officer/searchCrew') ?>" class="image-button">
            <img src="<?= base_url('Assets/crew_search.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">CREW SEARCH</span>
        </a>


    </div>

    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#Link1").addClass("active");

        });
    </script>
<?php include 'Files/footer.php';
