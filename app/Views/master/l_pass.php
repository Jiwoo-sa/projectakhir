<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lupa Password</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('sweetalert.css') ?>">
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sweetalert.js') ?>"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container"> 
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-9 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block"></div>
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Lupa Password?</h1>
                                            </div>

                                            <form class="user" method="POST" id="gantipassword" action="<?= base_url('L_pass/edit') ?>">
                                               <div class="form-group">
                                                <input type="username" name="username" class="form-control form-control-user" id="username" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="no_hp" name="no_hp" class="form-control form-control-user" id="no_hp" placeholder="No Hp" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Reset Password
                                            </button>
                                        </form>
                                        <div class="text-center">
                                            <a class="small" href="login">Kembali Ke Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>



</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

<script type="text/javascript">
    <?php
    $status_kirim = session()->get('status');
    if ($status_kirim != "" || $status_kirim != null) {
        ?>
        $(document).ready(function() {
            Swal.fire(
                'Informasi',
                `<?= session()->get('pesan') ?>`,
                'error'
                )
        })
        <?php
        $array_items = ['status', 'pesan'];
        session()->remove($array_items);
    }
    ?>
</script>

</body>

</html>