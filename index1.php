
<?php
include("./admin_header.php");
$sql502 = "SELECT count(*) as numberofpropertybyagent, reserved_by FROM property_reserved_by where reserved_by = '$employee_username'";
$result502 = $conn->query($sql502);
echo "<script>
var numberofpropertybyagent = [];
var reserved_by = [];
var sumeduppricereserved = [];
</script>";
if ($result502->num_rows > 0) {
  // output data of each row
  while($row502 = $result502->fetch_assoc()){
    $numberofpropertybyagent = $row502['numberofpropertybyagent'];
    $reserved_by_email = $row502['reserved_by'];
    $reserved_by = $first_name;
    // $sumeduppricereserved += $row502['price'];
    $sql5322 = "SELECT sum(p.price) as sumedprice FROM properties p inner join property_reserved_by r on r.property_id = p.id where reserved_by = '$reserved_by_email'";
    $result5322 = $conn->query($sql5322);
    
    if ($result5322->num_rows > 0) {
      // output data of each row
      $row5322 = $result5322->fetch_assoc();
        $sumeduppricereserved = $row5322['sumedprice'];
      }
    echo '<script>
    numberofpropertybyagent.push("'.$numberofpropertybyagent.'");
    reserved_by.push("'.$reserved_by.'");
    sumeduppricereserved.push("'.$sumeduppricereserved.'");
    // console.log("'.$sumeduppricereserved.'");
    </script>';
  }
}




$sql502 = "SELECT count(*) as numberofpropertybyagent FROM property_reserved_by where reserved_by = '$employee_username'";
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
?>
    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
  <script type="text/javascript">
      yourNumber = parseInt("33B2DF", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray = [["Agent", "Reserved", { role: "style" }, {type: 'string', role: 'tooltip', 'p': {'html': true}}]];
      for(i = 0; i < numberofpropertybyagent.length; i++){
        yourNumber+= 111111;
      // console.log(yourNumber);
        hexString = yourNumber.toString(16);
        twodarray.push([reserved_by[i],parseInt(numberofpropertybyagent[i]),hexString, "<div class='p-2 fs-15'>"+reserved_by[i]+"<br>Reserved: "+parseInt(numberofpropertybyagent[i])+"<br>GR: "+ sumeduppricereserved[i]+"</div>"]); 
        // console.log(twodarray);
      }

    var sorted = numberofpropertybyagent.slice().sort(function(a, b) {
      return a - b;
    });

    var smallest = sorted[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest  = sorted[sorted.length - 1];
    smallest = parseInt(smallest);
    if(smallest < 6){

    }else{
      smallest = smallest - 6;
    }
    largest = parseInt(largest) + 5;
    // console.log('Smallest: ' + smallest);
    // console.log('Second Smallest: ' + secondSmallest);
    // console.log('Second Largest: ' + secondLargest);
    // console.log('Largest: ' + largest);
      // alert(twodarray);
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          twodarray
          
          // ["George Street", 10, "#33B2DF"],
          // ["Silver", 8, "#546E7A"],
          // ["Gold", 3, "#D4526E"],
          // ["Platinum", 2, "color: #13D8AA"],
        );

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
          // 'display':"false",
          title: "Reserved",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {
            position: "none",
            // colors:['red','#004411'],
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
  </script>
  
<?php
$sql522 = "SELECT count(*) as caneleed FROM cancelled where emplyeename = '$employee_username'";
$result522 = $conn->query($sql522);
echo "<script>
    var cancelledinjavascript = [];
</script>";
if ($result522->num_rows > 0) {
  // output data of each row
  $row522 = $result522->fetch_assoc();
    $number_of_cancelled = $row522['caneleed'];
    echo "<script>
    cancelledinjavascript.push('".$number_of_cancelled."');
    </script>";
}
?>
<!--second graph-->
  <script type="text/javascript">
      // yourNumber1 = parseInt("33B2DF", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray1 = [["Agent", "Cancelled", { role: "style" }]];
      for(i = 0; i < cancelledinjavascript.length; i++){
        // yourNumber1+= 111111;
      // console.log(yourNumber);
        hexString1 = "yellow";
        twodarray1.push([reserved_by[i],parseInt(cancelledinjavascript[i]),hexString1]); 
        // console.log(twodarray);
      }

    var sorted1 = cancelledinjavascript.slice().sort(function(a1, b1) {
      return a1 - b1;
    });

    var smallest1 = sorted1[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest1  = sorted1[sorted1.length - 1];
    smallest1 = parseInt(smallest1);
    if(smallest1 < 6){

    }else{
      smallest1 = smallest1 - 6;
    }
    largest1 = parseInt(largest1) + 5;
    // console.log('Smallest: ' + smallest);
    // console.log('Second Smallest: ' + secondSmallest);
    // console.log('Second Largest: ' + secondLargest);
    // console.log('Largest: ' + largest);
      // alert(twodarray);
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          twodarray1
          
          // ["George Street", 10, "#33B2DF"],
          // ["Silver", 8, "#546E7A"],
          // ["Gold", 3, "#D4526E"],
          // ["Platinum", 2, "color: #13D8AA"],
        );

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
        ]);

        var options = {
          title: "Cancelled",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {

            position: "none",
            labeledValueText: "both",
            // color: "red",
            // labels:{

            // },
            // fillStyle: "red",
            textStyle: { color: "black", fontSize: 15, fontName: "Poppins" },
          },
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
          document.getElementById("barchart_values1")
        );
        chart.draw(view, options);
      }
  </script>
