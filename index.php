
<html> 
	<head> 
		<title>Tajectory Path</title> 
		
		<link rel="stylesheet" href="style.css" type="text/css" />
				
	<!-- 	// <script type="text/javascript" src="support/mootools-core-1-1.3.js"></script>
		// <script type="text/javascript" src="support/Lighter.js"></script> -->
		<script type="text/javascript"> 
		
		</script> 
	</head> 
 
	<body> 
	
	<div id="wrap"> 
	<h1>Trajectory Simulator</h1> 
		<form method="post" action="#" >
            <label>Angle:</label>
              <input type="number" placeholder="Angle..." id="angle" name="angle" required>
            <label>Velocity:</label>
              <input type="number" placeholder="Velocity..." id="vel" name="velocity" required>
                <button type="submit" name='StartButton' class="btn btn-primary">Start</button>
      </form>

<?php
if(isset($_POST['StartButton'])) {
	$angle        = $_POST['angle'];
	$velocity     = $_POST['velocity'];
	?>
	<canvas id="surface" width="1200" height="420"></canvas> 
		<script type="text/javascript"> 
		
			var pro = {
				x:50,
				y:380,
				r:15,
				v:<?php echo $velocity;?>,
				theta:<?php echo $angle;?>
				};
				
				var canvas = document.getElementById('surface');
				var ctx = canvas.getContext('2d');
				
				var frameCount = 0;
				var v0x = pro.v * Math.cos(pro.theta * Math.PI/180);
				var v0y = pro.v * Math.sin(pro.theta * Math.PI/180);
				var startX = pro.x;
				var startY = pro.y;
				var g = 9.8;
				setInterval(function()
				{
					//smooth clear
					ctx.save();
						ctx.fillStyle = "rgba(0, 0, 0, .3)";
						ctx.fillRect(0, 0, canvas.width, canvas.height);
					ctx.restore();
					
					if(pro.y<canvas.height - pro.r && pro.x < canvas.width - pro.r)
					{
						pro.y = startY - ( v0y * frameCount - (1/2 * g * Math.pow(frameCount,2)) );
						pro.x = startX + v0x * frameCount;
					}
						
					ctx.save();
						ctx.beginPath();
						ctx.fillStyle = "rgba(0, 200, 0, 0.6)";
						ctx.arc(pro.x,pro.y,pro.r,0,Math.PI*2,true);
						ctx.fill();
						ctx.stroke();
						ctx.closePath();
					ctx.restore();
					frameCount+=.1;
						
				}, 1000 / 77);	
			
			
			
		</script> 
	<?php
}?>
		
		
	</div> 
	
	
	</body> 
 
</html>