<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Check-in/out</title>
<style>
table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

button:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<h2>Employee Check-in/out</h2>

<table id="employeeTable">
  <tr>
    <th>Name</th>
    <th>ID</th>
    <th>Position</th>
    <th>Check-in Time</th>
    <th>Check-out Time</th>
  </tr>
  <?php
    // Randomly generate employee data
    $employees = array(
      array("Employee 1", "101", "Manager"),
      array("Employee 2", "102", "Assistant"),
      array("Employee 3", "103", "Clerk"),
      array("Employee 4", "104", "Supervisor"),
      array("Employee 5", "105", "Technician")
    );

    // Randomly generate entry times between 08:00 and 09:00
    function generateEntryTime() {
      $hour = str_pad(rand(8, 9), 2, '0', STR_PAD_LEFT);
      $minute = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
      return $hour . ':' . $minute;
    }

    // Output employee data and checkout button
    foreach ($employees as $employee) {
      echo "<tr>";
      echo "<td>" . $employee[0] . "</td>";
      echo "<td>" . $employee[1] . "</td>";
      echo "<td>" . $employee[2] . "</td>";
      echo "<td>" . generateEntryTime() . "</td>";
      echo "<td><button onclick='checkout(this)'>Check-out</button></td>";
      echo "</tr>";
    }
  ?>
</table>

<script>
function checkout(button) {
  // Get current time
  var now = new Date();
  var hours = now.getHours().toString().padStart(2, '0');
  var minutes = now.getMinutes().toString().padStart(2, '0');
  var currentTime = hours + ':' + minutes;

  // Get row of the clicked button
  var row = button.parentNode.parentNode;

  // Update checkout time cell with current time
  var checkoutTimeCell = row.cells[4];
  checkoutTimeCell.innerText = currentTime;

  // Disable checkout button after click
  button.disabled = true;
}
</script>

</body>
</html>
