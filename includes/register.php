
<?php if(isset($_POST['reg'])){

  $fn        = $_POST['fname'];
  $ln        = $_POST['lname'];
  $email     = $_POST['email'];
  $pass      = $_POST['pass'];
  $phone     = $_POST['phone'];
  $phone = ltrim($phone, '0');
  $course    = $_POST['course'];
  $regno     = $_POST['regno'];
  $pass      = md5($pass);



    // Create connection

      $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
   $sql = "SELECT * FROM users WHERE phone = '$phone' OR email = '$email'";
   
   if ($result = mysqli_query($conn,$sql)){
      $rowcount = mysqli_num_rows($result);
      if($rowcount >= 1){ 
        //if user exists?>


 <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("", "USER ALREADY EXISTS")

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
      }else{
        //insert user



  $t = time();
  $sql= "INSERT INTO `users` (`fname`, `lname`, `regno`, `email`, `phone`,`course`, `pass`,`createdat`, `updatedat`)
   VALUES ('$fn', '$ln','$regno','$email','$phone','$course', '$pass' , $t,$t)";
   
   if ($result = mysqli_query($conn,$sql)){

   $up = "+254".$phone;
   $m = $fn." ".$ln." - ".$regno." Welcome to Technical University of Kenya eClearance platform. Youve been successfully registered.";


    sms($up,$m);


 $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
   
   if ($result = mysqli_query($conn,$sql)){
      $rowcount = mysqli_num_rows($result);
      if($rowcount >= 1){ 
        while($row = $result->fetch_assoc()) {

          

   $_SESSION['uid'] = $row["id"];
   $_SESSION['utype'] = $row["priv"];
  $_SESSION['fname'] = $row["fname"];
   $_SESSION['lname'] = $row["lname"];

  $_SESSION['regno'] = $row["regno"];
  $_SESSION['course'] = $row["course"];
  $_SESSION['email'] = $row["email"];
  $_SESSION['phone'] = $row["phone"];
  $_SESSION['loggedin'] = "TRUE";
  $loggedin = 'TRUE';



        }
        //if user exists?>
     <script type="text/javascript">
      window.location.href="?page=home";
    </script>

      <?php
      }else{
        //if no user fetched
        ?>

     <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("wrong username or password", "ERROR")

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

    $("#login").removeClass("was-validated");

   $(".is").addClass("is-invalid");
</script>



  
     <?php  }
   }else{
    //no results
    ?>




<script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("check details and try again", "ERROR")

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

   $(".is").addClass("is-invalid");
</script>





    <?php
   }
   mysqli_close($conn);

        ?>



 
   

      <?php

    }
  
  

  
      }
   }else{
    //no results
    ?>

<script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("please try again", "ERROR")

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
   }
   mysqli_close($conn);
 }
}
?>
<style>
.input-group-text{
background-color: <?php echo $dchex; ?> !important;
color:white;

}
.far{
    font-size:23px !important;
}
.ig{
    border-color:<?php echo $dchex; ?> !important;
   /* border-style:dotted !important;*/
}
.text-muted{
    font-size:11px !important;
}
.invalid-feedback{
    font-size:11px !important;
}
</style>

