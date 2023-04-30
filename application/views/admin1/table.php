<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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



  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>
</head>
<body>

<div id="container">
  <h1>Show Record</h1>

  <div id="body">
            
  <table class="table table-bordered">
    <!---Start Session sms display karnya sathi use kela jato -->
<div class="col-md-12">
<?php 
if($this->session->userdata('success')){
$success = $this->session->userdata('success');
if($success != "") {
?>
<div class="alert alert-success"><?php echo $success;?></div>
<?php
 }
}
?>

<?php 
if($this->session->userdata('danger')){
$danger = $this->session->userdata('danger');
if($danger != "") {
?>
<div class="alert alert-danger"><?php echo $danger;?></div>
<?php
 }
}
?>
</div>
<!--End Session-->
    <thead>
      <tr>
        <th>User ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       <?php
      foreach ($user as $key => $value) { ?>

      
      <tr>
        <td><?= $value['user_id']?></td>
        <td>
          
           <a href="<?php echo base_url()?>Welcome/adduser"><i class="fa fa-plus-circle" style="font-size:24px"></i></a>

          <a href="<?php echo base_url()?>Welcome/edituser/<?= $value['user_id']?>"><i class="fa fa-pencil-square" style="font-size:24px"></i></a>

          <a href="<?php echo base_url()?>Welcome/show/<?= $value['user_id']?>"><i class="fa fa-eye" style="font-size:24px;color:info"></i></a>

           <a href="<?php echo base_url()?>Welcome/deleteuser/<?= $value['user_id']?>"><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>


      </tr>
      <?php }?>
      
    </tbody>
  </table>
</div>



<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
