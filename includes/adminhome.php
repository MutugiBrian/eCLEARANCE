<?php 
$ut = $_SESSION['utype'];


if(isset($_POST['send'])){

$to = $_POST['mto'];
$to  = "+254".$to;
$m = $_POST['mtxt'];
$nm = $_POST['mdest'];


$m = 'Hallo '.$nm.' . A message from TUK eClearance : '.$m;

sms($to,$m);



}

if(isset($_POST['cs'])){
  $uid = $_POST['studid'];
  $sid = $_POST['secid'];
  $stat = $_POST['status'];
  $cby = $_SESSION['uid'];
  $sec = $_POST['sec'];





  if($stat == 1 || $stat == '1'){
  $queryc = "INSERT INTO `clearances` (`uid`, `sid`, `createdat`, `updatedat`, `cby`, `id`) VALUES ('".$uid."', '".$sid."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '".$cby."', NULL)";
  $qac = makequery($queryc);

  if($qac[0] == 'success'){


    //TEXT STUDENT
$sq2 = 'SELECT * FROM users WHERE id =  '.$uid.'';
$dq = makequery($sq2);
        if($dq[0] == 'success'){
        while($row2 = $dq[1]->fetch_assoc()){
          $m =  'Hallo '.$row2['fname'].' '.$row2['lname'].' - '.$row2['regno'].', You just got cleared by '.$sec.' on TUK eClearance. Please check your clearance status form. THANK YOU ';
          sms("+254".$row2['phone'], $m);

            ?>

       <?php }
    }
     

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){


   

 
  Command: toastr["success"]("", "STUDENT CLEARED SUCCESSFULLY")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 1000,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


 setInterval(function(){
     window.location.href = "?adminhome";
    }, 2000);
});
</script>


  <?php
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?adminhome";
  Command: toastr["error"]("", "ERROR")

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
}else{
  ?>

  <script type="text/javascript">
  alert("studid - 0");
</script>



<?php
}
?>

<?php
}

