<img class="iphone" src="../../res/img/caroussel/Screenshot(6).png"
	alt="iphone" width="300" height="600" >
<img class="iphone" src="../../res/img/caroussel/Screenshot(7).png"
	alt="iphone" width="300" height="600" style="display: none;">
<img class="iphone" src="../../res/img/caroussel/Screenshot(3).png"
	alt="iphone" width="300" height="600" style="display: none;">
<img class="iphone" src="../../res/img/caroussel/Screenshot(5).png"
	alt="iphone" width="300" height="600" style="display: none;">
<img class="iphone" src="../../res/img/caroussel/Screenshot(1).png"
	alt="iphone" width="300" height="600" style="display: none;">
<img class="iphone" src="../../res/img/caroussel/Screenshot(2).png"
	alt="iphone" width="300" height="600" style="display: none;">
<img class="iphone" src="../../res/img/caroussel/Screenshot(4).png"
	alt="iphone" width="300" height="600" style="display: none;">

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
