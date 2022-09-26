<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$password = 'Qaz159';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);
	if ($pdo) {
		// echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Link Click Count 點擊次數</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bg-lighter">
  <div class="container">
    <div class="row">
      <h1>Link Clicks Views</h1>

      <div class="container">
        <div class="row bg-dark round mb-5">
          <div class="col-md-8">
            <div class="card my-2" style="width:20">
              <div class="card-body">
                <h5>Link View Counter</h5>
                <p>Press The Link Below</p>
                <a href="https://www.adlinktech.com/tw/Machine_Condition_Monitoring_Cases" target="_blank" id="link" value="https://www.adlinktech.com/tw/Machine_Condition_Monitoring_Cases" onclick="myFunction()">https://www.adlinktech.com/tw/Machine_Condition_Monitoring_Cases</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card my-2" style="width:20">
                <div class="card-body">
                  <h2>Views:
                    <?php
                    $sql = "SELECT counter FROM click_count WHERE address = 'https://www.adlinktech.com/tw/Machine_Condition_Monitoring_Cases'";
                    $result = $pdo->query($sql);
                    $data_row=$result->fetch(PDO::FETCH_ASSOC);
                    echo $data_row['counter'];
                    ?>
                  </h2>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    
  </div>
  
  <script>
    function myFunction() {
      $(document).ready(function(){
      var link=$('a').attr('href'); //ajax href link
      console.log(link);
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: {
            "link":link
          },
          error: function(jqXHR, textStatus, errorThrown) {
          alert(jqXHR.responseText);
          },
          success: function(data) {
          // alert('success: ' + data);
          }
        });
      });
    }

    // location.reload();
  </script>

</body>

</html>