if(isset($_POST['deldep'])){

    $deptid = $_POST['deptid'];
  $query = "UPDATE `departments` SET `deleted` = '1' WHERE `departments`.`id` = '".$deptid."' ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "DEPARTMENT DELETED")

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
  Command: toastr["error"]("", "ERROR")

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
?>

<?php


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




    <div class="modal fade" id="sendsms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:green!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">SEND MESSAGE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="clear" action="" method="post">
      <div class="modal-body mx-3 h6">
      TO : <span id="studname" style="color: green !important;"></span> <br />
      MOBILE : 0<span id="studphone" style="color: green !important;"></span>

      <input type="hidden" id="mdest" name="mdest" />
      <input type="hidden" id="mto" name="mto" />
      </div>


      <center>
          <textarea rows="6" style="width:90% !important;" id="mtxt" name="mtxt">
            

          </textarea>
        </center>



      <div class="modal-footer d-flex justify-content-center">
        
        
          <input type="hidden" name="studid" id="studid"/>
          <input type="hidden" name="secid" id="secid"/>
          <input type="hidden" name="status" id="status"/>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mb" data-dismiss="modal">DISCARD <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mbd" type="submit" name="send" id="send" style="border-color: green !important;color: green !important;">SEND <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="clearstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:green!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">CLEAR STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 h6">
      CLEAR <span id="studnamec" style="color: green !important;"></span> WITH  <span id="secname" style="color: green !important;"></span>?
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <form id="clear" action="" method="post">
          <input type="hidden" name="studid" id="studidc"/>
          <input type="hidden" name="secid" id="secidc"/>
          <input type="hidden" name="status" id="statusc"/>
          <input type="hidden" name="sec" id="sec"/>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mb" data-dismiss="modal">NO <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mbd" type="submit" name="cs" id="cs" style="border-color: green !important;color: green !important;">YES <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>










<!-- Card-->
<div class="card testimonial-card  mt-5 mx-5" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>

  <!-- Background color -->
  <div class="card-up <?php echo $dc; ?> lighten-1"></div>

  <!-- Avatar -->
  <div class="avatar mx-auto white">
    <img src="../images/logo/<?php echo $slogo ; ?>" class="rounded-circle" alt="TUK logo">
  </div>

  <!-- Content -->
  <div class="card-body">
    <!-- Name -->
    <h4 class="card-title"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h4>
    <hr>
    <!-- Quotation -->
    <!-- <p class="h6"> <span class="font-weight-bold">USER EMAIL : </span><?php echo $_SESSION['email']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER REG NO : </span><?php echo $_SESSION['regno']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER COURSE : </span><?php echo $_SESSION['course']; ?></p>
     <p class="h6"> <span class="font-weight-bold">USER PHONE : </span><?php echo $_SESSION['phone']; ?></p> -->
     
   
    
   
  </div>





  <!-- Table with panel -->
<div class="card card-cascade narrower">

  <!--Card image-->
  <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

    <div>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-th-large mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-columns mt-0"></i>
      </button>
    </div>

    <a href="" class="white-text mx-3">CLEARANCE REQUESTS</a>

    <div>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-pencil-alt mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="far fa-trash-alt mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-info-circle mt-0"></i>
      </button>
    </div>

  </div>
  <!--/Card image-->

  <div class="px-4" style="position:relative !important;width:100% !important;overflow-x: scroll !important;">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table table-hover mb-0" >

        <!--Table head-->
        <thead>
          <tr ><!-- 
            <th>
              <input class="form-check-input" type="checkbox" id="checkbox">
              <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
            </th> -->
            <th class="th-lg" >
              <a >NAMES
                <i class="fas fa-user ml-1"></i>
              </a>
            </th>
            <?php 
        $si =  $_SESSION['sid'];
        if(isset($si)){
        $query = "SELECT * FROM `sections` WHERE id =  '".$si."' ";
        }else{
        $query = "SELECT * FROM `sections`";
      }
        $dq = makequery($query);
        if($dq[0] == 'success'){
        while($row = $dq[1]->fetch_assoc()){
          ?>
          <th class="th-lg">
              <a href=""><?php echo $row['name']; ?>
                <i class="fas fa-building ml-1"></i>
              </a>
            </th>

       <?php }}else{var_dump($dq);?> 
      <?php }?>
            <th class="th-lg">
              <a href="">ACTIONS
                <i class="fas fa-cogs ml-1"></i>
              </a>
            </th>
             <th class="th-lg">
              <a href="">MESSAGE
                <i class="fas fa-envelope ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
          <?php 
        $queryu = "SELECT r.*,u.* FROM requests r,users u WHERE u.priv = 1 AND u.email = r.uemail";
        $dqu = makequery($queryu);
        if($dqu[0] == 'success'){
        while($rowz = $dqu[1]->fetch_assoc()){
          $uid = $rowz['id'];
          $em = $rowz['email']; 
          $pn = $rowz['phone']; 
           $fn = $rowz['fname']; 
          ?>
         
          <tr>
            <!-- <th scope="row">
              <input class="form-check-input" type="checkbox" id="checkbox<?php echo $uid; ?>">
              <label class="form-check-label" for="checkbox<?php echo $uid; ?>" class="label-table"></label>
            </th> -->
            <td><?php echo $em; ?></td>


               <?php 
        $querys = "SELECT * FROM `sections`";
        $dqs = makequery($querys);
        if($dqs[0] == 'success'){
        while($rows = $dqs[1]->fetch_assoc()){
          $sid = $rows['id'];
          $sn = $rows['name'];


          $query2 = "SELECT * FROM `clearances` WHERE uid = $uid and sid = $sid";
        $dq2 = makequery($query2);
        if($dq2[0] == 'success'){
          
        while($rowstat = $dq2[1]->fetch_assoc()){
          if($rowstat['sid'] == $sid){
            $cs = 1;
          }else{
           $cs = 0; 
          }
        }
      }else{
           $cs = 0;
        }


          ?>
  <td>
    <?php // echo $query2; ?>
  <select class="browser-default custom-select" <?php if($cs == 1){ echo 'disabled style="border-color:green !important;"';}?> onchange="clearstud('<?php echo $uid ?>','<?php echo $sid ?>',this.value,'<?php echo $fn ?>','<?php echo $sn ?>')">
  <option  value="1" <?php if($cs == 1){ echo 'selected';}?>>cleared</option>
  <option value="0" <?php if($cs == 0 || $cs == ""){ echo 'selected';}?>>pending</option>
</select>
</td>

       <?php
       $cs = 0;
        } ?>


        <td>
              <button type="button" class="btn btn-outline-primary waves-effect btn-sm" onclick="text('<?php echo $pn; ?>','<?php echo $uid; ?>','<?php echo $fn; ?>')">Send SMS </button>
            </td>
          </tr>


      <?php }else{var_dump($dq);?> 
      <?php }?>
            
            
         
         <?php }}else{var_dump($dqu);?> 
      <?php }?>
        </tbody>
        <!--Table body-->
      </table>
      <!--Table-->
    </div>

  </div>

</div>
<!-- Table with panel -->

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
  

 

  <script type="text/javascript">
    function clearstud(studid,secid,status,fname,secname){
      /*alert(studid+" "+secid+" "+status);*/
      $("#studnamec").html(fname);
      $("#secname").html(secname);
      $("#sec").val(secname);
      $("#studidc").val(studid);
      $("#secidc").val(secid);
      $("#statusc").val(status);
      $("#clearstudent").modal();
    }

    function text(phone,uid,fname){
       /*alert(phone+" "+uid+" "+fname);*/


       $("#studname").html(fname);
       $("#mdest").val(fname);
       $("#mto").val(phone);
      $("#studphone").html(phone);
      $("#sendsms").modal();
    }
  </script>