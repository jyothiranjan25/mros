<?php



?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
  .calci input[type="button"] {

    border-radius: 2em;
    background-color: #ff4456;
    color: white;
    width: 100%;
    font-weight: bold;
    text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
  }

  /* .calci input[type="button"]:hover
 {
 text-shadow: 0 0 2em rgba(255,255,255,1);
 color:#FFFFFF;
 border-color:#FFFFFF;
} */
  .calci input[type="text"] {
    border-radius: 10px;
    text-align: right;
    background-color: white;
    font-size: 25px;
    width: 100%
  }
</style>

<script>
  //function for displaying values
  function dis(val) {
    document.getElementById("edu").value += val
  }
  //function for evaluation
  function solve() {
    let x = document.getElementById("edu").value
    let y = eval(x)
    document.getElementById("edu").value = y
  }
  //function for clearing the display
  function clr() {
    document.getElementById("edu").value = ""
  }
</script>
<!-- top navigation -->
<<<<<<< HEAD
<div class="top_nav">
  <div class="nav_menu hideOnprint">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li>


          <a href="user_manual.html" class="btn btn-outline-success">
            <i class="fa fa-question-circle"></i> HELP
          </a>

        </li>
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="images/profile.jpg" alt=""><?php echo $_SESSION['role'] ?>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" style="margin-top:21px">
            <!--   <a class="dropdown-item"  href="javascript:;"> Profile</a> -->


            <a class="dropdown-item" href="index.php?logout=1"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>




        <li role="presentation" class="nav-item dropdown open">
          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-calculator" style="font-size:25px;color:red"></i>

          </a>
          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1" style="margin-top:21px">
            <li class="nav-item">
              <div class="calci">
                <table>
                  <th>Calculator</th>
                  <tr>
                    <td><input type="button" value="C" onclick="clr()" /> </td>
                    <td colspan="3"><input type="text" id="edu" /></td>
                    <!-- clr() function will call clr to clear all value -->
                  </tr>
                  <tr>
                    <!-- creating buttons and assigning values-->
                    <td><input type="button" value="+" onclick="dis('+')" /> </td>
                    <td><input type="button" value="1" onclick="dis('1')" /> </td>
                    <td><input type="button" value="2" onclick="dis('2')" /> </td>
                    <td><input type="button" value="3" onclick="dis('3')" /> </td>
                  </tr>
                  <tr>
                    <td><input type="button" value="-" onclick="dis('-')" /> </td>
                    <td><input type="button" value="4" onclick="dis('4')" /> </td>
                    <td><input type="button" value="5" onclick="dis('5')" /> </td>
                    <td><input type="button" value="6" onclick="dis('6')" /> </td>
                  </tr>
                  <tr>
                    <td><input type="button" value="*" onclick="dis('*')" /> </td>
                    <td><input type="button" value="7" onclick="dis('7')" /> </td>
                    <td><input type="button" value="8" onclick="dis('8')" /> </td>
                    <td><input type="button" value="9" onclick="dis('9')" /> </td>
                  </tr>
                  <tr>
                    <td><input type="button" value="/" onclick="dis('/')" /> </td>
                    <td><input type="button" value="." onclick="dis('.')" /> </td>
                    <td><input type="button" value="0" onclick="dis('0')" /> </td>
                    <!-- Evaluating function call eval()-->
                    <td><input type="button" value="=" onclick="solve()" /> </td>
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
=======
       <div class="top_nav">
        <div class="nav_menu hideOnprint">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
            <ul class=" navbar-right">
            <li >


<a href="user_manual.html" class="btn btn-outline-success" >
<i class="fa fa-question-circle"></i> HELP
</a>

</li>  
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/profile.jpg" alt=""><?php echo $_SESSION['role'] ?>
                          </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <!--   <a class="dropdown-item"  href="javascript:;"> Profile</a> -->
                              
                        
                              <a class="dropdown-item"  href="index.php?logout=1"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                    </li>
                    
                                    
               

                    <li role="presentation" class="nav-item dropdown open">
                          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-calculator" style="font-size:25px;color:red"></i>
                          
                          </a>
                          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                                      <li class="nav-item">
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
>>>>>>> 1772b5611b8ac2816d1cfb95e1594b57bf05d90e
