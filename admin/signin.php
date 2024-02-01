<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ลงชื่อเข้าใช้ระบบ admin</title>
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/form.css" />
</head>

<body>
  <section class="vh-100" id="bg-form">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>แจ้งเตือน!</strong> <?php echo $_SESSION['error']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            unset($_SESSION['error']);
          } ?>


          <?php if (isset($_SESSION['warning'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>แจ้งเตือน!</strong> <?php echo $_SESSION['warning']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            unset($_SESSION['warning']);
          } ?>

          <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>แจ้งเตือน!</strong> <?php echo $_SESSION['success']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            unset($_SESSION['success']);
          } ?>

          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                    ลงชื่อเข้าใช้ระบบ admin
                  </p>

                  <form class="mx-1 mx-md-4" method="post" action="services/auth/action.php">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="repeat-password">
                          <p>
                            ยังไม่มีบัญชี ?
                            <a href="signup.php" class="font-weight-bold text-decoration-none"> สมัครสมาชิก </a>
                          </p>
                          <p>
                            <a href="forgot-password/repass.php" class="font-weight-bold text-decoration-none"> ลืมรหัสผ่าน ? </a>
                          </p>
                        </label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg" name="signin" id="signinform">
                        ลงชื่อเข้าใช้
                      </button>
                    </div>



                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-center order-1 order-lg-2">
                  <img src="assets/images/logo/logo.png" class="img-fluid" alt="Sample image" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="bootstrap-5.3.x/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</body>

</html>