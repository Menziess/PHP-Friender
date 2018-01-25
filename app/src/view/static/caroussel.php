<img class="mySlides" src="../../res/img/caroussel/Screenshot0.png"
	alt="screenshot"
	style="width: 100%; height: auto; max-width: 18em;"
	width="300px" height="600px" >
<img class="mySlides" src="../../res/img/caroussel/Screenshot1.png"
	alt="screenshot"
	style="width: 100%; height: auto; max-width: 18em;"
	width="300px" height="600px" >
<img class="mySlides" src="../../res/img/caroussel/Screenshot2.png"
	alt="screenshot"
	style="width: 100%; height: auto; max-width: 18em;"
	width="300px" height="600px" >
<img class="mySlides" src="../../res/img/caroussel/Screenshot3.png"
	alt="screenshot"
	style="width: 100%; height: auto; max-width: 18em;"
	width="300px" height="600px" >
<img class="mySlides" src="../../res/img/caroussel/Screenshot4.png"
	alt="screenshot"
	style="width: 100%; height: auto; max-width: 18em;"
	width="300px" height="600px" >

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
	setTimeout(carousel, 2000);
}
</script>