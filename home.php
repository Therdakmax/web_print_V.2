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
          width="30px"> &nbsp;Add Type & Color</a>
      <a class="w3-bar-item w3-button w3-hover-black" href="addhotel.php"><img src="/image/3020274-200.png" id="movemenu3"
          width="30px"> &nbsp;Add Hotel</a>
      <a class="w3-bar-item w3-button w3-hover-black" href="logout.php"><img src="/image/logout.png" id="movemenu3"
          width="30px"> &nbsp;Logout</a>

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
                <option value="">Select data (null)</option>
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



              <label for="name_input">type:</label>
              <select id="data" name="data" class="select-class" onchange="updatePreview()">
                <option value="">Select data (null)</option>
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
              <label for="name_input">:</label>
              <select id="data2" name="data2" class="select-class" onchange="updatePreview()">
                <option value="">Select data (null)</option>
                <?php
                include('server.php');
                $sql_data = "SELECT id, color FROM color_data";
                $result_data = $con->query($sql_data);
                while ($row = $result_data->fetch_assoc()) {
                  echo "<option value='" . $row['color'] . "' class='option-class'>" . $row['color'] . "</option>";
                }
                $con = null;
                ?>

              </select>
              <div onchange="updatePreview()" class="select-class">
                <label for="number" style="display: block; font-weight: bold; margin-bottom: 8px;">Quantity</label>
                <input type="number" min="1" max="100" step="1" value="1" name="number" id="number"
                  style="width: 70px; padding: 6px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px;">
              </div>


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
                var data2 = document.getElementById("data2").value;
                var number = document.getElementById("number").value;

                document.getElementById("preview").innerHTML = hotel + "<br>" + "<br>" + "<br>" + data + "<br>" + data2 + "<br>" + "X" + number;
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
        var data2 = document.getElementById("data2").value;
        var number = document.getElementById("number").value;

        // Include the Thai font file
        var font = new FontFace('MN_Mocktail', 'url(/fonts/MN_Mocktail.ttf)');

        // Load the font
        font.load().then(function (loadedFont) {
          // Use the font
          pdf.setFont(loadedFont.family);

          // Add Thai text to the PDF
          pdf.setFontType("normal");
          pdf.setFontSize(5.5);
          pdf.text(2.5, 5, name);
        });
        var pdf = new jsPDF('l', 'mm', [100, 50], true);

        // DATA 1
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(5.5);
        pdf.text(2.5, 5, name);
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(3.5);
        pdf.text(12, 9, data);


        // DATA 2
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(3);
        pdf.text(12, 10.5, data2);


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
        pdf.text(3, 6.5, thaiDate + '/' + thaiMonth + '/' + thaiYear + ' ' + thaiHour + ':' + thaiMinute + ':' + thaiSecond);


        //linens
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(2);
        pdf.text(12, 6.5, "Linens");
        //pdf.text  number
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(2);
        pdf.text(12, 11.5, "X " + number);

        //pdf.text(15, 15, startTime);
        pdf.setFont("helvetica");
        pdf.setFontType("normal");
        pdf.setFontSize(2);
        pdf.text(3, 15, "By Laundry House");


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