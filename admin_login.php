

<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin credentials (replace with your own)
    $adminEmail = 'admin@gmail.com';
    $adminPassword = '123';

    // Check if the email and password match the admin credentials
    if ($email === $adminEmail && $password === $adminPassword) {
        // Authentication successful, create a session and redirect to the admin panel
        $_SESSION['admin'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        // Authentication failed, display an error message
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin Login | Saya elevator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
      var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/641be1fa31ebfa0fe7f42ac1/1gs6elfm1';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
  <meta name="google-site-verification" content="Bjl28Tcmy4qqAIl1nxVW2ko81BLGykh5JCB9imVED3A" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top shadow">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="../index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="about.html">About</a></li>
          <li class="dropdown"><a href="#"><span>Materials</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="mechanical-safety-component.html"><span>Mechanical & Safety Component</span>
                  <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="overspeed-governer.html">Overspeed Governer</a></li>
                  <li><a href="safety-clutch.html">Safety Clutch</a></li>
                  <li><a href="rope-anchorage.html">Rope Anchorage</a></li>
                  <li><a href="guide-shoe.html">Guide Shoe</a></li>
                  <li><a href="diverter-pulley.html">Diverter Pulley</a></li>
                  <li><a href="rail-clip.html">Rail Clip</a></li>
                  <li><a href="bulldog-clip.html">Bulldog Clip</a></li>
                  <li><a href="cable-gripper.html">Cable Gripper</a></li>
                  <li><a href="rubber-item.html">Rubber Item</a></li>
                  <li><a href="oiler.html">Oiler</a></li>
                  <li><a href="buffer-spring.html">Buffer Spring</a></li>
                  <li><a href="bracket.html">Bracket</a></li>
                  <li><a href="keys.html">Keys</a></li>
                  <li><a href="fastner.html">Fastner</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="controller-and-drives.html"><span>Controller & Drives</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./controller-and-drives/fuji-drive.html">Fuji-Drive</a></li>
                  <li><a href="./controller-and-drives/yaskawa-drive.html">Yaskawa-Drive</a></li>
                  <li><a href="./controller-and-drives/INVT-Drive.html">INVT-Drive</a></li>
                  <li><a href="./controller-and-drives/monarch-drive.html">Monarch Drive</a></li>
                  <li><a href="./controller-and-drives/fuji-nova-controller.html">Fuji Nova-Controller</a></li>
                  <li><a href="./controller-and-drives/yaskawa-controller.html">Yaskawa Controller</a></li>
                  <li><a href="./controller-and-drives/INVT-controller.html">INVT Controller</a></li>
                  <li><a href="./controller-and-drives/monarch-controller.html">Monarch Controller</a></li>
                  <li><a href="./controller-and-drives/vega-controller.html">Vega Controller</a></li>
                  <li><a href="./controller-and-drives/controller-card.html">Controller Card</a></li>
                  <li><a href="./controller-and-drives/harness.html">Harness</a></li>
                  <li><a href="./controller-and-drives/ups-with-batteries.html">UPS With Batteries</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="electrical-components.html"><span>Electrical Components</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./electrical-components/switch-gear-relay.html">Switch Gear & Relay</a></li>
                  <li><a href="./electrical-components/transformer-smps.html">Transformer & Smps</a></li>
                  <li><a href="./electrical-components/cables-wires.html">Cables & Wires</a></li>
                  <li><a href="./electrical-components/DBR.html">DBR</a></li>
                  <li><a href="./electrical-components/dinrail.html">Dinrail</a></li>
                  <li><a href="./electrical-components/PVC-Truff.html">PVC Truff</a></li>
                  <li><a href="./electrical-components/door-sensor.html">Door Sensor</a></li>
                  <li><a href="./electrical-components/overload-sensor.html">Overload Sensor</a></li>
                  <li><a href="./electrical-components/Inspection-Junction-Box.html">Inspection & Junction Box</a></li>
                  <li><a href="./electrical-components/fireman-emergency-box.html">Fireman & Emergency Box</a></li>
                  <li><a href="./electrical-components/limit-switch.html">Limit Switch</a></li>
                  <li><a href="./electrical-components/reed-switch.html">Reed Switch</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="COP-and-LOP.html"><span>COP & LOP</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./COP-and-LOP/ROYAL.html">REVA</a></li>
                  <li><a href="./COP-and-LOP/ROYAL.html">ROYAL</a></li>
                  <li><a href="./COP-and-LOP/NEXA.html">NEXA</a></li>
                  <li><a href="./COP-and-LOP/ORCA.html">ORCA</a></li>
                  <li><a href="./COP-and-LOP/BCG.html">BCG</a></li>
                  <li><a href="./COP-and-LOP/INNOVA.html">INNOVA</a></li>
                  <li><a href="./COP-and-LOP/VISION.html">VISION</a></li>
                  <li><a href="./COP-and-LOP/GALAXY.html">GALAXY</a></li>
                  <li><a href="./COP-and-LOP/HANDRAIL-COP.html">HANDRAIL COP</a></li>
                  <li><a href="./COP-and-LOP/EPAD.html">EPAD</a></li>
                  <li><a href="./COP-and-LOP/PUSH-BUTTONS.html">PUSH BUTTONS</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="cabins-and-car-frames.html"><span>Cabins & Car Frames</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./cabins-and-car-frames/cabin.html">Cabin</a></li>
                  <li><a href="./cabins-and-car-frames/carframe.html">Carframe</a></li>
                  <li><a href="./cabins-and-car-frames/cabin-accessories.html">Cabin-Accessories</a></li>
                  <li><a href="./cabins-and-car-frames/machine-mounting.html">Machine Mounting</a></li>
                  <li><a href="./cabins-and-car-frames/cabin-flooring.html">Cabin Flooring</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="electronic-components.html"><span>Electronic Components</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./electronic-components/Access-control.html">Access Control</a></li>
                  <li><a href="./electronic-components/lift-announcement-system.html">Lift Announcement System</a></li>
                  <li><a href="./electronic-components/display.html">Display</a></li>
                  <li><a href="./electronic-components/emergency-light.html">Emergency Light</a></li>
                  <li><a href="./electronic-components/battery-backup.html">Battery Backup</a></li>
                  <li><a href="./electronic-components/PCB-boards.html">PCB Boards</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="machines.html"><span>Machines</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./Machines/Geared Machine.html">Geared Machine</a></li>
                  <li><a href="./Machines/gearless-machine.html">Gearless Machine</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="hydraulic-systems.html"><span> Hydraulic Systems</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./hydraulic-systems/hydraulic-kits.html">Hydraulic Kits</a></li>
                  <li><a href="./hydraulic-systems/hydraulic-cylinder.html">Hydraulic Cylinder</a></li>
                  <li><a href="./hydraulic-systems/hydraulic-powerpack.html">Hydraulic Powerpack</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="door-system.html"><span>Door System</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./door-system/auto-door-fermator.html">Auto Door - Fermator</a></li>
                  <li><a href="./door-system/auto-door-genesis.html">Auto Door - Genesis</a></li>
                  <li><a href="./door-system/manual-door.html">Manual Door</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="shaft-component.html"><span>Shaft Component</span> <i
                    class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="./shaft-component/guide-rail.html">Guide Rail</a></li>
                  <li><a href="./shaft-component/wire-rope.html">Wire Rope</a></li>
                  <li><a href="./shaft-component/flat-cable.html">Flat Cable</a></li>
                  <li><a href="./shaft-component/gate-lock-rcam.html">Gate Lock - Rcam</a></li>
                  <li><a href="./shaft-component/compensation-chain.html">Compensation Chain</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="services.html">Services</a></li>
          <li><a class="nav-link scrollto" href="catalogue.html">Catalogue</a></li>
          <li><a class="nav-link scrollto" href="clients.html">Our clients</a></li>
          <li><a class="nav-link scrollto" href="contact-us.html">Contact us</a></li>
          <li class="dropdown"><a href=""><span>Login</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="mt-3">
              <li><a href="admin_login.php">Admin </a></li>
              <li><a href="sign-in.html">User</a></li>
          </li>
        </ul>
        </li>
        <li><a class="getstarted scrollto" href="register.html">Sign up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
<body>
    <section class="mt-3";>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-4 rounded shadow" style="width: 22rem" action="admin_login.php" method="POST">
            <h4 class="text-center mb-3">Admin Login</h4>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'incorrect'): ?>
                <div class="alert alert-danger" role="alert">
                    Incorrect User name or password
                </div>
            <?php elseif (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                <div class="alert alert-success" role="alert">
                    User name and password are correct
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp"  required="">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required="">
            </div> <a href="#" class="float-end m-3">
                    Forgot Password?
                  </a>
            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
           
            <?php if (isset($error)): ?>
                <div class="text-danger mt-3"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
    </section>
    
    <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <header class="section-header">
            <h4>Our Newsletter</h4>
            <h6 class="text-muted m-3">Find out what makes our elevator solutions stand out from the crowd –
              subscribe
              to our newsletter today.
            </h6>
          </header>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- whatsapp button started  -->
    <a class="whats-app blink" href="https://wa.me/message/BDLTDHOLEF4MB1" target="_blank">
      <i class="fab fa-whatsapp fa-2x"></i>
    </a>
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
            </a>
            <p>Elevate your expectations with our premium-quality elevator solutions</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/home" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/SayaElevatorIndustriesPvtLtd" target="_blank" class="facebook"><i
                  class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/saya_elevator_industries/" target="_blank" class="instagram"><i
                  class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/company/saya-elevator-industries-pvt-ltd/" target="_blank"
                class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="about.html">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="services.html">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="page-terms.html">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="page-privacy.html">Privacy policy</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#!">Installation</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#!">Repair</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#!">Maintenance</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#!">Modernization</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#!">24/7 Service</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              Shop No. 11, Pavitra Heights, 411 002, near Bhaji Mandai, New Nana Peth, Ganesh Peth, Pune,
              Maharashtra
              411002 <br><br>
              <strong>Phone :</strong><a href="tel:+91 93722226" class="text-primary"> +91 9372226748</a><br>
              <strong>Email :</strong><a href="mailto:sayapromotes@gmail.com" class="text-primary">
                sayapromotes@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container ">
      <div class="copyright">
        &copy; Copyright 2023 <strong><span>Saya Elevator</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <a href="https://wa.me/919372226748" target="_blank"><img src="assets/img/whatsapp.svg" alt="#!" style="width: 60px; height: 60px; left: 10px; bottom: 10px; position: fixed;
    bottom: 20px;
    right: 20px;"></a>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>
</html>



