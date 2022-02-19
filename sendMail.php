<!DOCTYPE html>
<html>
<head>
	<title>Message envoyé</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
	<meta charset="UTF-8">
	<link rel="icon" href="./assets/svg/LOGO_CATWALK-08.svg" />
</head>
<body>
	<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';

	if (isset($_POST["submit"])) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
			$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			$recaptcha_secret = '6LeoNdkaAAAAAGAcuP2EIBblBcBugKNMEj8nQY2H';
			$recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
			$recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
			if ($recaptcha->score >= 0.5) {
				$first_name = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$subject = $_POST["subject"];
				$email_sender = $_POST["email"];
				$telephone = $_POST["phone"];
				$body = $_POST["body"];


				$json = file_get_contents('./assets/json/index.json');
				$json_2 = file_get_contents('./assets/json/test/index.json');
				$i = 0;
				$j = 0;
				$k = 0;
				$d = 0;
				$f = 0;


				$fullName = $first_name . " " .$last_name;
				$message = $body . "<br><br>". $fullName. "<br>". $telephone;
	//Decode JSON
				$json_data = json_decode($json,true);
	//Traverse array and get the data for students aged less than 20$
				if (is_array($json_data) || is_object($json_data)) {
					foreach ($json_data as $key1 => $value1) {
						while ($i < 1) {
							$pwd = $json_data[$key1]["password"];
							$i++;
						}
					}	
					foreach ($json_data as $key1 => $value1) {
						while ($j < 1) {
							$email = $json_data[$key1]["email"];
							$j++;
						}
					}
				}else {
				}

				$json_data_2 = json_decode($json_2,true);
	//Traverse array and get the data for students aged less than 20$
				if (is_array($json_data_2) || is_object($json_data_2)) {
					foreach ($json_data_2 as $key1 => $value1) {
						while ($k < 1) {
							$key = $json_data_2[$key1]["key3"];
							$k++;
						}
						while ($d < 1) {
							$key2 = $json_data_2[$key1]["key2"];
							$d++;
						}
						while ($f < 1) {
							$ciphering = $json_data_2[$key1]["ciphering"];
							$f++;
						}
					}
				}else {
				}

				$options = 0;
// Use openssl_decrypt() function to decrypt the data
				$decryptionpwd=openssl_decrypt ($pwd, $ciphering, 
					$key2, $options, $key);

				$decryptionemail=openssl_decrypt ($email, $ciphering, 
					$key2, $options, $key);

				$mail = new PHPMailer();
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'kepler.o2switch.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = $decryptionemail;                 // SMTP username
	$mail->Password = $decryptionpwd;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 26;   
	$mail->Subject = $subject;
	$mail->CharSet = 'UTF-8';
	$mail->setFrom(strval($email_sender));
	$mail->IsHTML(true);
	$mail->Body=$message;
	$mail->addAddress('projet@catwalk-communication.fr','Axelle Capelier');
	$mail->smtpConnect();
	
	if (!$mail->send()) {					
		?>
		<div class="">
			<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
			<svg xmlns="http://www.w3.org/2000/svg" id="test" class="logo" viewBox="0 0 207.55 208.9"><defs><style></style></defs><title>LOGO_CATWALK</title><g id="Calque_3" data-name="Calque 3"><path class="cls-1" d="M130.45,44.43l-2.52-6.87-3,8c-3.89,4.58-5.49,11.91-5.72,23.13-6,4.12-6.42,8.7-6.64,11.22s-12.83,23.36-27.71,25.65-47.41,1.37-47.41,1.37c-5.72-2.74-9.84-7.32-11.9-7.32s-5,2,3.66,7.51,9.85,6.68,20.38,7.14,25,1.38,25,1.38a49.27,49.27,0,0,0-6.18,13c-.92,2.75-11.45,8.24-11.45,8.24-.46,2.29-.46,19-.46,19-1.83,1.37-2.29,6.41.23,6.18a5,5,0,0,0,4.58-3.66c.46-1.83,2.06-12.14,2.06-12.14l2.75,22s.46,4.12,3.66,2.74.92-6.64.92-6.64l-.23-13s20.15-14.43,24-21.53c3-5,14.43-8.93,16.26-9.61s13.06-6.19,17.41-13.74,10.53-20.38,14-23.59,9.84-3.44,11.68-5.27,10.3-10.07,12.59-11,7.56,1.15,10.08.69S178.54,63,178.54,63c3,0,6.18-1.84,3-4.35s-32.28,3-34.57,2.06a11.61,11.61,0,0,1-3.9-2.75c4.35-3.21,3.44-4.35,3.44-5.5S147.16,49,145.1,49s-5.49-2.75-6.87-4.12S130.45,44.43,130.45,44.43Z"/></g></svg>
			<label for="openSidebarMenu" class="sidebarIconToggle">
				<div class="spinner diagonal part-1"></div>
				<div class="spinner horizontal"></div>
				<div class="spinner diagonal part-2"></div>
			</label>
			<div id="sidebarMenu">
				<ul class="sidebarMenuInner">
					<a href="index.html"><li>Accueil</li></a>
					<a href="agence.html"><li>L'agence</li></a>
					<a href="projets.html"><li style="border-bottom: 0">Projets</li></a>
					<a href="print.html"><li class="sous-menu-2">Print</li></a>
					<a href="web.html"><li class="sous-menu-2">Web</li></a>
					<a href="reseaux.html"><li class="sous-menu">Réseaux Sociaux</li></a>
					<a href="contact.html"><li style="border-top: 1px solid rgba(255, 255, 255,0.5); ">Contact</li></a>
				</ul>
			</div>	
		</div>

		<div class="container-message">
			<h1 style="text-align: center;">Votre message n'a pas pu être envoyé...</h1>
			<div class="title-bloc-message">
				<p class="paragraphe-message">Veuillez nous excuser pour la gêne occassionée...<br>
				Veuillez réessayer plus tard. (Pensez à bien vérifier votre adresse mail !)</p>
			</div>
		</div>
		<div class="footer-basic">
			<footer>
				<div class="social"><a href="https://www.instagram.com/catwalk_communication/"><i class="icon ion-social-instagram"></i></a><a href="https://www.linkedin.com/in/catwalk-communication-120888211/"><i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-pinterest"></i></a>
				</div>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="index.html">Accueil</a></li>
					<li class="list-inline-item"><a href="agence.html">Agence</a></li>
					<li class="list-inline-item"><a href="projets.html">Projets</a></li>
					<li class="list-inline-item"><a href="contact.html">Contact</a></li>
					<li class="list-inline-item"><a href="mentions.html">Mentions Légales</a></li>
				</ul>
				<p class="copyright">Catwalk-Communication © 2021</p>
			</footer>
		</div> 
		<?php
	} else{
		?>
		<div class="">
			<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
			<svg xmlns="http://www.w3.org/2000/svg" id="test" class="logo" viewBox="0 0 207.55 208.9"><defs><style></style></defs><title>LOGO_CATWALK</title><g id="Calque_3" data-name="Calque 3"><path class="cls-1" d="M130.45,44.43l-2.52-6.87-3,8c-3.89,4.58-5.49,11.91-5.72,23.13-6,4.12-6.42,8.7-6.64,11.22s-12.83,23.36-27.71,25.65-47.41,1.37-47.41,1.37c-5.72-2.74-9.84-7.32-11.9-7.32s-5,2,3.66,7.51,9.85,6.68,20.38,7.14,25,1.38,25,1.38a49.27,49.27,0,0,0-6.18,13c-.92,2.75-11.45,8.24-11.45,8.24-.46,2.29-.46,19-.46,19-1.83,1.37-2.29,6.41.23,6.18a5,5,0,0,0,4.58-3.66c.46-1.83,2.06-12.14,2.06-12.14l2.75,22s.46,4.12,3.66,2.74.92-6.64.92-6.64l-.23-13s20.15-14.43,24-21.53c3-5,14.43-8.93,16.26-9.61s13.06-6.19,17.41-13.74,10.53-20.38,14-23.59,9.84-3.44,11.68-5.27,10.3-10.07,12.59-11,7.56,1.15,10.08.69S178.54,63,178.54,63c3,0,6.18-1.84,3-4.35s-32.28,3-34.57,2.06a11.61,11.61,0,0,1-3.9-2.75c4.35-3.21,3.44-4.35,3.44-5.5S147.16,49,145.1,49s-5.49-2.75-6.87-4.12S130.45,44.43,130.45,44.43Z"/></g></svg>
			<label for="openSidebarMenu" class="sidebarIconToggle">
				<div class="spinner diagonal part-1"></div>
				<div class="spinner horizontal"></div>
				<div class="spinner diagonal part-2"></div>
			</label>
			<div id="sidebarMenu">
				<ul class="sidebarMenuInner">
					<a href="index.html"><li>Accueil</li></a>
					<a href="agence.html"><li>L'agence</li></a>
					<a href="projets.html"><li style="border-bottom: 0">Projets</li></a>
					<a href="print.html"><li class="sous-menu-2">Print</li></a>
					<a href="web.html"><li class="sous-menu-2">Web</li></a>
					<a href="reseaux.html"><li class="sous-menu">Réseaux Sociaux</li></a>
					<a href="contact.html"><li style="border-top: 1px solid rgba(255, 255, 255,0.5); ">Contact</li></a>
				</ul>
			</div>	
		</div>

		<div class="container-message">
			<h1 style="text-align: center;">Votre Message a bien été envoyé !</h1>
			<div class="title-bloc-message">
				<p class="paragraphe-message">CatWalk vous remercie pour votre message. <br> Nous vous recontacterons dès que possible !</p>
			</div>
		</div>
		<div class="footer-basic">
			<footer>
				<div class="social"><a href="https://www.instagram.com/catwalk_communication/"><i class="icon ion-social-instagram"></i></a><a href="https://www.linkedin.com/in/catwalk-communication-120888211/"><i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-pinterest"></i></a>
				</div>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="index.html">Accueil</a></li>
					<li class="list-inline-item"><a href="agence.html">Agence</a></li>
					<li class="list-inline-item"><a href="projets.html">Projets</a></li>
					<li class="list-inline-item"><a href="contact.html">Contact</a></li>
					<li class="list-inline-item"><a href="mentions.html">Mentions Légales</a></li>
				</ul>
				<p class="copyright">Catwalk-Communication © 2021</p>
			</footer>
		</div> 
		<?php
	}
} else {
	?>
	<div class="">
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<svg xmlns="http://www.w3.org/2000/svg" id="test" class="logo" viewBox="0 0 207.55 208.9"><defs><style></style></defs><title>LOGO_CATWALK</title><g id="Calque_3" data-name="Calque 3"><path class="cls-1" d="M130.45,44.43l-2.52-6.87-3,8c-3.89,4.58-5.49,11.91-5.72,23.13-6,4.12-6.42,8.7-6.64,11.22s-12.83,23.36-27.71,25.65-47.41,1.37-47.41,1.37c-5.72-2.74-9.84-7.32-11.9-7.32s-5,2,3.66,7.51,9.85,6.68,20.38,7.14,25,1.38,25,1.38a49.27,49.27,0,0,0-6.18,13c-.92,2.75-11.45,8.24-11.45,8.24-.46,2.29-.46,19-.46,19-1.83,1.37-2.29,6.41.23,6.18a5,5,0,0,0,4.58-3.66c.46-1.83,2.06-12.14,2.06-12.14l2.75,22s.46,4.12,3.66,2.74.92-6.64.92-6.64l-.23-13s20.15-14.43,24-21.53c3-5,14.43-8.93,16.26-9.61s13.06-6.19,17.41-13.74,10.53-20.38,14-23.59,9.84-3.44,11.68-5.27,10.3-10.07,12.59-11,7.56,1.15,10.08.69S178.54,63,178.54,63c3,0,6.18-1.84,3-4.35s-32.28,3-34.57,2.06a11.61,11.61,0,0,1-3.9-2.75c4.35-3.21,3.44-4.35,3.44-5.5S147.16,49,145.1,49s-5.49-2.75-6.87-4.12S130.45,44.43,130.45,44.43Z"/></g></svg>
		<label for="openSidebarMenu" class="sidebarIconToggle">
			<div class="spinner diagonal part-1"></div>
			<div class="spinner horizontal"></div>
			<div class="spinner diagonal part-2"></div>
		</label>
		<div id="sidebarMenu">
			<ul class="sidebarMenuInner">
				<a href="index.html"><li>Accueil</li></a>
				<a href="agence.html"><li>L'agence</li></a>
				<a href="projets.html"><li style="border-bottom: 0">Projets</li></a>
				<a href="print.html"><li class="sous-menu-2">Print</li></a>
				<a href="web.html"><li class="sous-menu-2">Web</li></a>
				<a href="reseaux.html"><li class="sous-menu">Réseaux Sociaux</li></a>
				<a href="contact.html"><li style="border-top: 1px solid rgba(255, 255, 255,0.5); ">Contact</li></a>
			</ul>
		</div>	
	</div>

	<div class="container-message">
		<h1 style="text-align: center;">Votre message n'a pas pu être envoyé...</h1>
		<div class="title-bloc-message">
			<p class="paragraphe-message">Veuillez nous excuser pour la gêne occassionée...<br>
			Veuillez réessayer plus tard. (Pensez à bien vérifier votre adresse mail !)</p>
		</div>
	</div>
	<div class="footer-basic">
		<footer>
			<div class="social"><a href="https://www.instagram.com/catwalk_communication/"><i class="icon ion-social-instagram"></i></a><a href="https://www.linkedin.com/in/catwalk-communication-120888211/"><i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-pinterest"></i></a>
			</div>
			<ul class="list-inline">
				<li class="list-inline-item"><a href="index.html">Accueil</a></li>
				<li class="list-inline-item"><a href="agence.html">Agence</a></li>
				<li class="list-inline-item"><a href="projets.html">Projets</a></li>
				<li class="list-inline-item"><a href="contact.html">Contact</a></li>
				<li class="list-inline-item"><a href="mentions.html">Mentions Légales</a></li>
			</ul>
			<p class="copyright">Catwalk-Communication © 2021</p>
		</footer>
	</div> 
	<?php
}

}	
}
?>
</body>
</html>

