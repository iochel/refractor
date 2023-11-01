<?php
include("list-of-diagnosis.php"); 
      
$diagnose = "";
$reco = "";

if ($result1 >= -1 && $result1 <= 10) {
  $diagnose = $diagnosis[0][0];
  $reco = $diagnosis[0][1];
} elseif ($result1 >= 11 && $result1 <= 16) {
    $diagnose = $diagnosis[1][0];
    $reco = $diagnosis[1][1];
} elseif ($result1 >= 17 && $result1 <= 20) {
    $diagnose = $diagnosis[2][0];
    $reco = $diagnosis[2][1];
} elseif ($result1 >= 21 && $result1 <= 30) {
    $diagnose = $diagnosis[3][0];
    $reco = $diagnosis[3][1];
} elseif ($result1 >= 31 && $result1 <= 40) {
    $diagnose = $diagnosis[4][0];
    $reco = $diagnosis[4][1];
} else {
    $diagnose = $diagnosis[5][0];
    $reco = $diagnosis[5][1];
}