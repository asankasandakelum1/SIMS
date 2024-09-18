<?php include 'dashboard.php';?>



    <div class="form-group" id="crew_Registration">
        <?php echo form_open('Agent/add_crew_details', 'class="crew-form"'); ?>

        <h3> Crew Registration </h3>
        <hr>

        <div class="errors">
            <?php if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            } ?>
            <?php echo validation_errors(); ?>
        </div>

        <div class="form-group">
            <label for="InputCrewCount">Crew Count</label>
            <input type="number" class="form-control" id="InputCrewCount" placeholder="Enter Crew Count" name="crewcount">
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

                    // Sort the $voyages array based on arrival dates
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



        <table class="voyagetable table-bordered" id="bulkVoyageTable">
            <thead>
            <tr>
                <th>Voyage ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nationality</th>
                <th>Rank</th>
                <th>Gender</th>
                <th>Passport No</th>
                <th>Passport Expiry Date</th>
                <th>CDC No</th>
                <th>CDC Expiry Date</th>

            </tr>
            </thead>
            <tbody>
            <tbody id="bulkVoyageTableBody">
            <!-- Rows will be dynamically generated here -->
            </tbody>
        </table>


        <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
        <br>
        <br>
        <?php echo form_close(); ?>
    </div>

    <script>
        // Function to dynamically generate or remove rows based on Crew Count
        function updateTableRows() {
            var crewCount = document.getElementById('InputCrewCount').value;
            var tableBody = document.getElementById('bulkVoyageTableBody');

            // Clear existing rows
            tableBody.innerHTML = '';

            // Generate new rows based on Crew Count
            for (var i = 0; i < crewCount; i++) {
                var newRow = '<tr>' +
                    '<td>' +
                    '<input type="text" class="form-control voyage-id" name="voyage_id[]" value="" disabled>' + // Hidden input for voyage_id
                    '</td>' +
                    '<td><input type="text" class="form-control" name="fname[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="text" class="form-control" name="lname[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="text" class="form-control" name="nationality[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="text" class="form-control" name="rank[]"  style="text-transform: uppercase"></td>' +
                    '<td>' +
                    '<select class="form-control" name="gender[]">' +
                    '<option value="Male">M</option>' +
                    '<option value="Female">F</option>' +
                    '</select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control" name="pptno[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="date" class="form-control" name="pptexpiry[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="text" class="form-control" name="cdcno[]" style="text-transform: uppercase"></td>' +
                    '<td><input type="date" class="form-control" name="cdcexpiry[]" style="text-transform: uppercase"></td>' +
                    '</tr>';

                tableBody.innerHTML += newRow;
            }
        }

        // Function to update hidden input field with selected voyage_id
        function updateVoyageId(select) {
            var selectedVoyageId = select.value;
            var hiddenInputs = document.querySelectorAll('.voyage-id');

            hiddenInputs.forEach(function(input) {
                input.value = selectedVoyageId;
            });

            // Update the label with selected voyage ID
            document.getElementById('selectedVoyageLabel').textContent = selectedVoyageId;
        }

        // Call the function initially and on input change
        updateTableRows();
        document.getElementById('InputCrewCount').addEventListener('input', updateTableRows);

        // Add event listener to voyage_selection dropdown
        document.getElementById('voyage_selection').addEventListener('change', function() {
            updateVoyageId(this);
        });

    </script>

    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#Link4").addClass("active");

        });
    </script>


<?php include 'Files/footer.php';
