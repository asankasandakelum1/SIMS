<?php include 'dashboard.php';?>

    <div class="table-responsive" id="CewViewArrivalClearance_table" >

        <h3> CREW CLEARANCE CHECK </h3>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="CrewViewArrivalClearanceTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Crew ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Rank</th>
                <th>Nationality</th>
                <th>Passport No</th>
                <th>Passport Expiry Date</th>
                <th>CDC No</th>
                <th>CDC Expiry Date</th>



            </tr>
            </thead>
            <tbody>
            <?php foreach ($crew_members as $crewmember): ?>
                <tr>
                    <td><?php echo $crewmember->crewid; ?></td>
                    <td><?php echo $crewmember->fname; ?></td>
                    <td><?php echo $crewmember->lname; ?></td>
                    <td><?php echo $crewmember->gender; ?></td>
                    <td><?php echo $crewmember->rank; ?></td>
                    <td><?php echo $crewmember->nationality; ?></td>
                    <td><?php echo $crewmember->pptno; ?></td>
                    <td><?php echo $crewmember->pptexdate; ?></td>
                    <td><?php echo $crewmember->cdcno; ?></td>
                    <td><?php echo $crewmember->cdcexdate; ?></td>



                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h3> SECURITY ISSUE REPORT </h3>

        <table id="watchlistTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Crew ID</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($watchlist as $watch): ?>
                <tr>
                    <td><?php echo $watch->crewid; ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#").addClass("active");

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#CrewViewArrivalClearanceTable').DataTable();
        });
    </script>

<?php include 'Files/footer.php';
