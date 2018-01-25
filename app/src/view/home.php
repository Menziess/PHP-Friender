
<? require 'template/head.php' ?>

<div class="container" >
	<div class="grid overflow" >

		<div class="eenderde center">
			<!-- <img class="screenshot" src="../../res/img/Screenshot.png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" > -->


		<html>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
		.mySlides {display:none;}
		</style>
		<body>

		<div class="w3-content w3-section" style="max-width:500px">
		<img class="mySlides" src="../../res/img/Screenshot.png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" >
			<img class="mySlides" src="../../res/img/Screenshot (1).png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" >
			<img class="mySlides" src="../../res/img/Screenshot (2).png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" >
			<img class="mySlides" src="../../res/img/Screenshot (3).png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" >
			<img class="mySlides" src="../../res/img/Screenshot (4).png" alt="screenshot"
			style="width: 100%; height: auto; max-width: 18em;"
			width="300px" height="600px" >
		<!-- <img class="mySlides" src="../../res/img/Screenshot (1).png" style="width:100%">
		<img class="mySlides" src="../../res/img/Screenshot (2).png" style="width:100%">
		<img class="mySlides" src="../../res/img/Screenshot (3).png" style="width:100%">
		<img class="mySlides" src="../../res/img/Screenshot (4).png" style="width:100%"> -->
		</div>

		<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}
			x[myIndex-1].style.display = "block";
			setTimeout(carousel, 2000); // Change image every 2 seconds
		}
		</script>

		</body>
		</html>

		</div>

		<div class="tweederde grid">
			<img class="logomain full" src="../../res/img/main.png" alt="Logo">

			<h2 class="full">Vind je ideale vriendengroep!</h2>

			<div class="full grid middle">
				<button class="half button"
					onclick="navigate('/login', 300);">
					<a class="button__inner"><u>Sign in</u></a>
				</button>

				<button class="half button button--secondary"
					onclick="navigate('/signup', 300);">
					<a class="button__inner"><u>Sign up</u></a>
				</button>
			</div>
		</div>

	</div>
</div>

<? require 'template/tail.php' ?>