<?php
$sql523 = "SELECT count(*) as sold_by1, sold_by FROM property_sold_by where sold_by = '$employee_username'";
$result523 = $conn->query($sql523);
echo "<script>
    var sold_by = [];
    var sumeduppricesold = [];
</script>";
if ($result523->num_rows > 0) {
  // output data of each row
  $row523 = $result523->fetch_assoc();
    $sold_by = $row523['sold_by1'];
    $sold_by_email = $row523['sold_by'];
    $sql53221 = "SELECT sum(p.price) as sumedprice1 FROM properties p inner join property_sold_by r on r.property_id = p.id where  sold_by = '$sold_by_email'";
    $result53221 = $conn->query($sql53221);
    
    if ($result53221->num_rows > 0) {
      // output data of each row
      $row53221 = $result53221->fetch_assoc();
        $sumeduppricesold = $row53221['sumedprice1'];
        
        // echo "<script>console.log('".$sumeduppricesold."')</script>";
      }
    echo "<script>
    sold_by.push('".$sold_by."');
    sumeduppricesold.push('".$sumeduppricesold."');
    </script>";
}
?>
<!--third graph-->
<script type="text/javascript">
      // yourNumber1 = parseInt("33B2DF", 16);
      // console.log(yourNumber);
      // console.log(hexString);
      var twodarray2 = [["Agent", "Sold", { role: "style" }, {type: 'string', role: 'tooltip', 'p': {'html': true}}]];
      for(i = 0; i < sold_by.length; i++){
        // yourNumber1+= 111111;
      // console.log(yourNumber);
        hexString2 = "red";
        twodarray2.push([reserved_by[i],parseInt(sold_by[i]),hexString2, "<div class='p-2 fs-15'>"+reserved_by[i]+"<br>Sold: "+parseInt(sold_by[i])+"<br>GR: "+ sumeduppricesold[i]+"</div>"]); 
        // console.log(twodarray);
      }

    var sorted2 = sold_by.slice().sort(function(a2, b2) {
      return a2 - b2;
    });

    var smallest2 = sorted2[0],                      
    // secondSmallest = sorted[1],                
    // secondLargest = sorted[sorted.length - 2], 
    largest2  = sorted2[sorted2.length - 1];
    smallest2 = parseInt(smallest2);
    if(smallest2 < 6){

    }else{
      smallest2 = smallest2 - 6;
    }
    largest2 = parseInt(largest2) + 5;
    // console.log('Smallest: ' + smallest);
    // console.log('Second Smallest: ' + secondSmallest);
    // console.log('Second Largest: ' + secondLargest);
    // console.log('Largest: ' + largest);
      // alert(twodarray);
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          twodarray2
          
          // ["George Street", 10, "#33B2DF"],
          // ["Silver", 8, "#546E7A"],
          // ["Gold", 3, "#D4526E"],
          // ["Platinum", 2, "color: #13D8AA"],
        );

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
          title: "Sold",
          width: "100%",
          height: 400,
          bar: { groupWidth: "100%" },
          legend: {

            position: "none",
            labeledValueText: "both",
            // color: "red",
            // labels:{

            // },
            // fillStyle: "red",
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
          document.getElementById("barchart_values2")
        );
        chart.draw(view, options);
      }
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
                  <a href="index1.php">Agent Graph</a>
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
        <h1 class="mainUserText">Hello, <?php echo $first_name; ?></h1>
        <p class="fs-20 mb-0">Welcome back</p>
        <hr class="my-0" />
        <div class="d-flex align-items-center justify-content-between flex-wrap">
          <h5 class="fs-28 fw-normal my-4">Agent Graph</h5>
          <h6 class="fs-28 fw-normal my-4">
            Total Activities: <span><?php echo $numberofpropertybyagent; ?></span>
          </h6>
        </div>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-md-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values"
                  style="width: 100%; height: 480px"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-md-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values2"
                  style="width: 100%; height: 480px"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row align-items-stretch g-3">
          <div class="col-12">
            <div class="py-4 px-md-5 h-100">
              <div class="h-100">
                <div
                  id="barchart_values1"
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
