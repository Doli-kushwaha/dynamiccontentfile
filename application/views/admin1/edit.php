
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
input.form-control.m-input {
    margin-left: -2px;
    margin-right: 13px;
    width:auto;
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

        <table>

        <form method="post" action="<?php echo base_url()?>Welcome/edit/<?php if(isset($userdata) && !empty($userdata)) {echo $userdata[0]['user_id'];}?>">
            <div class="row">

                 <?php     
                       if (isset($userdata) && !empty($userdata)) {
                        $username = explode(",", $userdata[0]['username']);
                          $user_email = explode(",", $userdata[0]['user_email']);
                            $usermob = explode(",", $userdata[0]['usermob']);
                              $address = explode(",", $userdata[0]['address']);
                         if (!empty($username) && !empty($user_email) && !empty($usermob)) {
                             for ($i = 0; $i < count($address); $i++) {

                           ?>   
            <tr>
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">

                        	<div class="col-mb-3">
                            <input type="text" name="username[]" class="form-control m-input" placeholder="Enter your name" autocomplete="off" value="<?= $username[$i]?>" required>
                            </div>

                              <div class="col-mb-3">
                            <input type="text" name="uemail[]" class="form-control m-input" placeholder="Enter your email" autocomplete="off" value="<?= $user_email[$i]?>" required>
                        </div>
                            <div class="col-mb-3">
                             <input type="text" name="mobno[]" class="form-control m-input" placeholder="Enter your location" autocomplete="off" value="<?= $usermob[$i]?>" required>
                         </div>
                          <div class="col-mb-3">
                             <textarea type="text" name="location[]" id="w3review"  rows="2" cols="50"><?= $address[$i]?></textarea>
                         </div>


                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <?php
                                        }
                                    }
                                }
                                ?> 

                    <div id="newRow"></div>
                    <!-- <button id="addRow" type="button" class="btn btn-info">Add Row</button> -->

                    <button class="btn btn-info">Submit</button>
                </div>
            </tr>
            </div>
        </form>

        </table>
    </div>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
  <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<table><tr><div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += ' <div class="col-mb-3"><input type="text" name="username[]" class="form-control m-input" placeholder="Enter your name" autocomplete="off"></div>';

            html += ' <div class="col-mb-3"><input type="text" name="uemail[]" class="form-control m-input" placeholder="Enter your email" autocomplete="off"></div>';

            html += ' <div class="col-mb-3"><input type="text" name="mobno[]" class="form-control m-input" placeholder="Enter your mobile number" autocomplete="off"></div>';

            html += '<div class="col-mb-3"><textarea type="text" name="location[]" id="w3review" class="form-control m-input" rows="2" cols="42" placeholder="Enter your Location"></textarea></div>';

            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div><tr></table>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
</body>
</html>