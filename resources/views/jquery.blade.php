{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>




<body>

    <p class="error">
        Tis is Jquery Example for error
    </p>
    <div class="notice-warning">
        <div class="notice-close">&#215;</div>
        <strong>Warning!</strong> I&#8217;m about to lose my cool.
    </div>





    <div class="container-fluid mt-2">
        <h1>Three equal width columns</h1>
        <p>Note: Try to add a new div with class="col" inside the row class - this will create four equal-width
            columns.</p>
        <div class="row">
            <div class="col-sm-4 p-3 bg-primary text-white">.col</div>
            <div class="col-sm-8 bg-dark text-white">.col</div>
            <div class="col-sm-4 p-3 bg-primary text-white">.col</div>
        </div>
    </div>

</body>

</html>

<script>
    // $("p").hover(function() {
    //     alert(1);
    //     $(this).css("background-color", "lightgray");
    // });
    $('.notice-close').on('click', function(event) {
        $('.notice-warning').remove();
    });

    $('.error').show();
    $('.error').show('slow');
    $('.error').show(500);
</script>
</body>

</html> --}}

<!DOCTYPE html>
<html>
	
<head>
	<script src="https://ajax.googleapis.com/ajax/
				libs/jquery/3.3.1/jquery.min.js">
</script>
	<style type="text/css">
		divq {
			width: 100px;
			height: 100px;
			background-color: green;
		}
	</style>
</head>
	
{{-- <body>
	<div></div>
	<br/>
	<button id="animate">Animate Me</button>
	<script type="text/javascript">
		$("#animate").click(function() {
			$("div").animate({
					width: "100px",
					height: "100px",
					borderRadius: "50%",
					// marginLeft: "210px",
					// marginTop: "70px",
				},
				1000,
			);
		});
	</script> --}}

<script>
    $(document).ready(function() {
        $("button").click(function() {
            alert($("div").scrollTop(100) );
        });
    });
</script>
<style>
    div {
        border: 1px solid black;
        width: 100px;
        height: 150px;
        overflow: auto;
    }
</style>
</head>
<body>
<div>
    Welcome to GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome
    to GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to
    GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to
    GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to 
    GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to 
    GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to 
    GeeksforGeeks!. Welcome to GeeksforGeeks!. Welcome to 
    GeeksforGeeks!. Welcome to GeeksforGeeks!</div>
<br>
  
<!-- move the scroll bar and click on this button -->
<button>Click Here !</button>
</body>
	
</html>
