<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {

    }

    public function dashboard_Home()
    {
        $this->load->view('Agent/dashboard_Home');
    }

    // Agent Company Registration Function on Admin Dashbaord
    public function agentRegister()
    {
        $this->form_validation->set_rules('agentname', 'Agent Company Name', 'required');
        $this->form_validation->set_rules('agentaddress', 'Company Address', 'required');
        $this->form_validation->set_rules('contactperson', 'Contact Person', 'required');
        $this->form_validation->set_rules('contactno', 'Contact No', 'required');



        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/Ship_AgentReg');
        }
        else
        {
            $this->load->model('Model_shipagent');

            $response = $this->Model_shipagent->insertAgentCompanydata();

            if ($response) {
                $this->session->set_flashdata('msg', 'Agent Company Successfully Added.');
                redirect('Admin/Ship_AgentReg');
            } else {
                $this->session->set_flashdata('msg', 'Something went Wrong');
                redirect('Admin/Ship_AgentReg');
            }

        }
    }

    public function ship_AgentView()
    {
        $this->load->model('Model_shipagent');
        $data['companies'] = $this->Model_shipagent->getAgents();
        $this->load->view('Admin/ship_AgentView', $data); // URL for View
    }

    public function deleteCompany($agentId)
    {
        $this->load->model('Model_shipagent');

        $response = $this->Model_shipagent->deleteCompany($agentId);

        if ($response) {
            $this->session->set_flashdata('msg', 'Company Details Deleted.');
            redirect('Agent/ship_AgentView'); // Agent Controller redirect to function
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Agent/ship_AgentView'); // Agent Controller redirect to function
        }
    }

    // ship Registration Form on Agent Dashboard
    public function ship_Registration()
    {

        $this->load->view('Agent/ship_Registration.php');
    }

    //ship Registration Function on Agent Dashboard
    public function addship_details()
    {
        $this->form_validation->set_rules('shipname', 'Ship Name', 'required');
        $this->form_validation->set_rules('shipflag', 'Ship Flag', 'required');
        $this->form_validation->set_rules('imono', 'IMO No', 'required');
        $this->form_validation->set_rules('companyname', 'Company Name','required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Agent/ship_Registration');
        }
        else
        {
            $this->load->model('Model_ship');


            $response = $this->Model_ship->insertShipdata();

            if ($response) {
                $this->session->set_flashdata('msg', 'Ship Successfully Added.');
                redirect('Agent/ship_Registration');
            } else {
                $this->session->set_flashdata('msg', 'Something went Wrong');
                redirect('Agent/ship_Registration');
            }

        }

    }

    public function voyage_Registration()
    {
        $this->load->model('Model_ship');
        $Agent = $this->session->userdata('agentname');

        $data['ships'] = $this->Model_ship->getShips($Agent);
        $this->load->view('Agent/voyage_Registration.php', $data);

    }
    public function addvoyage_details()
    {


        $this->form_validation->set_rules('shipid', 'Ship Name', 'required');
        $this->form_validation->set_rules('arrivaldate', 'Arrival Date', 'required');
        $this->form_validation->set_rules('arrivaltime', 'Arrival Time', 'required');
        $this->form_validation->set_rules('departuredate', 'Departure Date', 'required');
        $this->form_validation->set_rules('nextport', 'Next Port', 'required');
        $this->form_validation->set_rules('lastport', 'Last Port', 'required');


        if ($this->form_validation->run() == FALSE)
        {

            $this->load->model('Model_ship');
            $Agent = $this->session->userdata('agentname');

            $data['ships'] = $this->Model_ship->getShips($Agent);
            $this->load->view('Agent/voyage_Registration.php', $data);
        }
        else
        {
            $this->load->model('Model_voyage');

            $response = $this->Model_voyage->insertVoyagedata();

            if ($response) {
                $this->session->set_flashdata('msg', 'Voyage Successfully Added.');
                redirect('Agent/voyage_Registration');
            } else {
                $this->session->set_flashdata('msg', 'Something went Wrong');
                redirect('Agent/voyage_Registration');
            }

        }
    }

    public function crew_Registration()
    {
        $this->load->model('Model_voyage');
        $Agent = $this->session->userdata('agentname');

        $data['voyages'] = $this->Model_voyage->getVoyages($Agent);
        $this->load->view('Agent/crew_Registration.php',$data);
    }

