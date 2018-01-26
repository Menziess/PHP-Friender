<img class="iphone" src="../../res/img/caroussel/Screenshot0.png"
	alt="iphone" width="300" height="600" >
<img class="iphone" src="../../res/img/caroussel/Screenshot1.png"
	alt="iphone" width="300" height="600" >
<img class="iphone" src="../../res/img/caroussel/Screenshot2.png"
	alt="iphone" width="300" height="600" >
<img class="iphone" src="../../res/img/caroussel/Screenshot3.png"
	alt="iphone" width="300" height="600" >
<img class="iphone" src="../../res/img/caroussel/Screenshot4.png"
	alt="iphone" width="300" height="600" >

<script>
var myIndex = 0;
carousel();

function carousel() {
	var i;
	var x = document.getElementsByClassName("iphone");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	myIndex++;
	if (myIndex > x.length) {myIndex = 1}
	x[myIndex-1].style.display = "block";
	setTimeout(carousel, 2000);
}
</script>