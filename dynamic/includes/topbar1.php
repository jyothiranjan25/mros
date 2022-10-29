<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu hideOnprint">
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <span style="font-size: 18px;">welcome <?php echo $_SESSION['email'] ?> !</span>
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <span></span>
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"><img src="images/profile.jpg" alt="">welcome</a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" style="background:silver;margin-top: 18px;box-shadow: 0 10px 20px 0 rgba(0, 0, 128, 0.16), 0 2px 10px 0 rgba(1, 3, 128, 0.12);">
            <a class="dropdown-item" href="index.php?logout=1"><i class="fa fa-sign-out pull-right" onclick="geeks();"></i><b> Log Out </b></a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->