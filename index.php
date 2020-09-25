<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="viewRecorder/view.rec.min.js"></script>
	<style>
	body{
		background-color:#555;
	}
	.warp{
		margin: 0px auto;
		background-color:#fff;
		width:800px;
		padding:20px;
	}
	
	.status p{
		background-color:#efe;
		height:20px;
	}
	code{
		padding:10px;
		background-color:#ddd;
		display:block;
	}
	#vr-pointer{
		background:url('viewRecorder/docs/img/mouse.png');
		height:27px;
		width:15px;
	}
	.vr-mark{
		width:30px;
		height:30px;
		border-top:2px solid #00f;
                border-left: 2px solid #00f;
                font-size: 11px;
                color: #00f;
                z-index: 3000;
	}
	</style>
</head>
<body>
	
	<div class="warp">
	<h1>View Recorder (jQuery Plugin)</h1>
        
        <h3>Live Demo</h3>
	<button id="record">Start Record</button> 
	<button id="play">Play</button>
	<div class="status">
		<p id="status-rec"></p>
		<p id="status-play"></p>
	</div>
	<script>
	$(function(){
		var rec = new viewRec({interval:250});
		var recorded = false;
		var play = false;
		$('#record').click(function(){
			if(recorded){
				rec.stopRecord();
				$('#status-rec').html('Stop Record!');
				$(this).html('Start Record');
				recorded = false;
			}
			else{
				rec.startRecord();
				$('#status-rec').html('Recording...');
				$(this).html('Stop Record');
				recorded = true;
			}
		});
		$('#play').click(function(){
			if(play){
				rec.stop();
				$('#status-play').html('Stop!');
				$(this).html('Play');
				play = false;
			}
			else{
				rec.play();
				$('#status-play').html('Playing...');
				$(this).html('Stop');
				play = true;
			}
		});
		rec.on('stop',function(){
			$('#status-play').html('Stop!');
			$('#play').html('Play');
			play = false;
		});
	});
	</script>
	<div>
            <h3>Guide</h3>
		<p>Copy and paste style</p>
		<code>
		#pointer{<br />
			background:url('./mouse.png');<br />
			height:27px;<br />
			width:15px;<br />
		}<br />
		.mark{<br />
			width:30px;<br />
			height:30px;<br />
			border:1px solid #000;<br />
		}
		</code>
		<p>Set Option</p>
		<code>
			var record = new viewRec({interval:200});
		</code>
		<p>Start Recording</p>
		<code>
			record.startRecord();
		</code>
		<p>Stop Recording</p>
		<code>
			record.stopRecord();
		</code>
		<p>Play</p>
		<code>
			record.play();
		</code>
		<p>Stop Playing</p>
		<code>
			record.stop();
		</code>
		<p>set data Record</p>
		<code>
			var data = [
				[12,12,12,12],[12,12,12,12]
			];<br />
			record.setData(data);
		</code>
		<p>get data Record</p>
		<code>
			record.getData();
		</code>
		<p>Clear data Record</p>
		<code>
			record.clearData();
		</code>
	</div>
	</div> 
</body>
</html>