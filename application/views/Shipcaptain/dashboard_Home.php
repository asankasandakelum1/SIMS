<?php include 'dashboard.php';?>

    <div>

        <a href="<?= base_url('Shipcaptain/assignship') ?>" class="image-button">
            <img src="<?= base_url('Assets/assign_ship.jpeg') ?>" alt="Button 1" width="100" height="50">
            <span class="button-text">ASSIGN TO SHIP</span>
        </a>


        <a href="<?= base_url('Shipcaptain/request_shorepass') ?>" class="image-button">
            <img src="<?= base_url('Assets/request shore pass.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">REQUEST SHORE PASSES</span>
        </a>

        <a href="<?= base_url('Shipcaptain/approved_shorepass') ?>" class="image-button">
            <img src="<?= base_url('Assets/approved_shorepass.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">APPROVED SHORE PASSES</span>
        </a>


    </div>
    <script>
        $(document).ready(function(){

            $(".btn-sidebar").removeClass("active");
            $("#LINK1").addClass("active");

        });
    </script>

<?php include 'Files/footer.php';
