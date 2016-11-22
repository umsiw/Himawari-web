<!doctype html>
<html lang="en">
	<head>
		<title>Himawari 8</title>
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>
		<style>
			html, body {
				height: 100%;
				width: 100%;
				margin: 0;
				padding: 0;
				overflow: hidden;
			}
			
			div#heading {
				top: 0;
				right: 0;
				position: absolute;
				z-index: 100;
				height: 130px;
				width: 210px;
				background: #123456;
				box-shadow: -5px 0px 5px #222222;
			}
				
			div#logo {
				position: absolute;
				margin-left: 74px;
				margin-top: 10px;
			}
			
			div#title1 {
				position: absolute;
				font-size: 160%;
				color: #ffffff;
				margin-left: 41px;
				margin-top: 68px;
			}
			
			div#title2 {
				position: absolute;
				font-size: 90%;
				color: #ffffff;
				margin-left: 34px;
				margin-top: 100px;
			}
			
			div#timediv {
				position: absolute;
				z-index: 101;
				background: #123456;
				height: 70px;
				width: 210px;
				top: 132px;
				right:0;
				box-shadow: -5px 0px 10px #222222;
			}
			
			div#tgl {
				position: absolute;
				font-size: 100%;
				color: #eeeeee;
				margin-left: 58px;
				margin-top: 6px;
			}
			
			div#wkt {
				position: absolute;
				font-size: 140%;
				color: #eeeeee;
				margin-left: 35px;
				margin-top: 30px;
			}
				
			div#infotype {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 250px;
				left: 30px;
				top: 10px;
				height: 39px;
				line-height: 39px;
				padding-left: 8px;
				text-align: left;
				box-shadow: 5px 5px 5px #111111;
			}	
			
			div#infotyperes {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 250px;
				left: 30px;
				top: 49px;
				direction: ltr;
				text-indent: 8px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#waktu{
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 120px;
				height: 39px;
				line-height: 39px;
				left: 282px;
				top: 10px;
				padding-right: 8px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#waktures {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 120px;
				left: 282px;
				top: 49px;
				direction: rtl;
				text-indent: 8px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#interval{
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 130px;
				height: 39px;
				line-height: 39px;
				left: 404px;
				top: 10px;
				padding-right: 8px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#intervalres {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 130px;
				left: 404px;
				top: 49px;
				direction: rtl;
				text-indent: 8px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#play {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 40px;
				left: 540px;
				height: 39px;
				top: 10px;
				padding-left: 9px;
				padding-top: 7px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#previous {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 40px;
				left: 582px;
				height: 39px;
				top: 10px;
				padding-left: 9px;
				padding-top: 7px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#next {
				position: absolute;
				z-index: 100;
				background: #fff;
				width: 40px;
				left: 624px;
				height: 39px;
				top: 10px;
				padding-left: 9px;
				padding-top: 7px;
				box-shadow: 5px 5px 5px #111111;
			}
			
			div#map {
				z-index: 0;
				right: 0;
				top: 0;
				left: 0;
				bottom: 0;
				overflow:hidden;
				padding-bottom:20px;
				position:absolute;
			}
			
			div#headinglegenda {
				bottom: 0;
				left: 0;
				background: #fff;
				width: 700px;
				height: 40px;
				position: absolute;
				margin-bottom: 30px;
				margin-left: 30px;
				z-index: 1000;
				box-shadow: 5px 5px 5px #111111;
			}
			
			.dtpc {
				align: center;
				margin-right: 8px !important;
				margin-top: 8px !important;
				z-index: 150;
				font-size: 90%;
				width: 100px !important;
			}
			
			.hvr:hover{
				opacity: 0.8;
				background: rgb(200, 200, 200);
			}
		</style>
		<script src="http://maps.google.com/maps/api/js?sensor=false&v=3.7"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script>
		var map;
		var dtovl = [];
		var cnt = 0;
		var tmr1 = setInterval(function(){imgovl()},1000);
		var tmr2 = setInterval(function(){listdata()},300000);
		
		function dpfin() {
			$( "#dpf" ).datepicker({ dateFormat: 'yy/mm/dd' }).val();
		}
		
		function dptin() {
			$( "#dpt" ).datepicker({ dateFormat: 'yy/mm/dd' }).val();
		}
		
		function initMap() {
			var mapOptions = {
				center: { lat: 1, lng: 121.1904859},
				zoom: 5,
				zoomControl: false,
				streetViewControl: false,
				mapTypeControlOptions: {
					position: google.maps.ControlPosition.RIGHT_BOTTOM
				},
				zoomControlOptions: {
					position: google.maps.ControlPosition.LEFT_TOP
				},

				mapTypeId: google.maps.MapTypeId.TERRAIN
			};
			map = new google.maps.Map(document.getElementById('map'),mapOptions);
		}
		
		function infls(){
			var lsinf = ["Rainfall Rate","Cloud Top Temperature","Sea Surface Temperature","Land Surface Temperature"];
			var src = "";
			for (var i = 0; i < lsinf.length; i++){
				src += "<div class='hvr' id='"+lsinf[i]+"' align='left' onmousedown='chinf(this.id);'>"+lsinf[i]+"</div>";
			}
			document.getElementById("infotyperes").innerHTML= src;
		}
		
		function chinf(inf) {
			document.getElementById("infotype").innerHTML= inf;
			document.getElementById("infotyperes").innerHTML= '';
			listdata();
		}
		
		function timels(){
			var tm = ["Last 1H","Last 3H","Last 6H","Last 12H","Last 24H"];
			var src = "";
			for (var i = 0; i < tm.length; i++){
				src += "<div class='hvr' id='"+tm[i]+"' align='right' onmousedown='chtm(this.id);'>"+tm[i]+"</div>";
			}
			src += "<div style='margin-right:16px;margin-bottom:-5px;margin-top:5px;font-size:80%;'>:Using date</div>";
			src += "<input class='dtpc' type='text' id='dpf' onchange='dateSlc()';>";
			src += "<div style='margin-right:43px;margin-bottom:-5px;font-size:80%;'>to</div>";
			src += "<input style='margin-bottom:8px;' class='dtpc' type='text' id='dpt' onchange='dateSlc()';>";
			document.getElementById("waktures").innerHTML= src;
		}
		
		function dateSlc() {
			var datfrom = document.getElementById("dpf").value;
			var datto = document.getElementById("dpt").value;
			if (datfrom!='' && datto!='') {
				chtm(datfrom+"-"+datto);
			}
		}
		
		function chtm(tme) {
			if (tme.length>10) {
				document.getElementById("waktu").style.fontSize = "50%";
			}
			else {
				document.getElementById("waktu").style.fontSize = "100%";
			}
			document.getElementById("waktu").innerHTML= tme;
			document.getElementById("waktures").innerHTML= '';
			listdata();
		}
		
		function intls(){
			var lsint = ["10min interval","30min interval","60min interval"];
			var src = "";
			for (var i = 0; i < lsint.length; i++){
				src += "<div class='hvr' id='"+lsint[i]+"' align='right' onmousedown='chint(this.id);'>"+lsint[i]+"</div>";
			}
			document.getElementById("intervalres").innerHTML= src;
		}
		
		function chint(intl) {
			document.getElementById("interval").innerHTML= intl;
			document.getElementById("intervalres").innerHTML= '';
			imgovl();
			listdata();
		}
		
		function exclearinf() {
			document.getElementById("waktures").innerHTML= '';
			document.getElementById("intervalres").innerHTML= '';
		}
		
		function exclearwkt() {
			document.getElementById("infotyperes").innerHTML= '';
			document.getElementById("intervalres").innerHTML= '';
		}
		
		function exclearintl() {
			document.getElementById("waktures").innerHTML= '';
			document.getElementById("infotyperes").innerHTML= '';
		}
		
		function clearall() {
			document.getElementById("infotyperes").innerHTML= '';
			document.getElementById("waktures").innerHTML= '';
			document.getElementById("intervalres").innerHTML= '';
		}
		
		function listdata(){
			cnt=0;
			var ginf = document.getElementById("infotype").innerHTML;
			var gtm = document.getElementById("waktu").innerHTML;
			var gint = document.getElementById("interval").innerHTML;
			var xhttp = new XMLHttpRequest();
			var lsfl = [];
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					document.getElementById("capture").innerHTML= xhttp.responseText;
				}
			}
			xhttp.open("GET", "getlist.php?info="+ginf+"&wkt="+gtm+"&intvl="+gint, true);
			xhttp.send();
		}
		
		function imgovl() {
			var rurl = 'http://www.modis-catalog.lapan.go.id/dev/himawari-8/GeoTIFF/';
			var lsd = document.getElementById("capture").innerHTML;
			if(lsd.length>0){
				lsd = lsd.slice(0, -1);
				var lsdir = lsd.split("^");
				var imageBounds = {
					north: 15.1907211,
					south: -15.1907211,
					east: 150.5427197,
					west: 89.4572803
				};
				if(dtovl[0]){
					dtovl[0].setMap(null);
				}
				dtovl[0] = new google.maps.GroundOverlay(
					rurl+lsdir[cnt],
					imageBounds);
				dtovl[0].setMap(map);
				document.getElementById("tgl").innerHTML= lsdir[cnt].split("/")[0];
				document.getElementById("wkt").innerHTML= lsdir[cnt].split("/")[1].replace('-',':')+":00 UTC";
				cnt = cnt+1;
				if (cnt==lsdir.length){
					cnt=0;
				}
			}
			else {
				dtovl[0].setMap(null);
				document.getElementById("tgl").innerHTML= '';
				document.getElementById("wkt").innerHTML= '';
			}
		}
		
		function playpause() {
			var cekc = document.getElementById("ppicon").src;
			cekc = cekc.split("/").pop();
			if(cekc=="play.png"){
				document.getElementById("ppicon").src="icon/pause.png";
				tmr1 = setInterval(function(){imgovl()},1000);
			}
			else{
				document.getElementById("ppicon").src="icon/play.png";
				clearInterval(tmr1);
			}
		}
		
		function prvs() {
			cnt = cnt-2;
			if(cnt<0) {
				cnt = 0;
			}
			imgovl();
		}
		
		function nxt() {
			imgovl();
		}
		
		$( function() {
			$( "#headinglegenda" ).draggable();
		} );
	
		</script>
	</head>
	<body onload="initMap();listdata();">
		<div id="heading">
			<div id="logo"><img src="icon/logolapan.png" height="60" width="70"></div>
			<div id="title1">Himawari 8</div>
			<div id="title2">Real-Time Monitoring</div>
		</div>
		<div id="timediv">
			<div id="tgl"></div>
			<div id="wkt"></div>
		</div>
		<div tabindex="0" id="infotype" align="right" onclick="infls();exclearinf();">
			Rainfall Rate
		</div>
		<div id="infotyperes"></div>
		<div tabindex="0" id="waktu" align="right" onclick="timels();dpfin();dptin();exclearwkt();">
			Last 3H
		</div>
		<div id="waktures"></div>
		<div tabindex="0" id="interval" align="right" onclick="intls();exclearintl();">
			10min interval
		</div>
		<div id="intervalres"></div>
		<div id="play" onclick="playpause();"><img id="ppicon" src="icon/pause.png" height="22" width="22"></div>
		<div id="previous" onclick="prvs();"><img id="ppicon" src="icon/previous.png" height="22" width="22"></div>
		<div id="next" onclick="nxt();"><img id="ppicon" src="icon/next.png" height="22" width="22"></div>
		<div style="display:none;" id="capture"></div>
		<div id="headinglegenda">
			<img src="icon/legend.png" height="40" width="700">
		</div>
    <div id="map" class="map" onclick="clearall();"></div>
  </body>
</html>