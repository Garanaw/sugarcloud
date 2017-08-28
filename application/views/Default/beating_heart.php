<!DOCTYPE html>
<html>
<head>
	<title>Pablo's creation</title>
	<link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
	<style type="text/css">
		@-webkit-keyframes beat {
			0% {
				-webkit-transform: scale(1) rotate(225deg);
				-webkit-box-shadow:0 0 40px rgba(213,9,60,1);
			}
			50% {
				-webkit-transform: scale(1.1) rotate(225deg);
				-webkit-box-shadow:0 0 70px rgba(213,9,60,0.6);
			}
			100% {
				-webkit-transform: scale(1) rotate(225deg);
				-webkit-box-shadow:0 0 40px rgba(213,9,60,1);
			}
		}

		@-moz-keyframes beat {
			0% {
				-moz-transform: scale(1) rotate(225deg);
				-moz-box-shadow:0 0 40px rgba(213,9,60,1);
			}
			50% {
				-moz-transform: scale(1.1) rotate(225deg);
				-moz-box-shadow:0 0 70px rgba(213,9,60,0.6);
			}
			100% {
				-moz-transform: scale(1) rotate(225deg);
				-moz-box-shadow:0 0 40px rgba(213,9,60,1);
			}
		}

		@keyframes beat {
			0% {
				transform: scale(1) rotate(225deg);
				box-shadow:0 0 40px rgba(213,9,60,1);
			}
			50% {
				transform: scale(1.1) rotate(225deg);
				box-shadow:0 0 70px rgba(213,9,60,0.6);
			}
			100% {
				transform: scale(1) rotate(225deg);
				box-shadow:0 0 40px rgba(213,9,60,1);
			}
		}

#background {
	position: fixed;
	top: 0;
	left: 0;
	z-index: -1;
	width: 100%;
	height: 100%;
	background: #ffa5a5;
	background: -moz-linear-gradient(top, #ffa5a5 0%, #ffd3d3 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffa5a5), color-stop(100%,#ffd3d3));
	background: -webkit-linear-gradient(top, #ffa5a5 0%,#ffd3d3 100%);
	background: linear-gradient(top, #ffa5a5 0%, #ffd3d3 100%);
}

#chest {
	position: relative;
	width: 500px;
	height: 450px;
	margin: 0 auto;
}

.heart {
	position: absolute;
	z-index: 2;
	background: -moz-linear-gradient(-180deg, #f50a45 0%, #d5093c 40%);
	background: -webkit-gradient(linear, right 50%, left 50%, color-stop(0%,#f50a45), color-stop(40%,#d5093c));
	background: -webkit-linear-gradient(-180deg, #f50a45 0%,#d5093c 40%);
	background: linear-gradient(-180deg, #f50a45 0%, #d5093c 40%);
	-webkit-animation: beat 0.7s ease 0s infinite normal;
	-moz-animation: beat 0.7s ease 0s infinite normal;
	animation: beat 0.7s ease 0s infinite normal;
}

.heart.center {
	background: -moz-linear-gradient(-45deg, #b80734 0%, #d5093c 40%);
	background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#b80734), color-stop(40%,#d5093c));
	background: -webkit-linear-gradient(-45deg, #b80734 0%,#d5093c 40%);
	background: linear-gradient(-45deg,#b80734 0%,#d5093c 40%);
}

.heart.top {
	z-index: 3;
}

.side {
	top: 50px;
	width: 220px;
	height: 220px;
	-moz-border-radius: 220px;
	-webkit-border-radius: 220px;
	border-radius: 220px;
}

.center {
	width: 210px;
	height: 210px;
	bottom: 100px;
	left: 145px;
	font-size: 0;
	text-indent: -9999px;
}

.left {
	left: 62px;
}

.right {
	right: 62px;
}

p {
	font-family: 'Love Ya Like A Sister';
	/*font-family: 'Codystar';*/
	font-size: 3.6em;
	color: white;
	text-shadow: 1px 1px 1px #000;
	margin-top: 100px;
	/*font-weight: bold;*/
	letter-spacing: 1.8px;
}

p.left {
	float: left;
	margin-left: 45px;
}
p.right {
	float: right;
	margin-right: 30px;
}

	</style>
</head>
<body>
	<div id="background">
		<p class="left">Feel my...</p>
		<p class="right">heart beat</p>
	</div>
	<div id="chest">
		<div class="heart left side top"></div>
		<div class="heart center">&hearts;</div>
		<!--div class="heart center">&#128152;</div-->
		<div class="heart right side"></div>
	</div>
</body>
</html>