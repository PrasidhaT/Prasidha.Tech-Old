<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- HTML2CANVAS -->
    <!-- jQUERY -->
    <script src="html2canvas.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!--<script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>-->
</head>
<script>
	$(document).ready(function(){
		html2canvas(document.querySelector("#pdf")).then(canvas =>{
			var link = document.createElement('a');
				link.innerHTML = '<button class="btn btn-lg btn-primary">Download</button>';
				link.addEventListener('click', function(ev){
					link.href 		= canvas.toDataURL("image/png");
					link.download 	= "MenuPDF.pdf";
				}, false);
			document.body.appendChild(link);
			//document.body.appendChild(canvas); 
			//var myImage = canvas.toDataURL("image/png");
            //window.open(myImage);
		});
		
	});
</script>
<body>
    <div id="pdf" class="pdf">

        <?php 

        $menu = $_POST['menu_name'];
        echo '
        <div class="heading">
        <h1>'.$menu.'</h1>
        </div>
        ';

        ?>

    <div class="codes">
    <?php 

//looks though the codes folder and displays all the images
$folder = "codes";
$results = scandir('codes');
foreach ($results as $result) {
if ($result === '.' or $result === '..') continue;
if (is_file($folder . '/' . $result)) {
    echo '
    <div>
    <h1>'.$result.'</h1>
    <img src="'.$folder . '/' . $result.'" alt="QR Code">
     </div>';
}
}
?>

</div>
</div>

</body>


</html>