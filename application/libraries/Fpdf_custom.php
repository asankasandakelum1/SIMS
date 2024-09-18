<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/fpdf/fpdf.php';

class Fpdf_custom extends FPDF
{
    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
    }
}