<div class="row p-0 m-0">
<div class="mt-5 px-lg-4 p-0 p-lg-2 col-md-12 col-lg-12 col-xl-12">
<!-- Default form register -->
<!-- Material form register -->
<div class="card" style="box-shadow: none!important;">

    <h5 class="card-header <?php echo $dc; ?> white-text text-center py-2">
        <strong>Student Registration</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0 border border-slight ig">

        <!-- Form -->
        <form class="text-center needs-validation" action="" method="post" id="reg" style="color: #757575;">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="fname" name="fname" class="form-control validate" required>
                        <label for="fname">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input id="lname" name="lname" type="text" class="form-control validate" required>
                        <label for="lname">Last name</label>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col">
                    <!-- Reg No -->
                    <div class="md-form">
                        <input type="text" id="regno" name="regno" class="form-control validate" required> 
                        <label for="reg">Reg No.</label>
                    </div>
                </div>
                <div class="col">
                    <!-- course -->
                    <div class="md-form">
                    <select class="mdb-select md-form validate" id="course" name="course" required>
                    <option value="" selected>Select your course</option>
                    <option value="BTECH CN">BTECH CN</option>
                    <option value="BTECH CT">BTECH CT</option>
                    <option value="BTECH IT">BTECH IT</option>
                     <option value="DTECH CN">DTECH CN</option>
                    <option value="DTECH CT">DTECH CT</option>
                    <option value="DTECH IT">DTECH IT</option>
                  </select>
                  </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <!-- email -->
                    <div class="md-form">
                        <input type="email" id="email" name="email" class="form-control validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col">
                    <!-- phone -->
                    <div class="md-form">
                        <input type="number" id="phone" name="phone" class="form-control validate" required>
                        <label for="phone">Cell No.</label>
                        <small id="phonehelp" class="form-text text-muted mb-4 text-danger text-error">
                  
                </small>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <!-- pass -->
                    <div class="md-form">
                        <input type="password" id="pass" name="pass" class="form-control validate" required>
                        <label for="pass">Password</label>
                        <small id="passhelp" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>
                    </div>
                </div>
                <div class="col">
                    <!-- passc -->
                    <div class="md-form">
                        <input type="password" id="passc" name="passc" class="form-control validate" required>
                        <label for="passc">Password confirm</label>
                        <small id="passchelp" class="form-text text-muted mb-4">
                    Password and confirmation must match
                </small>
                    </div>
                </div>
            </div>
        

            <!-- Sign up button -->
            <center>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="reg" name="reg"  style="width:60%;">REGISTER</button>
          </center>

            <hr>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
<!-- Default form register -->
</div>
</div>

<script>
  function testagain(){
    var pn = $("#phone").val().length;
    if (pn !== 9){
      alert("phone number must be 9 numbers");
      return false
    }
  }
</script>
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {


        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');

        var pn = $("#phone").val().length;
        if (pn !== 10){
        $("#reg").removeClass("was-validated"); 
        $("#phone").removeClass("is-valid"); 
        $("#phone").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();
         $("#phonehelp").html("Phone number must be 10 digits");

        }else{
        $("#phonehelp").html("");
        $("#phone").removeClass("is-invalid"); 
        $("#phone").addClass("is-valid");


         var pw = $("#pass").val().length;
        if (pw < 8){
        $("#reg").removeClass("was-validated"); 
        $("#pass").removeClass("is-valid"); 
        $("#pass").addClass("is-invalid");
        $("#passhelp").html("Password must be at least 8 digits");
        $("#passhelp").addClass("text-danger");
        event.preventDefault();
        event.stopPropagation();
        }else{
          $("#passhelp").html("");
          $("#passhelp").removeClass("text-danger");


        $("#pass").removeClass("is-invalid"); 
        $("#pass").addClass("is-valid");

        var passc = $("#passc").val();
        var pass = $("#pass").val();

        if(passc !== pass){

        $("#passchelp").html("Confirmation and password dont match");
         $("#passchelp").addClass("text-danger");

        $("#reg").removeClass("was-validated"); 
         $("#passc").removeClass("is-valid"); 
        $("#passc").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();


        }






        }

        }





       
    

        }, false);
        




    });
  }, false);
})();


</script>

<script type="text/javascript">
function test(){

   var pn = $("#phoneno").val().length;
        if (pn !== 9){
        $("#phoneno").removeClass("is-valid"); 
        $("#phoneno").addClass("is-invalid");
        }else{

        if(pn === 9){


         $('#phoneno').keypress(function(){


         if($(this).val().length < 9){
           return true;
        
         }else{
          return false;
        
         }

       
        

        }); 


        }

        $("#phoneno").removeClass("is-invalid"); 
        $("#phoneno").addClass("is-valid");

        }

}


</script>

<script type="text/javascript">
    $('#institution').change(function() {

    instid = $('#institution').val();

//alert(instid);

if(instid === ''){
  $("#sd").css("display","none");
}else{
  $("#department option").remove();
     var nc = 'ajax/getdepartments.php?instid=' + instid;
     $('#department').load('ajax/getdepartments.php?instid=' + instid);
 $('#department').load('ajax/getdepartments.php?instid=' + instid);
 wto = setTimeout(function() {
  
   $('#department').material_select('destroy');   
$('#department').load('ajax/getdepartments.php?instid=' + instid);
$('#department').material_select();
$('#department').load('ajax/getdepartments.php?instid=' + instid);
    
}, 500);
 $("#sd").css("display","flex");
}



   

  });
</script>
<script type="text/javascript">
 $(document).ready(function() {
    $('.mdb-select').material_select();
});

</script>
