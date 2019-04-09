
<?php 
if(isset($_POST['li'])){


  $email = $_POST['email'];
  $pass1  = $_POST['pass'];
  $pass  = md5($pass1);



   // Create connection

  $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
   $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass' ";
   
   if ($result = mysqli_query($conn,$sql)){
      $rowcount = mysqli_num_rows($result);
      if($rowcount >= 1){ 
        while($row = $result->fetch_assoc()) {

          

   $_SESSION['uid'] = $row["id"];


   
  $_SESSION['fname']  = $row["fname"];
   $_SESSION['lname'] = $row["lname"];

  $_SESSION['regno']  = $row["regno"];
  $_SESSION['course'] = $row["course"];
  $_SESSION['email']  = $row["email"];
  $_SESSION['phone']  = $row["phone"];
  $_SESSION['loggedin'] = "TRUE";
  $_SESSION['ut'] = $row['priv'];
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
 }}

// Check connection


  
?>
<style>
.far , .fas{
  font-size:23px !important;
}
.input-group-text{
background-color: <?php echo $dchex; ?> !important;
color:white;

}
.far{
    font-size:23px !important;
}
.ig{
    border-color:<?php echo $dchex; ?> !important;
    /*border-style:dotted !important;*/
}
.text-muted{
    font-size:11px !important;
}
.invalid-feedback{
    font-size:11px !important;
}
</style>

<div class="row p-0 m-0 pl-5 pr-5">
<div class="mt-5 px-lg-4 p-0 p-lg-2 col-md-12 col-lg-12 col-xl-12 pr-5 pl-5">


<!-- Material form login -->
<div class="card z-depth-0 " style="box-shadow: none!important;">

  <h5 class="card-header <?php echo $dc; ?> white-text text-center py-2 z-depth-0">
    <strong>User Login</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0 z-depth-0 border border-slight ig">

    <!-- Form -->
    <form class="text-center needs-validation" method="post" action="" style="color: #757575;">

      <!-- Email -->
      <div class="md-form">
        <input type="email" id="email" name="email"  class="form-control" required>
        <label for="email">E-mail</label>
      </div>

      <!-- Password -->
      <div class="md-form">
        <input type="password" id="pass" name="pass" class="form-control" required>
        <label for="pass">Password</label>
      </div>

      <div class="d-flex justify-content-around">
       
        <div>
          <!-- Forgot password -->
          <a href="#">Forgot password?</a>
        </div>
      </div>

      <!-- Sign in button -->

      <center>
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" id="li" name="li" style="width:60%;" type="submit">Log In</button>
      </center>

     
    </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->

</div>


</div>
<script>
  function testagain(){
    var pn = $("#phoneno").val().length;
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

        var pn = $("#phoneno").val().length;
        if (pn !== 9){
        $("#voterreg").removeClass("was-validated"); 
        $("#phoneno").removeClass("is-valid"); 
        $("#phoneno").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();
        }else{

        $("#phoneno").removeClass("is-invalid"); 
        $("#phoneno").addClass("is-valid");

        }





        var pw = $("#password").val().length;
        if (pw < 8){
        $("#voterreg").removeClass("was-validated"); 
        $("#password").removeClass("is-valid"); 
        $("#password").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();
        }else{

        $("#password").removeClass("is-invalid"); 
        $("#password").addClass("is-valid");

        var passc = $("#passc").val();
        var pass = $("#password").val();

        if(passc !== pass){

        $("#passchelp").html("Confirmation and password dont match");

        $("#voterreg").removeClass("was-validated"); 
        $("#password").removeClass("is-valid"); 
        $("#password").addClass("is-invalid");
         $("#passc").removeClass("is-valid"); 
        $("#passc").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();


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
