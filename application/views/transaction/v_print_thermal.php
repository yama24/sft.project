<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->config->item('app_name') ?> | <?php echo $page ?></title>
</head>

<body>
	<div id="div">
		<div style="font-size: 12px;">
			<center>
				<!-- <img src="<?php echo base_url() . 'assets/logo.png'; ?>" width="150px" alt="" srcset=""> -->
				<!-- <h2>Nama Toko</h2> -->
				<hr>
				<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;" onclick="printContent('div')"><b>LABEL PENGIRIMAN</b></p>
				<hr>
			</center>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;"><u>Informasi Pengirim</u></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><b><?php echo $label['Sender']; ?></b></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;"><?php echo "0" . $label['Num_sender']; ?></p>
			<br>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;"><u>Informasi Penerima</u></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><b><?php echo $label['Receiver']; ?></b></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><?php echo $label['Address_receiver']; ?></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><?php echo "0" . $label['Num_receiver']; ?></p>
			<br>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;"><u>Informasi Kurir</u></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><b><?php echo $label['Courier']; ?></b></p>
			<br>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 2px;"><u>Informasi Pesanan</u></p>
			<p style="padding: 0px; margin-top: 0px;margin-right: 0px;margin-left: 0px;margin-bottom: 0px;"><?php echo $label['Order']; ?></p>
			<hr>
		</div>
	</div>
	 <!-- <br>
	<button onclick="printContent('div')">Print</button> -->
	<script>
		function printContent(el) {
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
</body>

</html>