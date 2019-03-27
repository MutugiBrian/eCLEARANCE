<?php 
$ut = $_SESSION['utype'];


if(isset($_POST['rc'])){





   $query = "INSERT INTO `requests` (`uemail`, `createdat`) VALUES ('".$_SESSION['email']."', CURRENT_TIMESTAMP)";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "CLEARANCE REQUESTED SUCCESSFULLY")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>


  <?php
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?home";
  Command: toastr["error"]("", "ERROR REQUESTING CLEARANCE")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>

  <?php 
  endpost();
}

}







?>
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.ab{
 border-color:<?php echo $hex3; ?> !important;
 color:<?php echo $hex3; ?> !important;
}
.mb{
 border-color:<?php echo $dchex; ?> !important;
 color:<?php echo $dchex; ?> !important;
}
.mbd{
 border-color:red !important;
 color:red !important;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
a.h{
color: <?php echo $dchex; ?> !important; 
}
.mi{
color: <?php echo $dchex; ?> !important;  
}
.cf .card-body .fas{
  color : <?php echo $dchex; ?> !important;
}
.cf .card-body .far{
  color : <?php echo $dchex; ?> !important;
}
@media(min-width: 801px){
 .ac{
  font-size:75px;
} 
.dl{
  font-size:15px;
}
}
@media(max-width: 801px){
 .ac{
  font-size:25px;
} 
}
.af{
  color:<?php echo $hex3; ?> !important;
  font-weight:bold;
;
}
  </style>









<!-- Card -->
<div class="card testimonial-card  mt-5 mx-5" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>

  <!-- Background color -->
  <div class="card-up <?php echo $dc; ?> lighten-1"></div>

  <!-- Avatar -->
  <div class="avatar mx-auto white">
    <img src="images/logo/<?php echo $slogo ; ?>" class="rounded-circle" alt="woman avatar">
  </div>

  <!-- Content -->
  <div class="card-body">
    <!-- Name -->
    <h4 class="card-title"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h4>
    <hr>
    <!-- Quotation -->
    <p class="h6"> <span class="font-weight-bold">USER EMAIL : </span><?php echo $_SESSION['email']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER REG NO : </span><?php echo $_SESSION['regno']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER COURSE : </span><?php echo $_SESSION['course']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER PHONE : </span><?php echo $_SESSION['phone']; ?></p>

     <hr />
 <div class="row">
  <div class="col text-right">
<form method="post" action="">


<?php

$query2 = "SELECT * FROM `requests` WHERE uemail = '".$_SESSION['email']."' ";
        $dq2 = makequery($query2);
        if($dq2[0] == 'success'){
          
        while($rowstat = $dq2[1]->fetch_assoc()){
          if($rowstat['uemail'] == $_SESSION['email']){
            $cs = 1;
          }else{
           $cs = 0; 
          }
        }
      }else{
           $cs = 0;
        }
 ?>
<button class="btn btn-primary" name="rc" name="rc" type="submit" <?php if($cs == 1){ echo "disabled"; }?>><i class="fas fa-magic mr-1"></i> REQUEST CLEARANCE</button>
</form>
</div>
 <div class="col text-left">
<a class="btn btn-default" href="?page=form">CLEARANCE HISTORY<i class="fas fa-magic ml-1"></i></a>
</div>
 </div>
     
   
    
   
  </div>

</div>
<!-- Card -->

  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      },
      options: {
        responsive: true
      }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }

    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);

    new Chart(document.getElementById("horizontalBar"), {
      "type": "horizontalBar",
      "data": {
        "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
        "datasets": [{
          "label": "My First Dataset",
          "data": [22, 33, 55, 12, 86, 23, 14],
          "fill": false,
          "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
          ],
          "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
            "rgb(201, 203, 207)"
          ],
          "borderWidth": 1
        }]
      },
      "options": {
        "scales": {
          "xAxes": [{
            "ticks": {
              "beginAtZero": true
            }
          }]
        }
      }
    });

  </script>
  <script type="text/javascript">



$('.edp').pickadate({
// An integer (positive/negative) sets it relative to today.
format: 'dd-mm-yyyy',
min: +1
// `true` sets it to today. `false` removes any limits.
})

$("#deptid2").material_select();
$('#elecstarttime').pickatime({});
$('#elecendtime').pickatime({
});
   
  </script>

  




    ?>


