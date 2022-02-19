<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
	<meta charset="UTF-8">
	<link rel="icon" href="./assets/svg/LOGO_CATWALK-08.svg" />
	<script src="https://www.google.com/recaptcha/api.js?render=6LeoNdkaAAAAAJoUC_AOfT3OeZbU2M5QAh_hNwcm"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LeoNdkaAAAAAJoUC_AOfT3OeZbU2M5QAh_hNwcm', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>
<body>
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
			<a href="projets.html"><li>Projets</li></a>
			<a href="contact.html"><li>Contact</li></a>
		</ul>
	</div>	
	<div class="title">
		<h3>Contactez-nous</h3>
	</div>
	<form class="form" name="contactform" method="post" action="sendMail.php">
		<div class="row">
			<div class="col" style="margin-bottom: 5%">
				<label for="last_name">Nom <span style="color: red;">*</span></label>
				<input name="last_name" type="text" class="form-control" placeholder="Nom" required>
			</div>
			<div class="col">
				<label for="first_name">Prénom <span style="color: red;">*</span></label>
				<input name="first_name" type="text" class="form-control" placeholder="Prénom" required>
			</div>
		</div>
		<div class="row" style="margin-bottom: 5%">
			<div class="col">
				<label for="email">Email <span style="color: red;">*</span></label>
				<input pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" name="email" type="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="col">
				<label for="phone">Téléphone</label>
				<input name="phone" type="tel" pattern="^[0-9]{10}$" class="form-control" placeholder="Téléphone">
			</div>
		</div>
		<div class="row" style="margin-bottom: 5%" >
			<div class="col">
				<label for="subject">Sujet <span style="color: red;">*</span></label>
				<input name="subject" type="text" class="form-control" placeholder="Objet de votre message" required>
			</div>
		</div>
		<div class="row" style="margin-bottom: 5%" >
			<div class="col">
				<label for="body">Message <span style="color: red;">*</span></label>
				<textarea name="body" class="form-control" aria-label="With textarea" placeholder="Un projet ? Une question ? Dites nous tout juste ici." rows="5" cols="33" required></textarea>
			</div>
		</div>
		<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
		<input class="btn-form" name="submit" id="submit" type="submit" value="Envoyer">
	</form>
	<div class="footer-basic">
		<footer>
			<div class="social"><a href="https://www.instagram.com/catwalk_communication/"><i class="icon ion-social-instagram"></i></a><a href="https://www.linkedin.com/in/catwalk-communication-120888211/"><i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-pinterest"></i></a>
			</div>
			<ul class="list-inline">
				<li class="list-inline-item"><a href="index.html">Accueil</a></li>
				<li class="list-inline-item"><a href="agence.html">Agence</a></li>
				<li class="list-inline-item"><a href="projets.html">Projets</a></li>
				<li class="list-inline-item"><a href="contact.php">Contact</a></li>
				<li class="list-inline-item"><a href="mentions.html">Mentions Légales</a></li>
			</ul>
			<p class="copyright">Catwalk-Communication © 2021</p>
		</footer>
	</div> 
</body>
</html>