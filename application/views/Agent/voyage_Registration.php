<?php include 'dashboard.php';?>



    <div class="form-group" id="voyage_Registration" >
        <?php echo form_open('Agent/addvoyage_details', 'class="voyage-form"');?>



        <h3> Voyage Registration </h3>
        <hr>

        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
    <div class="row">
        <div class="col-md-4">

        <div class="form-group" id="shipnameDropdown">
                <label for="ShipName">Ship Name</label><br>


                <select class="form-control" id="ShipName" name="shipid">
                    <option selected value=""></option>
                    <?php
                    if (isset($ships)) {

                        foreach ($ships as $ship) {
                            echo '<option value="' . $ship->ship_id . '">' . $ship->ship_name . '</option>';
                        }
                    } else {
                        echo '<option value="">No Ship Name Found</option>';
                    }
                    ?>
                </select>
        </div>

        <div class="form-group">
            <label for="InputArrivalDate">Arrival Date</label>
            <input type="date" class="form-control" id="InputArrivalDate" name="arrivaldate">
        </div>
        <div class="form-group">
            <label for="InputArrivalTime">Arrival Time</label>
            <input type="time" class="form-control" id="InputArrivalTime" name="arrivaltime">
        </div>
        <div class="form-group">
            <label for="InputDepartureDate">Departure Date</label>
            <input type="date" class="form-control" id="InputDepartureDate" name="departuredate">
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
            <label for="InputLastPort">Last Port</label>
            <input type="text" class="form-control" id="InputLastPort" name="lastport" placeholder="Enter Last Port" style="text-transform: uppercase">
        </div>
        <div class="form-group">
            <label for="InputNextPort">Next Port</label>
            <input type="text" class="form-control" id="InputNextPort" name="nextport" placeholder="Enter Next Port" style="text-transform: uppercase">
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
            <label for="InputCrewCount">Crew Count</label>
            <input type="number" class="form-control" id="InputCrewCount" name="crewcount" >
        </div>
        <div class="form-group">
            <label for="InputSignOnCount">Crew SignOn Count</label>
            <input type="number" class="form-control" id="InputSignOnCount" name="signoncount">
        </div>
        <div class="form-group">
            <label for="InputSignOffCount">Crew SignOff Count</label>
            <input type="number" class="form-control" id="InputSignOffCount" name="signoffcount">
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
            <label for="InputPaxCount">Passengers Count</label>
            <input type="number" class="form-control" id="InputPaxCount" name="paxcount">
        </div>
        <div class="form-group">
            <label for="InputPaxOnCount">Passenger On Count</label>
            <input type="number" class="form-control" id="InputPaxOnCount" name="paxoncount">
        </div>
        <div class="form-group">
            <label for="InputPaxOffCount">Passenger Off Count</label>
            <input type="number" class="form-control" id="InputPaxOffCount" name="paxoffcount">
        </div>
        <div class="form-group">
            <label for="InputStowawayCount">Stowaway Count</label>
            <input type="number" class="form-control" id="InputStowawayCount" name="stowcount">
        </div>
        </div>

    </div>



        <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
        <?php echo form_close(); ?>

    </div>


    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#Link3").addClass("active");

        });
    </script>


<?php include 'Files/footer.php';
