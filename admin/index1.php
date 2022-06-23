
<?php
include("./admin_header.php");

$sql502 = "SELECT count(*) as numberofpropertybyagent, reserved_by FROM property_reserved_by group by reserved_by";
$result502 = $conn->query($sql502);
echo "<script>
var numberofpropertybyagent = [];
var reserved_by = [];
var reserved_by_names = [];
var sumeduppricereserved = [];
</script>";
if ($result502->num_rows > 0) {
  // output data of each row
  while($row502 = $result502->fetch_assoc()){
    $numberofpropertybyagent = $row502['numberofpropertybyagent'];
    $reserved_by = $row502['reserved_by'];
    $sql5322 = "SELECT sum(p.price) as sumedprice FROM properties p inner join property_reserved_by r on r.property_id = p.id where  reserved_by = '$reserved_by'";
    $result5322 = $conn->query($sql5322);
    
    if ($result5322->num_rows > 0) {
      // output data of each row
      $row5322 = $result5322->fetch_assoc();
        $sumeduppricereserved = $row5322['sumedprice'];
      }
      $sql0987800 = "SELECT firstname, lastname FROM users where email1 = '$reserved_by'";
      $result0987800 = $conn->query($sql0987800);

      if ($result0987800->num_rows > 0) {
        // output data of each row
        while($row0987800 = $result0987800->fetch_assoc()) {
          $firstname = $row0987800['firstname'];
          $lastname = $row0987800['lastname'];
        }
      }
    echo '<script>
    numberofpropertybyagent.push("'.$numberofpropertybyagent.'");
    reserved_by.push("'.$reserved_by.'");
    sumeduppricereserved.push("'.$sumeduppricereserved.'");
    reserved_by_names.push("'.$firstname.' '.$lastname.'");
    
    </script>';
  }
}




$sql502 = "SELECT count(*) as numberofpropertybyagent FROM property_reserved_by";
$result502 = $conn->query($sql502);
if ($result502->num_rows > 0) {
  // output data of each row
  $row502 = $result502->fetch_assoc();
    $numberofpropertybyagent = $row502['numberofpropertybyagent'];
}
// $sql502 = "SELECT * FROM property_reserved_by";
// $result502 = $conn->query($sql502);
// if ($result502->num_rows > 0) {
//   // output data of each row
//   while($row502 = $result502->fetch_assoc()){
//     $reserved_by = $row502['reserved_by'];
//     echo "<script>
    
//     </script>";
//   }
// }

// $totalactivitiestillnow = $numberofpropertybyagent;
$sql522 = "SELECT count(id) as caneleed, emplyeename FROM cancelled group by emplyeename";
$result522 = $conn->query($sql522);
echo "<script>
    var cancelledinjavascript = [];
    var cancelledby = [];
    var cancelled_by_names = [];
</script>";
if ($result522->num_rows > 0) {
  // output data of each row
  while($row522 = $result522->fetch_assoc()){
    $number_of_cancelled = $row522['caneleed'];
    $cancelledby = $row522['emplyeename'];
    $sql09878001 = "SELECT firstname, lastname FROM users where email1 = '$cancelledby'";
    $result09878001 = $conn->query($sql09878001);

    if ($result09878001->num_rows > 0) {
      // output data of each row
      while($row09878001 = $result09878001->fetch_assoc()) {
        $firstname1 = $row09878001['firstname'];
        $lastname1 = $row09878001['lastname'];
      }
    }
    // echo "<script>alert('".$number_of_cancelled."')</script>";
    // echo "<script>alert('".$cancelledby."')</script>";
    echo "<script>
    cancelledinjavascript.push('".$number_of_cancelled."');
    cancelledby.push('".$cancelledby."');
    cancelled_by_names.push('".$firstname1." ".$lastname1."');
    
    </script>";
  }
}



$sql5221 = "SELECT count(id) as solda, sold_by FROM property_sold_by group by sold_by";
$result5221 = $conn->query($sql5221);
echo "<script>
    var soldinjavascript = [];
    var soldby = [];
    var sumeduppricesold = [];
    var soldbyname = [];
