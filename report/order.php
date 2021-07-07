<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','qwertyuio0@','food_order');
$res=mysqli_query($con,"select * from tbl_order");
date_default_timezone_set('Asia/Calcutta');
$time = date("l jS F Y h:i:s A");
$html='<h1 style="font-family: Arial">Order Summary </h1>'.'<h3>'."\n".'Report Generated at: '.$time.'</h3>'."\n";
if(mysqli_num_rows($res)>0){
	$html.='<style></style><table class="table" style="font-family: Arial" >';
		$html.='<tr><td>UID</td><td>Total</td><td>Order Date</td></tr>Customer Name</td><td>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['id'].'</td><td>'.$row['total'].'</td><td>'.$row['order_date'].'</td></tr>'.$row['customer_name'].'</td></tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>