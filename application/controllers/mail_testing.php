<?php defined('BASEPATH') OR exit('No direct script access allowed');
 /* define('BACKUP_DIR', './invoice' ) ;
 if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
            if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ;
  
   $data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('invoice_view_pdf', $data, true);
 
        //this the the PDF filename that user will get to download
         $pdfFilePath = BACKUP_DIR."/invoice.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");   */
  
  
$to      = 'rashmicabs@gmail.com';
$subject = 'Rc Cabs Cabs ';
 $message_mail =  '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Rashmicabs</title>
	
<link rel="stylesheet" type="text/css" href="http://rashmicabs.com/app/assets/global/css/email.css" />

</head>
 
<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#152437">
	<tr>
		<td></td>
		<td class="header container" >
				
				<div class="content">
				<table bgcolor="#152437">
					<tr>
						<td><img src="http://rashmicabs.com/app/assets/global/img/rc_logo.png" width="50%;"/></td>
						<td align="right"></td>
					</tr>
				</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td>
						<h3>Hi, Sohil Padhiyar</h3>
						
						<p>We welcome you to RASHMI CABS, and would like to thank you for registering with us. To activate your account and start booking, we would request you to please click on the ACTIVATE button below.</p>
						<!-- Callout Panel -->
						<p class="callout">
							 <a href="#">Click For Activate &raquo;</a>
						</p><!-- /Callout Panel -->					
												
						<!-- social & contact -->
						<table class="social" width="100%">
							<tr>
								<td>
									
									<!-- column 1 -->
									<table align="left" class="column">
										<tr>
											<td>				
												
												<h5 class="">Connect with Us:</h5>
												<p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>
						
												
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!-- column 2 -->
									<table align="left" class="column">
										<tr>
											<td>				
																			
												<h5 class="">Contact Info:</h5>												
												<p>Phone: <strong>+91 9974 23 4111</strong><br/>
                Email: <strong><a href="emailto:care@rashmicabs.com">care@rashmicabs.com</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
						
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							<a href="http://www.rashmicabs.com" target="_blank">www.rashmicabs.com</a>
						
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>
';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
			$headers .= 'From: noreply@ezeetaxi.com' . "\r\n" .
				'Reply-To: accounts@eZeeTAXI.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message_mail, $headers);
?>