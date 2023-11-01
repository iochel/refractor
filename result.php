<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <div>

      <?php
      require('single-result.php');
      while ($row = $result->fetch_assoc()) {
      ?>
      <p>Name: <?php echo $row['first_name'] . " " . $row['last_name'];?></p>
      <p>Age: <?php echo $row['age'];?></p>
      <p>email: <?php echo $row['email'];?></p>
      
      <?php $_SESSION['fk-user-id'] = $row['user_id']; } 
      require('single-result-foreign.php');

      while ($row = $result->fetch_assoc()) {
      ?>
      <p>Date Taken: <?php echo $row['created_at'];?></p>
    </div>
    <div>
      <p>Result: <?php echo $row['result'];?></p>
      <?php $result1 = $row['result']; } 
      include("result-decision.php"); 
      
      ?>
      <p>Diagnosis: <?php echo $diagnose;?></p>  
      <p>Recommendation: <?php echo $reco;?></p>
    </div>

    <div>
      <form action="">
        <button>Home</button>
        <button>Print</button>
        <button>Download</button>
      </form>
    </div>
  </div>
</body>
</html>