public function add_crew_details()
{

    $this->load->model('Model_crew');
    // Get form data
    $crewcount = $this->input->post('crewcount');
    $voyage_id = $this->input->post('voyage_select');
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $nationality = $this->input->post('nationality');
    $rank = $this->input->post('rank');
    $gender = $this->input->post('gender');
    $pptno = $this->input->post('pptno');
    $pptexpiry = $this->input->post('pptexpiry');
    $cdcno = $this->input->post('cdcno');
    $cdcexpiry = $this->input->post('cdcexpiry');

    // Loop through the crew data
    for ($i = 0; $i < count($fname); $i++) {
        $data = array(
            'voyageid' => $voyage_id,
            'fname' => $fname[$i],
            'lname' => $lname[$i],
            'nationality' => $nationality[$i],
            'rank' => $rank[$i],
            'gender' => $gender[$i],
            'pptno' => $pptno[$i],
            'pptexdate' => $pptexpiry[$i],
            'cdcno' => $cdcno[$i],
            'cdcexdate' => $cdcexpiry[$i],
            'reqshorepass' => 'NO'
        );

        // Insert crew data into database
        $response = $this->Model_crew->insertCrewdata($data);

        if (!$response) {
            // If insertion fails, set flash message and redirect
            $this->session->set_flashdata('msg', 'Failed to add crew data.');
            redirect('Agent/crew_Registration');
        }
    }

    // If all insertions were successful, set success flash message and redirect
    $this->session->set_flashdata('msg', 'Crew Members Successfully Added.');
    redirect('Agent/crew_Registration');


}

    public function RequestArrivalClearance()
    {
        $this->load->model('Model_voyage');
        $Agent = $this->session->userdata('agentname');

        $data['voyages'] = $this->Model_voyage->getVoyages($Agent);
        $this->load->view('Agent/RequestArrivalClearance.php',$data);
    }

    //Add Arrival Clearance Request Function on Agent Dashboard
    public function addArrivalClearance_Request()
    {
        $this->form_validation->set_rules('voyage_select', 'Voyage', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Agent/RequestArrivalClearance');
        }
        else
        {
            $this->load->model('Model_clearance');
            $response = $this->Model_clearance->requestClearance();

            if ($response) {
                $this->session->set_flashdata('msg', 'Clearance Request Successfully Sent.');
                redirect('Agent/RequestArrivalClearance');
            } else {
                $this->session->set_flashdata('msg', 'Something went Wrong');
                redirect('Agent/RequestArrivalClearance');
            }

        }

    }

    public function approvedClearance()
    {
        $this->load->model('Model_clearance');
        $Agent = $this->session->userdata('agentname');

        $data['clearances'] = $this->Model_clearance->getApprovedClearances($Agent);
        $this->load->view('Agent/approvedClearance.php',$data);
    }