</script>";
if ($result5221->num_rows > 0) {
  // output data of each row
  while($row5221 = $result5221->fetch_assoc()){
    $number_of_sold = $row5221['solda'];
    $soldby = $row5221['sold_by'];
    $sql09878 = "SELECT firstname, lastname FROM users where email1 = '$soldby'";
    $result09878 = $conn->query($sql09878);

    if ($result09878->num_rows > 0) {
      // output data of each row
      while($row09878 = $result09878->fetch_assoc()) {
        $firstname2 = $row09878['firstname'];
        $lastname2 = $row09878['lastname'];
      }
    }

    $sql53221 = "SELECT sum(p.price) as sumedprice1 FROM properties p inner join property_sold_by r on r.property_id = p.id where  sold_by = '$soldby'";
    $result53221 = $conn->query($sql53221);
    
    if ($result53221->num_rows > 0) {
      // output data of each row
      $row53221 = $result53221->fetch_assoc();
        $sumeduppricesold = $row53221['sumedprice1'];
        // echo "<script>console.log('".$sumeduppricesold."')</script>";
      }
    echo "<script>
    soldinjavascript.push('".$number_of_sold."');
    soldby.push('".$soldby."');
    sumeduppricesold.push('".$sumeduppricesold."');
    soldbyname.push('".$firstname2." ".$lastname2."');
    </script>";
  }
  
}
?>
    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
      // console.log(sumeduppricesold);
      // alert(soldby);
      yourNumber = parseInt("33B2DF", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray = [["Agent", "Reserveda", { role: "style" }, {type: 'string', role: 'tooltip', 'p': {'html': true}}]];
      for(i = 0; i < numberofpropertybyagent.length; i++){
        yourNumber+= 111111;
      // console.log(yourNumber);
        hexString = yourNumber.toString(16);
        twodarray.push([reserved_by_names[i],parseInt(numberofpropertybyagent[i]), hexString, "<div class='p-2 fs-15'>"+reserved_by_names[i]+"<br>Reserved: "+parseInt(numberofpropertybyagent[i])+"<br>GR: "+ sumeduppricereserved[i]+"</div>"]); 
        // console.log(twodarray);
      }

var sorted = numberofpropertybyagent.slice().sort(function(a, b) {
  return a - b;
});

var smallest = sorted[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest  = sorted[sorted.length - 1];
    smallest--;
    largest++
// console.log('Smallest: ' + smallest);
// console.log('Second Smallest: ' + secondSmallest);
// console.log('Second Largest: ' + secondLargest);
// console.log('Largest: ' + largest);
      // alert(twodarray);

      function drawChart() {
        var data = new google.visualization.arrayToDataTable(
          twodarray
          // ["George Street", 10, "#33B2DF"],
          // ["Silver", 8, "#546E7A"],
          // ["Gold", 3, "#D4526E"],
          // ["Platinum", 2, "color: #13D8AA"],
        );
        // data.addRows([
        //   twodarray
        //   // twodarray
        // ]);
        // data.addColumn();
        // data.addColumn('number', 'GR');
        var view = new google.visualization.DataView(data);
        view.setColumns([
          0,
          {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation",
          },
          1,
          2,
          3,
        ]);

        var options = {
          title: "Reserved",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {
            position: "none",
            labeledValueText: "both",
            textStyle: { color: "black", fontSize: 15, fontName: "Poppins" },
          },
          tooltip: {isHtml: true},
          hAxis: {
            minValue: smallest,
            maxValue: largest,
          },
          vAxis: {
            gridlines: {
              color: "none",
            },
          },
        };
        var chart = new google.visualization.BarChart(
          document.getElementById("barchart_values")
        );
        chart.draw(view, options);
      }






      yourNumber1 = parseInt("FFFFFF", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray1 = [["Agent", "Cancelled", { role: "style" }]];
      for(i = 0; i < cancelledinjavascript.length; i++){
        yourNumber1-= 1111;
      // console.log(yourNumber);
        hexString1 = yourNumber1.toString(16);
        // hexString1 = "green";
        twodarray1.push([cancelled_by_names[i],parseInt(cancelledinjavascript[i]),hexString1]); 
        // console.log(twodarray);
      }

      var sorted1 = cancelledinjavascript.slice().sort(function(a1, b1) {
        return a1 - b1;
      });

      var smallest1 = sorted1[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest1  = sorted1[sorted1.length - 1];
    smallest1--;
    largest1++;
      function drawChart1() {

        var data1 = google.visualization.arrayToDataTable(twodarray1);

        var view1 = new google.visualization.DataView(data1);
        view1.setColumns([
          0,
          {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation",
          },
          1,
          2,
        ]);
        var options1 = {
          title: "Cancelled",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {
            position: "none",
            labeledValueText: "both",
            textStyle: { color: "black", fontSize: 15, fontName: "Poppins" },
          },
          hAxis: {
            minValue: smallest1,
            maxValue: largest1,
          },
          vAxis: {
            gridlines: {
              color: "none",
            },
          },
        };
        var chart1 = new google.visualization.BarChart(
          document.getElementById("barchart_values1")
        );
        chart1.draw(view1, options1);
      }







      yourNumber12 = parseInt("000000", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray12 = [["Agent", "Sold", { role: "style" }, {type: 'string', role: 'tooltip', 'p': {'html': true}}]];
      for(i = 0; i < soldinjavascript.length; i++){
        yourNumber12+= 1111;
      // console.log(yourNumber);
        hexString12 = yourNumber12.toString(16);
        twodarray12.push([soldbyname[i],parseInt(soldinjavascript[i]),hexString12, "<div class='p-2 fs-15'>"+soldbyname[i]+"<br>Sold: "+parseInt(soldinjavascript[i])+"<br>GR: "+ sumeduppricesold[i]+"</div>"]); 
        // console.log(twodarray);
      }

      var sorted12 = soldinjavascript.slice().sort(function(a12, b12) {
        return a12 - b12;
      });

      var smallest12 = sorted12[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest12  = sorted12[sorted12.length - 1];
    smallest12--;
    largest12++;
      function drawChart12() {

        var data12 = google.visualization.arrayToDataTable(
          twodarray12
          
          // ["George Street", 10, "#33B2DF"],
          // ["Silver", 8, "#546E7A"],
          // ["Gold", 3, "#D4526E"],
          // ["Platinum", 2, "color: #13D8AA"],
        );

        var view12 = new google.visualization.DataView(data12);
        view12.setColumns([
          0,
          {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation",
          },
          1,
          2,
          3,
        ]);
        var options12 = {
          title: "Sold",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {
            position: "none",
            labeledValueText: "both",
            textStyle: { color: "black", fontSize: 15, fontName: "Poppins" },
          },
          tooltip: {isHtml: true},
          hAxis: {
            minValue: smallest12,
            maxValue: largest12,
          },
          vAxis: {
            gridlines: {
              color: "none",
            },
          },
        };
        var chart12 = new google.visualization.BarChart(
          document.getElementById("barchart_values12")
        );
        chart12.draw(view12, options12);
      }


      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart12);
    </script>
    <main>
    <aside>
        <div
          class="
            d-xl-none d-flex
            align-items-center
            justify-content-between
            py-1
            border-bottom
          "
        >
          <h5 class="fs-28 text-primary">Menu</h5>
          <button class="btn fs-28 p-0 text-primary" id="hide-sidebar-btn">
            <span class="material-icons">arrow_back</span>
          </button>
        </div>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li class="active">
            <div class="dropdown active">
              <a type="button" href="index.php" class="sidebar-item">
                <span class="material-icons">dashboard</span>
                Dashboard
              </a>
              <ul class="list-unstyled ps-0 mb-0 sidebar-dropdown-list">
                <li>
                  <a href="index.php">Overview</a>
                </li>
                <li class="active">
                  <a href="index1.php">Agents Graph</a>
                </li>
                <!-- <li>
                  <a href="properties.php">Properties</a>
                </li> -->
              </ul>
            </div>
          </li>
        </ul>
      </aside>
      <div class="content">
        <h1 class="mainUserText">Hello, Admin</h1>
        <p class="fs-20 mb-0">Welcome back</p>
        <hr class="my-0" />
        <div class="d-flex align-items-center justify-content-between flex-wrap">
          <h5 class="fs-28 fw-normal my-4">Reserved by Agents</h5>
          <!-- <h6 class="fs-28 fw-normal my-4">
            Total Activities: <span><?php //echo $numberofpropertybyagent; ?></span>
          </h6> -->
        </div>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values"
                  style="width: 100%; height: 480px"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values1"
                  style="width: 100%; height: 480px"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values12"
                  style="width: 100%; height: 480px"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer></footer>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>

    <script src="./assets/js/script.js"></script>
  </body>
</html>
