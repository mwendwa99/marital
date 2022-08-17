<?php

// update the status of the task to resolved
if (isset($_GET)) {
  $id = $_GET["id"];
  $query = "update `cases` set cur_status = 'Resolved'  where case_id = $id";

  include('connect.php');

  // handle connection error
  if (!$connection->query($query)) {
    echo ("Error description: " . $connection->error);
  }

  $connection->close();

  header("Location: ../allcases.php");
  exit();
}