//print functions
    public function PrintClearance($clearance_id)
    {
        // Load the Model_clearance model
        $this->load->model('Model_clearance');

        // Get data for the PDF
        $clearance_data = $this->Model_clearance->getClearanceData($clearance_id);

        // Load the Fpdf_custom library
        $this->load->library('Fpdf_custom');

        // Create new PDF document
        $pdf = new Fpdf_custom();
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('Arial', 'B', 12);

        // Add content to the PDF
        foreach ($clearance_data as $clearance) {
            $pdf->Cell(0, 10, "Clearance ID: " . $clearance->clearance_id, 0, 1);
            $pdf->Cell(0, 10, "Voyage ID: " . $clearance->voyage_id, 0, 1);
         //   $pdf->Cell(0, 10, "Ship Name: " . $clearance->ship_name, 0, 1);
         //   $pdf->Cell(0, 10, "Agent Name: " . $clearance->agentcompanyname, 0, 1);
         //   $pdf->Cell(0, 10, "Arrival Date: " . $clearance->arr_date, 0, 1);
         //   $pdf->Cell(0, 10, "Arrival Time: " . $clearance->arr_time, 0, 1);
            $pdf->Cell(0, 10, "Clearance Status: " . $clearance->status, 0, 1);
            $pdf->Cell(0, 10, "Remarks: " . $clearance->remarks, 0, 1);
            $pdf->Ln();
        }

        // Output the PDF to the browser
        $pdf->Output('clearance.pdf', 'I');
    }

    public function GetClearanceData()
    {
        $clearance_id = $this->input->post('clearance_id');

        // Load the Model_clearance model
        $this->load->model('Model_clearance');

        // Get the clearance data
        $clearance_data = $this->Model_clearance->getClearanceData($clearance_id);

        // Create HTML content to display in the new tab
        $html = '
    <html>
    <head>
        <title>Clearance Report</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f7f7f7;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #fff;
                border: 1px solid #ccc;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            .report-row {
                margin-bottom: 10px;
            }
            .report-label {
                font-weight: bold;
                display: inline-block;
                width: 150px;
            }
            .report-value {
                display: inline-block;
            }
            .print-button {
                text-align: center;
                margin-top: 20px;
            }
            .print-button button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                font-size: 12px;
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class="container">
        
            <h1>ARRIVAL CLEARANCE REPORT</h1>';

        foreach ($clearance_data as $clearance) {
            $html .= '
            <div class="report-row">
                <span class="report-label">Clearance ID:</span>
                <span class="report-value">' . $clearance->clearance_id . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Voyage ID:</span>
                <span class="report-value">' . $clearance->voyage_id . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Ship Name:</span>
                <span class="report-value">' . $clearance->ship_name . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Agent Name:</span>
                <span class="report-value">' . $clearance->agentcompanyname . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Arrival Date:</span>
                <span class="report-value">' . $clearance->arr_date . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Arrival Time:</span>
                <span class="report-value">' . $clearance->arr_time . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Clearance Status:</span>
                <span class="report-value">' . $clearance->status . '</span>
            </div>
            
            <hr class="report-row">';
        }

        $html .= '
            <div class="print-button">
                <button onclick="window.print()">Print Report</button>
            </div>
            <div class="footer">
                Generated on ' . date('Y-m-d H:i:s') . ' by SL Immigration
            </div>
        </div>
    </body>
    </html>';

        // Set the content type to PDF
        header('Content-Type: application/pdf');

        // Output the HTML content
        echo $html;
    }












    /*
    public function addShip() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ship_name', 'Ship Name', 'required');
        $this->form_validation->set_rules('ship_flag', 'Ship Flag', 'required');
        $this->form_validation->set_rules('imo_no', 'IMO Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Agent/dashboard');
        } else {
            $shipData = array(
                'ship_name' => $this->input->post('ship_name'),
                'ship_flag' => $this->input->post('ship_flag'),
                'imo_no' => $this->input->post('imo_no')
            );

            $result = $this->Model_ship->addShip($shipData);

            if ($result) {
                redirect('Agent/index');
            } else {
                $data['error'] = 'Failed to add ship';
                $this->load->view('Agent/dashboard', $data);
            }
        }
    }

    public function addVoyage() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ship_name', 'Ship Name', 'required');
        $this->form_validation->set_rules('arr_date', 'Arrival Date', 'required');
        $this->form_validation->set_rules('arr_time', 'Arrival Time', 'required');
        $this->form_validation->set_rules('dep_date', 'Departure Date', 'required');
        $this->form_validation->set_rules('lastport', 'Last Port', 'required');
        $this->form_validation->set_rules('nextport', 'Next Port', 'required');
        $this->form_validation->set_rules('crewcount', 'Crew Count', 'required');
        $this->form_validation->set_rules('signon_count', 'Sign On Count', 'required');
        $this->form_validation->set_rules('signoff_count', 'Sign Off Count', 'required');
        $this->form_validation->set_rules('paxon_count', 'Passenger On Count', 'required');
        $this->form_validation->set_rules('paxoff_count', 'Passenger Off Count', 'required');
        $this->form_validation->set_rules('stow_count', 'Stow Count', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Agent/dashboard');
        } else {
            $voyageData = array(
                'ship_name' => $this->input->post('ship_name'),
                'arr_date' => $this->input->post('arr_date'),
                'arr_time' => $this->input->post('arr_time'),
                'dep_date' => $this->input->post('dep_date'),
                'lastport' => $this->input->post('lastport'),
                'nextport' => $this->input->post('nextport'),
                'crewcount' => $this->input->post('crewcount'),
                'signon_count' => $this->input->post('signon_count'),
                'signoff_count' => $this->input->post('signoff_count'),
                'paxon_count' => $this->input->post('paxon_count'),
                'paxoff_count' => $this->input->post('paxoff_count'),
                'stow_count' => $this->input->post('stow_count')
            );

            // Call the Model method to add voyage
            $result = $this->Model_voyage->addVoyage($voyageData);

            if ($result) {
                redirect('Agent/index');
            } else {
                $data['error'] = 'Failed to add voyage';
                $this->load->view('Agent/dashboard', $data);
            }
        }
    }

    public function requestClearance() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('voyage_id', 'Voyage ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Agent/dashboard');
        } else {
            $voyage_id = $this->input->post('voyage_id');

            // Here you can perform additional logic if needed
            // For example, sending a notification to the Officer

            redirect('Agent/index'); // Redirect back to dashboard after submission
        }
    }*/

    // Add more methods as needed
}
