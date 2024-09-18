<?php include 'dashboard.php';?>


    <div class="table-responsive" id="ArrivalClearance_table" >

        <h3> CREW SEARCH </h3>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="crewSearchTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Crew ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Passport No</th>
                <th>Passport Expiry Date</th>
                <th>CDC No</th>
                <th>CDC Expiry Date</th>
                <th>Ship Name</th>
                <th>Rank</th>
                <th>Arrival Dates</th>
                <th>Departure Dates</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($shcrewmembers as $shcrewmember): ?>
                <tr>
                    <td><?php echo $shcrewmember->crewid; ?></td>
                    <td><?php echo $shcrewmember->fname; ?></td>
                    <td><?php echo $shcrewmember->lname; ?></td>
                    <td><?php echo $shcrewmember->gender; ?></td>
                    <td><?php echo $shcrewmember->nationality; ?></td>
                    <td><?php echo $shcrewmember->pptno; ?></td>
                    <td><?php echo $shcrewmember->pptexdate; ?></td>
                    <td><?php echo $shcrewmember->cdcno; ?></td>
                    <td><?php echo $shcrewmember->cdcexdate; ?></td>
                    <td><?php echo $shcrewmember->ship_name; ?></td>
                    <td><?php echo $shcrewmember->rank; ?></td>
                    <td><?php echo $shcrewmember->arr_date; ?></td>
                    <td><?php echo $shcrewmember->dep_date; ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>


<script>
    $(document).ready(function(){
        // Set user_roles_link as active on page load
        $(".btn-sidebar").removeClass("active");
        $("#Link5").addClass("active");

    });
</script>
<script>
    $(document).ready(function() {
        $('#crewSearchTable').DataTable();
    });
</script>



<?php include 'Files/footer.php';
