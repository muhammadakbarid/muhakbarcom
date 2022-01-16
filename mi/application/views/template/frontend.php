<!DOCTYPE html>
<html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= "{$setting_aplikasi->nama}"; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/scss/main.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/scss/skin.css">
  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/script/index.js"></script>
</head>

<body id="wrapper">

  <section id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 top-header-links">
          <ul class="contact_links">
            <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/d3si19/">Instagram D3 MI 19</a></li>
          </ul>
        </div>
        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
          <ul class="social_links">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-skype"></i></a></li>
          </ul>
        </div> -->
      </div>
    </div>
    </div>

  </section>

  <header>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url() ?>">
            <h1>MI 19 POLPOS</h1><span><?= "{$setting_aplikasi->nama}"; ?></span>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php $fmenus = $this->layout->get_frontend_menu() ?>
            <?php
            foreach ($fmenus as $fm) {
              if ($fm['label'] == $title) {
                $active = 'active';
              } else {
                $active = '';
              };
              if ($fm['label'] == 'Sign in') {
                if (!$this->ion_auth->logged_in()) {
                  // redirect them to the login page
                  $signin = 'Sign In';
                  $signin_url = 'login';
                  echo '<li class="' . $active . '"><a href="' . site_url('/') . $signin_url . '"> ' . $signin . ' </a>';
                } else {
                  $signin = 'Dashboard';
                  $signin_url = 'dashboard';
                  echo '<li class="' . $active . '"><a href="' . site_url('/') . $signin_url . '"> ' . $signin . ' </a>';
                }
              } else {
                echo '<li class="' . $active . '"><a href="' . site_url('/') . $fm['link'] . '"> ' . $fm["label"] . ' </a>';
              }
            }

            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- button biar nav bisa di collapse -->
    <button class="navbar-toggle">
    </button>



  </header>
  <!--/.nav-ends -->

  <!-- content -->
  <section class="content">
    <?php $this->load->view($page); ?>
  </section>
  <!-- end of content -->
  <section id="footer">
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Address</h4>
            <hr />
            <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.
            </p>
            <a href="#" class="learnmore">Learn More <i class="fa fa-caret-right"></i></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Useful Links</h4>
            <hr />
            <ul class="footer-links">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Sign In</a></li>
              <li><a href="#">Sign Up</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Community</h4>
            <hr />
            <ul class="footer-links">
              <li><a href="#">Blog</a></li>
              <li><a href="#">Forum</a></li>
              <li><a href="#">Free Goods</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 <block></block>">
          <div class="footer-block">
            <h4>Recent Posts</h4>
            <hr />
            <ul class="footer-links">
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>

            </ul>
          </div>
        </div>
      </div> -->
    </div>


  </section>

  <section id="bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 btm-footer-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
        </div>
        <!-- <div class="col-md-6 col-sm-6 col-xs-12 copyright">
          Developed by <a href="http://www.muhakbar.com">Muhammad Akbar</a>
        </div> -->
        <!-- copyright -->
        <script type="text/javascript">
          eval(unescape('%66%75%6e%63%74%69%6f%6e%20%6f%35%36%36%39%35%63%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%32%30%36%35%37%33%34%39%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%35%34%33%35%31%32%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%2d%38%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
          eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%6f%35%36%36%39%35%63%28%27') + '%41%65%75%7f%20%6b%71%6c%7f%78%40%2b%69%72%7d%31%74%64%35%3b%2d%6f%74%71%34%79%70%3c%3a%29%63%77%71%30%84%78%30%38%38%2d%62%73%79%89%7a%74%6a%74%7f%2f%47%17%17%21%2c%29%20%28%2d%2d%2c%2b%2d%4d%6f%7b%64%70%76%70%6d%69%2d%6e%82%2d%45%6b%2d%79%7e%6c%66%45%2f%75%78%7f%7d%43%35%32%76%7b%7e%3e%75%78%75%6d%70%6f%68%78%33%62%73%74%22%46%50%78%74%6a%70%74%6b%69%21%4d%72%62%69%7f%41%33%6a%43%14%10%2d%21%2c%29%20%28%2d%2d%40%34%69%70%7c%4320657349%35%39%34%31%38%30%35' + unescape('%27%29%29%3b'));
          // 
        </script>
        <noscript><i>Javascript required</i></noscript>
      </div>
    </div>
  </section>

  <div id="panel">
    <div id="panel-admin">
      <div class="panel-admin-box">
        <div id="tootlbar_colors">
          <button class="color" style="background-color:#1abac8;" onclick="mytheme(0)"></button>
          <button class="color" style="background-color:#ff8a00;" onclick="mytheme(1)"> </button>
          <button class="color" style="background-color:#b4de50;" onclick="mytheme(2)"> </button>
          <button class="color" style="background-color:#e54e53;" onclick="mytheme(3)"> </button>
          <button class="color" style="background-color:#1abc9c;" onclick="mytheme(4)"> </button>
          <button class="color" style="background-color:#159eee;" onclick="mytheme(5)"> </button>
        </div>
      </div>

    </div>
    <a class="open" href="#"><span><i class="fa fa-gear fa-spin"></i></span></a>
  </div>

</html>