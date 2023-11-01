<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
  <div>
    <form action="">
        <button>Back</button>
    </form>
    <?php
    require('single-result.php');

    while ($row = $result->fetch_assoc()) {
    ?>
    <div>
        <p>Name: <?php echo $row['first_name'] . " " . $row['last_name']; ?></p>
        <p>Age: <?php echo $row['age']; ?></p>
        <p>Email: <?php echo $row['email']; ?></p>
    </div>
    <?php
    }

    require('user-result.php');

    // Check if the result_id is set in the URL
    if (isset($_GET['result_id'])) {
        $result_id = $_GET['result_id'];

        // Display the result based on the result_id
        if (array_key_exists($result_id - 1, $resultsArray)) {
            $result = $resultsArray[$result_id - 1];
    ?>
            <div style='border: 2px solid black;'>
                <p>Result ID: <?php echo $result['result_id']; ?></p>
                <p>Result: <?php echo $result['result']; ?></p>
                <?php
                $result1 = $result['result'];
                include("result-decision.php");
                ?>
                <p>Diagnosis: <?php echo $diagnose; ?></p>
                <p>Recommendation: <?php echo $reco; ?></p>
                <h4>Date Taken: <?php echo $result['created_at']; ?></h4>
            </div>
    <?php
        } else {
            echo "pangalawa";
        }
    } else {
        // Redirect the user to the first result if no result_id is provided in the URL
        if (!empty($resultsArray)) {
            $firstResultId = 1;
            header("Location: view-results.php?result_id=$firstResultId");
            exit;
        } else {
            echo "simula pa lang";
        }
    }
    ?>
  </div>

  <div>
    <?php
    // Previous and Next buttons
    if (isset($_GET['result_id'])) {
        $currentResultId = $_GET['result_id'];

        // Previous button
        if ($currentResultId > 1) {
            $previousResultId = $currentResultId - 1;
    ?>
            <a href='view-results.php?result_id=<?php echo $previousResultId; ?>'>Previous</a>
    <?php
        }

        // Next button
        if ($currentResultId < count($resultsArray)) {
            $nextResultId = $currentResultId + 1;
    ?>
            <a href='view-results.php?result_id=<?php echo $nextResultId; ?>'>Next</a>
    <?php
        }
    }
    ?>
  </div>

  <form action="">
      <button>Home</button>
      <button>Print</button>
      <button>Download</button>
  </form>
</body>
</html>
