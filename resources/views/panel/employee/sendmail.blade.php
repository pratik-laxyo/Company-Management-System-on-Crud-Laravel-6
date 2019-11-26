<!DOCTYPE html>
<html>
<head>
    <title>Real Programmer</title>
    <style type="text/css">
		.hover_bkgr_fricc{
		    background:rgba(0,0,0,.4);
		    cursor:pointer;
		    height:100%;
		    position:fixed;
		    text-align:center;
		    top:0;
		    width:100%;
		    z-index:10000;
		}
		.hover_bkgr_fricc > div {
		    background-color: #fff;
		    box-shadow: 10px 10px 60px #555;
		    display: inline-block;
		    height: auto;
		    max-width: 551px;
		    min-height: 100px;
		    vertical-align: middle;
		    width: 60%;
		    position: relative;
		    border-radius: 8px;
		    padding: 15px 5%;
  			margin-top:35px; 
		}
    </style>
</head>
<body>
    <div class="hover_bkgr_fricc">
	    <div>
	    	<p><b>Dear {{ $details['name'] }},</b></p>
	        <p>Welcome to our Laxyo Energy Pvt. Ltd.</p>
	        <strong>Thanks & Regards</strong><br>
	        <strong>Laxyo IT Solution</strong>
	    </div>
	</div>
</body>
</html>
