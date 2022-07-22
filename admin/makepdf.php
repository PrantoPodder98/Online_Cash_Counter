<?php


require 'calculation.php';


require_once __DIR__ . '/vendor/autoload.php';

		$name = $pdf_info['name'];
		$phone = $pdf_info['phone'];
		$pmode = $pdf_info['pmode'];
		$address =$pdf_info['address'];
		$products =$pdf_info['products'];
		$grand_total =$pdf_info['amount_paid'];



//create new pdf instance 
$mpdf = new \Mpdf\Mpdf();
//install mpdf by using cmd prmpt
//without using mpdf won't work
//watch can this video how to install it
//https://www.youtube.com/watch?v=MnIps8Yc8CY

//create our pdf 

$data = '';
$data .= '<h1>__________________ CASHMEMO ________________</h1>';
//add data

$data .= '<br />';
$data .= '<strong>Name     : </strong>' . $name .'<br />'; 
$data .= '<strong>Phone    : </strong>' . $phone .'<br />';
$data .= '<strong>payment mode    : </strong>' . $pmode .'<br />';	
$data .= '<strong>Address  : </strong>' . $address .'<br />';
$data .= '<strong>Products : </strong>' . $products .'<br />';
$data .= '<strong>Total Amount : </strong>' . $grand_total .'<br />';



//write pdf
$mpdf->writeHTML($data);

//output browser 
$mpdf->output('Cashmemo.pdf', 'D');


?>