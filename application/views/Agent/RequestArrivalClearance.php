<?php include 'dashboard.php';?>


    <div class="form-group" id="Request_Arrival_Clearance', 'class="clearance-form"'); ?>
        <?php echo form_open('Agent/addArrivalClearance_Request', 'class="clearance-form"'); ?>
        <h3> REQUEST ARRIVAL CLEARANCE </h3>
        <hr>

        <div class="errors">
            <?php if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            } ?>
            <?php echo validation_errors(); ?>
        </div>

        <div class="form-group" id="Voyage_Select_Dropdown">
            <label for="ShipName">Select Voyage</label><br>

            <select class="form-control" id="voyage_selection" name="voyage_select">
                <option selected value=""></option>
                <?php
                if (isset($voyages)) {
                    // Create a function to compare arrival dates
                    function compareArrivalDates($b, $a) {
                        return strtotime($a->arr_date) - strtotime($b->arr_date);
                    }
                    // Sort voyages as per arrival dates
                    usort($voyages, 'compareArrivalDates');

                    foreach ($voyages as $voyage) {
                        echo '<option value="' . $voyage->voyage_id . '">' . $voyage->ship_name . ' - ' . $voyage->arr_date . '</option>';
                    }
                } else {
                    echo '<option value="">No Ship Name Found</option>';
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
        <?php echo form_close(); ?>
    </div>


    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#Link5").addClass("active");

        });
    </script>



<?php include 'Files/footer.php';
