
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add or Remove Input Fields Dynamically using jQuery - MyNotePaper</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

button#addRow {
    margin-left: 92%;
}


button.btn.btn-info {
    margin-left: 93%;
}

h1 {
    margin-top: -31px;
}


	</style>
</head>
<body>

<div id="container">

<a href="<?php echo base_url()?>Welcome">Back</a><h1 align="center"> 
      Add Remove Record of Input Fields Dynamically using jQuery</h1>

	<div id="body">
        <div class="text-center" style="margin-left: 20px;">
            <button id="addRow" type="button" class="btn btn-info">Add Row</button>
        </div><br>

        <form method="post" action="<?php echo base_url()?>Welcome/add">
            <div class="row">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                            <input type="text" name="username[]" class="form-control m-input" placeholder="Enter your name" autocomplete="off" required>

                            <input type="email" name="uemail[]" class="form-control m-input" placeholder="Enter your email" autocomplete="off" required>

                             <input type="number" name="mobno[]" class="form-control m-input" placeholder="Enter your Mobile number" autocomplete="off" min="1" max="10" required>

                               <input type="text" name="location[]" class="form-control m-input" placeholder="Enter your location" autocomplete="off">

                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="username[]" class="form-control m-input" placeholder="Enter your name" autocomplete="off">';

            html += '<input type="email" name="uemail[]" class="form-control m-input" placeholder="Enter your email" autocomplete="off">';

            html += '<input type="number" name="mobno[]" class="form-control m-input" placeholder="Enter your mobile number" autocomplete="off">';


            html += '<input type="text" name="location[]" class="form-control m-input" placeholder="Enter your mobile number" autocomplete="off">';

            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>





















	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>