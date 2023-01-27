<?php session_start();
if ($_SESSION['id'] != "") { ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>LAUNDRY HOUSE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Stylesheet" href="/css/print.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  </head>

  <body>

    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"
          href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-theme-l1" id="movetxt">LAUNDRY HOUSE</a>
      </div>
    </div>

    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
      <a href="javascript:void(0)" onclick="w3_close()"
        class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
        <i class="fa fa-remove"></i>
      </a>
      <h4 class="w3-bar-item"><b>MENU</b></h4>
      <a class="w3-bar-item w3-button w3-hover-black" href="register.php"><img src="/image/add.png" id="movemenu"
          width="30px"> &nbsp;Add User</a>
      <a class="w3-bar-item w3-button w3-hover-black" href="adddata.php"><img src="/image/printicon.png" id="movemenu2"
          width="30px"> &nbsp;Add Data</a>
      <a class="w3-bar-item w3-button w3-hover-black" href="addhotel.php"><img src="/image/3020274-200.png" id="movemenu3"
          width="30px"> &nbsp;Add Hotel</a>

    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
      id="myOverlay"></div>

    <!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
    <div class="w3-main" style="margin-left:250px">

      <div class="w3-row w3-padding-64">
        <div class="w3-twothird w3-container">
          <h1 class="w3-text-teal">PRINT</h1>

          <body>
          <form>
  <label for="name_input">Hotel:</label>
  <select id="name" name="name_input" class="select-class" onchange="updatePreview()">
    <option value="">Select Hotel</option>
    <?php
    include_once('server.php');
    $sql_set = "SELECT id, name_hotel FROM hotel";
    $result_set = $con->query($sql_set);
    while ($row = $result_set->fetch_assoc()) {
      echo "<option value='" . $row['name_hotel'] . "' class='option-class'>" . $row['name_hotel'] . "</option>";
    }
    $con = null;
    ?>
  </select>

  <!-- เว้น Data ให้ชิดกับ option -->
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
  
  
  <label for="name_input">Data:</label>
  <select id="data" name="data" class="select-class" onchange="updatePreview()">
    <option value="">Select data</option>
    <?php
    include('server.php');
    $sql_data = "SELECT id, data_name FROM data";
    $result_data = $con->query($sql_data);
    while ($row = $result_data->fetch_assoc()) {
      echo "<option value='" . $row['data_name'] . "' class='option-class'>" . $row['data_name'] . "</option>";
    }
    $con = null;
    ?>
  </select>
  <div id="preview"></div>
  <div id="box" style="width: 500px; height: 250px; display:none;"></div>
  <div>
    <input type="button" value="Print PDF" onclick="createPDF()">
  </div>
</form>

<script>
    function updatePreview() {
        var hotel = document.getElementById("name").value;
        var data = document.getElementById("data").value;

        document.getElementById("preview").innerHTML =  hotel + "<br>" +  data;
        document.getElementById("box").style.display = "block";
    }
</script>






          </body>
        </div>
        <div class="w3-third w3-container">
          <p class="w3-border w3-padding-large w3-padding-32 w3-center">150x80</p>
          <p class="w3-border w3-padding-large w3-padding-64 w3-center">250x150</p>
        </div>
      </div>


      <footer id="myFooter">
        <div class="w3-container w3-theme-l2 w3-padding-32">
          <h4>Footer</h4>
        </div>

        <div class="w3-container w3-theme-l1">
          <p>Powered by <a href="" target="_blank">MaxDev</a></p>
        </div>
      </footer>

      <!-- END MAIN -->
    </div>

    <script>
      // Get the Sidebar
      var mySidebar = document.getElementById("mySidebar");

      // Get the DIV with overlay effect
      var overlayBg = document.getElementById("myOverlay");

      // Toggle between showing and hiding the sidebar, and add overlay effect
      function w3_open() {
        if (mySidebar.style.display === 'block') {
          mySidebar.style.display = 'none';
          overlayBg.style.display = "none";
        } else {
          mySidebar.style.display = 'block';
          overlayBg.style.display = "block";
        }
      }

      // Close the sidebar with the close button
      function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
      }
    </script>
    <!--js Print-->
    <script>
      function createPDF() {
        var name = document.getElementById("name").value;
        var data = document.getElementById("data").value;
        if (!name) {
          alert("Please select the hotel!");
          return;
        } if (!data) {
          alert("Please select the Data!");
          return;
        }

        // Create a new PDF
        var pdf = new jsPDF('l', 'mm', [110, 300]);

        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(20);
        pdf.text(10, 10, name);
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(10);
        pdf.text(10, 25, data);

        var currentDate = new Date();

        // create a date object with the current date and time in Thailand
        var thaiTime = new Date(currentDate.getTime() + (currentDate.getTimezoneOffset() * 60000) + (420 * 60000));

        // get the date, month, year, hour, minute and second in Thailand
        var thaiDate = thaiTime.getDate();
        var thaiMonth = thaiTime.getMonth() + 1;
        var thaiYear = thaiTime.getFullYear();
        var thaiHour = thaiTime.getHours();
        var thaiMinute = thaiTime.getMinutes();
        var thaiSecond = thaiTime.getSeconds();

        // add the date, month, year, hour, minute and second to the PDF
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(2);
        pdf.text(10, 15, thaiDate + '/' + thaiMonth + '/' + thaiYear + ' ' + thaiHour + ':' + thaiMinute + ':' + thaiSecond);

        //pdf.text(10,27, thaiTime);


        //pdf.text(15, 15, startTime);


        // Print the PDF

        pdf.autoPrint();
        window.open(pdf.output("bloburl"));
      }

    </script>
  <?php } else {
  echo "<script>";
  echo "window.location.href='index.php';";
  echo "</script>";
} ?>
</body>

</html>