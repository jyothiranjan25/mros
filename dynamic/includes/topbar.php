
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>

.calci input[type="button"]
{
  
border-radius:2em;
background-color:#ff4456;
color: white;
width:100%;
 font-weight: bold;
 text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
}

.calci input[type="text"]
{
border-radius: 10px;
text-align: right;
background-color:white;
font-size:25px;
width:100%
}

</style>

<script>
//function for displaying values
function dis(val)
{
document.getElementById("edu").value+=val
 }
//function for evaluation
function solve()
{
let x = document.getElementById("edu").value
let y = eval(x)
document.getElementById("edu").value = y
}
//function for clearing the display
function clr()
{
document.getElementById("edu").value = ""
}
</script>
<!-- top navigation -->
       <div class="top_nav">
        <div class="nav_menu hideOnprint">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
            <ul class=" navbar-right">

 <form action="" method="POST" id="institute_form" name="institute_form"></form>
                <select  name="post_entity" id="post_entity"  form="institute_form" onchange="submit('institute_form')" class="form-control col-sm-1 col-md-2" > 
<?php 

// if($superadmin_access == 1){
$sq = mysqli_query($con,"SELECT * FROM `entity`");

// }else{
// $sq = mysqli_query($con,"SELECT i.* FROM `entity` i LEFT JOIN `login` l ON l.institute_id=i.id WHERE l.email='$login_email'");

// }

while($ins = mysqli_fetch_array($sq)){
if($ins['entity_name'] == $_SESSION['entity_name']){
  $selct = "selected";
}else{
  $selct = ""; 
}
?>
           <option value="<?= $ins['entity_name'] ?>"  <?= $selct ?>><?= $ins['entity_name'] ?></option> 
<?php } ?>
     </select>


            <li >
<a href="user_manual.html" class="btn btn-default" >
<i class="fa fa-question-circle"></i> HELP
</a>

</li>  
                     
                    
                                           <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                       <img src="images/profile.jpg" alt=""><?php echo $_SESSION['role'] ?>

          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" style="background:silver;margin-top: 18px;box-shadow: 0 10px 20px 0 rgba(0, 0, 128, 0.16), 0 2px 10px 0 rgba(1, 3, 128, 0.12);">


            <a class="dropdown-item" href="change_password.php"><i class="fa fa-key pull-right"></i><b> Change Password </b></a>

            <a class="dropdown-item" href="index.php?logout=1" ><i class="fa fa-sign-out pull-right" onclick="geeks();"></i><b> Log Out </b></a>
          </div>
        </li>

                    <li role="presentation" class="nav-item dropdown open">
                          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-calculator" style="font-size:25px;color:red"></i>
                          
                          </a>
                          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1" style="margin-top: 18px;box-shadow: 0 10px 20px 0 rgba(0, 0, 128, 0.16), 0 2px 10px 0 rgba(1, 3, 128, 0.12);">
                                                      <li class="nav-item" >
                                      <div class="calci">        
                                    <table>
                                    <th>Calculator</th>
                                    <tr>
                                    <td><input type="button" value="C" onclick="clr()"/> </td>
                                    <td colspan="3"><input type="text" id="edu"/></td>
                                    <!-- clr() function will call clr to clear all value -->
                                    </tr>
                                    <tr>
                                    <!-- creating buttons and assigning values-->
                                    <td><input type="button" value="+" onclick="dis('+')"/> </td>
                                    <td ><input type="button" value="1" onclick="dis('1')"/> </td>
                                    <td><input type="button" value="2" onclick="dis('2')"/> </td>
                                    <td><input type="button" value="3" onclick="dis('3')"/> </td>
                                    </tr>
                                    <tr>
                                    <td><input type="button" value="-" onclick="dis('-')"/> </td>
                                    <td><input type="button" value="4" onclick="dis('4')"/> </td>
                                    <td><input type="button" value="5" onclick="dis('5')"/> </td>
                                    <td><input type="button" value="6" onclick="dis('6')"/> </td>
                                    </tr>
                                    <tr>
                                    <td><input type="button" value="*" onclick="dis('*')"/> </td>
                                    <td><input type="button" value="7" onclick="dis('7')"/> </td>
                                    <td><input type="button" value="8" onclick="dis('8')"/> </td>
                                    <td><input type="button" value="9" onclick="dis('9')"/> </td>
                                    </tr>
                                    <tr>
                                    <td><input type="button" value="/" onclick="dis('/')"/> </td>
                                    <td><input type="button" value="." onclick="dis('.')"/> </td>
                                    <td><input type="button" value="0" onclick="dis('0')"/> </td>
                                    <!-- Evaluating function call eval()-->
                                    <td><input type="button" value="=" onclick="solve()"/> </td>
                                    </tr>
                                    </table>
                                    </div>
                                 </a>
                              </div>
                                  </ul>
                     </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->