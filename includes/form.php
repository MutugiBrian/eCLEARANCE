

<style type="text/css">
    .pt{
        font-size:16px;
        margin-left: 10px !important;
        margin-top:5px !important;
    }
    .tth th{
        font-weight: bold !important;
        font-size:20px;
    }
    .tlt{
        border-right: 1px solid black;
    }
    .trt{
        padding-left: 5px !important;
    }
    tr td{
        font-size:18px;
    }
    .lt{
        float:right !important;

        font-size:20px;
    }
</style>
<div id="ps" class="m-1 p-1" >


<div class="text-center" style="margin-bottom: 15px !important;">
<center>
<img  class="img-fluid flex-center img-circle  waves-light mt-0 pt-0 mx-auto" height="200px" width="200px"src="images/logo/<?php echo $slogo ; ?>" alt="TUK logo" >

<div class="mx-auto text-bold font-weight-bold my-1" style="font-size:20px;">STUDENT CLEARANCE STATUS FORM</div>
</center>
</div>


<div class="ml-1 text-bold font-weight-bold my-1 pt" >STUDENT REGISTRATION NUMBER : <?php echo $_SESSION['regno']; ?></div>
<div class="ml-1 text-bold font-weight-bold my-1 pt" >STUDENT NAME :  <?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></div>
<div class="ml-1 text-bold font-weight-bold my-1 pt" >STUDENT EMAIL :  <?php echo $_SESSION['email'];?></div>
<div class="ml-1 text-bold font-weight-bold my-1 pt" >STUDENT PHONE :  <?php echo "0".$_SESSION['phone']; ?></div>


    <table style="margin-left: 10px !important;margin-right: 10px !important;width:90% !important;margin-top:20px !important;">
  <tr class="tth" style="border-bottom: 1px solid black;">
    <th class="tlt" style="padding-left:2px !important;">SECTION</th>
    <th class="trt" style="padding-left:2px !important;">STATUS </th> 
  </tr>



<?php 
$mid  =  $_SESSION['uid'] ;
$sq = 'SELECT c.* , s.* FROM clearances c, sections s WHERE c.sid = s.id AND c.uid = '.$mid;
$dq = makequery($sq);
        if($dq[0] == 'success'){
        while($row = $dq[1]->fetch_assoc()){
            ?>


   <tr style="border-bottom: 1px solid black;">
      <td class="tlt"><?php echo $row['name']; ?></td>
      <td class="trt">CLEARED <i class="font-weight-bold lt fa fa-check  mt-1" style="color:green !important;"></i></td>
  </tr>

       <?php }
    }
     

?>


<?php 
$mid  =  $_SESSION['uid'] ;
$sq2 = 'SELECT * FROM sections s WHERE s.id NOT IN (SELECT sid FROM clearances WHERE uid = '.$mid.')';
$dq = makequery($sq2);
        if($dq[0] == 'success'){
        while($row2 = $dq[1]->fetch_assoc()){

            ?>

     <tr style="border-bottom: 1px solid black;">
      <td class="tlt"><?php echo $row2['name']; ?></td>
      <td class="trt">PENDING <i class="lt fa fa-times mt-1"  style="color:red !important;"></i></td>
  </tr>


       <?php }
    }
     

?>







  </table>


  
</div>



<a href="#" class="btn btn-success" onclick="printdiv()">Print</a>



<script type="text/javascript">
function printdiv()
{
    //your print div data
    //alert(document.getElementById("printpage").innerHTML);
    var newstr=document.getElementById("ps").innerHTML;

    var header='<header><div align="center"><h3 style="color:#EB5005"> TECHNICAL UNIVERSITY OF KENYA - eCLEARANCE </h3></div><br></header><hr><br>';
    var footer = '<div style="position:absolute;bottom: 10px !important;"><div>SIGNATURE________________ BY_______________________ DATE ___ / ___ / ____  STAMP :  </div><span style="margin-top:10px;"> &copy; 2019 TECHNICAL UNIVERSITY OF KENYA </span></div>';


    //You can set height width over here
    var popupWin = window.open('', '_blank', 'width=1100,height=600');
    popupWin.document.open();
    popupWin.document.write('<html> <body onload="window.print()">'+ newstr + '</html>'+footer);
    popupWin.document.close(); 
    return false;
}
</script>