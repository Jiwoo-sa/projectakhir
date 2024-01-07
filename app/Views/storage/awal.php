<!DOCTYPE html>
<html lang="en">
<?php
$this->db = db_connect();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bank Sampah Harum Melati</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>/assets2/img/sampah.png" rel="icon">
    <link href="<?= base_url() ?>/assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/assets2/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets2/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Techie
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">
            <!-- <img style="text-align: width: 150px; height: 150px;" src="/assets2/img/logo.jpg"> <hr> -->
            <h1 class="logo"><a href="index.html">Bank Sampah <br> Harum Melati</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Informasi</a></li>
                    <li><a class="nav-link scrollto" href="#cara">Cara Transaksi</a></li>
                    <li><a class="nav-link scrollto" href="#penarikan">Cara Penarikan</a></li>
                    <li><a class="nav-link scrollto " href="#syarat">Syarat & Ketentuan</a></li>
                    <!-- <li class="dropdown"><a href="#penarikan"><span>Cara Penarikan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li><a href="#tukar">Cara Penukaran</a></li>
                      </ul>
                  </li> -->
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                  <li><a href="Login" class="getstarted scrollto">Login</a></li>
                  <li><a href="daftar" class="getstarted scrollto">Daftar</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Bank Sampah</h1>
                <h2>Bank sampah Harum Melati merupakan unit pengelolaan yang berfokus pada pengumpulan, pemilihan, dan pemanfaatan limbah yang bernilai ekonomis.</h2>
                    <!-- <div>
                        <a href="daftar" class="btn-get-started scrollto">Daftar</a>
                        <a href="Login" class="btn-get-started scrollto">Login</a>
                    </div> -->
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <center><img style="text-align: width: 500px; height: 500px;" src="<?= base_url() ?>/assets2/img/logo.jpg" alt=""></center>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                        <?php
                        $datane = $this->db->query("SELECT * FROM informasi")->getRow();
                        ?>
                        <img src="<?= base_url('img') ?>/<?= $datane->foto ?>" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">

                        <h3><?= @$datane->judul_informasi ?></h3>
                        <!-- <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p> -->
                        <br>
                        <ul>
                            <?= @$datane->isi_informasi ?>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="<?= $oke->getWhere('user', '*', ['hak_akses' => 'user'])->resultID->num_rows; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <h3>
                        <font color="white">Jumlah Nasabah</font>
                    </h3>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <?php
                    $datane = $this->db->query("SELECT SUM(total_trans) AS tot FROM transaksi WHERE MONTH(tgl)='" . date('m') . "' AND YEAR(tgl)='" . date('Y') . "'")->getRow();
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $datane->tot; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <h3>
                        <font color="white">Jumlah Pemasukan</font>
                    </h3>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <?php
                    $datane = $this->db->query("SELECT SUM(jmlh_tarik) AS tot FROM penarikan WHERE MONTH(tgl_tarik)='" . date('m') . "' AND YEAR(tgl_tarik)='" . date('Y') . "'")->getRow();
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $datane->tot; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <h3>
                        <font color="white">Jumlah Penarikan</font>
                    </h3>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <?php
                    $datane = $this->db->query("SELECT SUM(total_penukaran) AS tot FROM transaksi_penukaran WHERE MONTH(tgl)='" . date('m') . "' AND YEAR(tgl)='" . date('Y') . "'")->getRow();
                    ?>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $datane->tot; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <h3>
                        <font color="white">Jumlah Penukaran</font>
                    </h3>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Service Section ======= -->
    <section id="cara" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Cara Transaksi Di Bank Sampah</h2>
                <br>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                                </svg>
                                <i class="fa-solids fa-1">1</i>
                            </div>
                            <h4><a href="daftar">Daftar Menjadi Anggota</a></h4>
                            <p>Melakukan pendaftaran melalui website bank sampah harum melati agar terdaftar menjadi anggota</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box iconbox-orange ">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                                </svg>
                                <i class="fa-solids fa-1">2</i>
                            </div>
                            <h4><a href="">Pengumpulan Sampah</a></h4>
                            <p>Membawa sampah yang sudah terkumpul ke bank sampah</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box iconbox-pink">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                                </svg>
                                <i class="fa-solids fa-1">3</i>
                            </div>
                            <h4><a href="">Penimbangan Sampah</a></h4>
                            <p>Sampah yang sudah dibawa akan ditimbang oleh pegawai bank sampah</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-yellow">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                                </svg>
                                <i class="fa-solids fa-1">4</i>
                            </div>
                            <h4><a href="">Pencatatan</a></h4>
                            <p>Pegawai akan melakukan pencatatan transaksi pemasukan dari anggota nasabah yang menabung</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box iconbox-red">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                                </svg>
                                <i class="fa-solids fa-1">5</i>
                            </div>
                            <h4><a href="">Pemilahan & Penyimpanan</a></h4>
                            <p>Pegawai akan melakukan pemilahan sampah dan setelah itu akan dimasukkan ke gudang penyimpanan</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box iconbox-teal">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                                </svg>
                                <i class="fa-solids fa-1">6</i>
                            </div>
                            <h4><a href="">Penjualan</a></h4>
                            <p>Pegawai akan menjual sampah yang ada di gudang ke pengepul</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Services Section -->
        <section class="counts">
            <div class="container">
                <div class="row counters">

                </div>
            </div>
        </section>

        <!-- ======= Penarikan Section ======= -->
        <section id="penarikan" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Cara Penarikan Di Bank Sampah</h2>
                    <br>
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box iconbox-blue">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">1</i>
                                </div>
                                <h4><a href="">Nasabah Datang Ke Bank Sampah</a></h4>
                                <!-- <p>Melakukan pendaftaran melalui website bank sampah harum melati agar terdaftar menjadi anggota</p> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box iconbox-orange ">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">2</i>
                                </div>
                                <h4><a href="">Nasabah Meminta Pegawai Untuk Melakukan Penarikan</a></h4>
                                <!--<p>Membawa sampah yang sudah terkumpul ke bank sampah</p> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box iconbox-pink">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">3</i>
                                </div>
                                <h4><a href="">Pegawai Melakukan Penarikan Sesuai Keinginan Nasabah</a></h4>
                                <p>Nasabah tidak boleh menarik melebihi saldo yang dimiliki</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box iconbox-yellow">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">4</i>
                                </div>
                                <h4><a href="">Pegawai Memberikan Uang Penarikan kepada Nasabah</a></h4>
                                <!-- <p>Pegawai akan melakukan pencatatan transaksi pemasukan dari anggota nasabah yang menabung</p> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box iconbox-red">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">5</i>
                                </div>
                                <h4><a href="">Nasabah Menerima Uang Penarikan</a></h4>
                                <!-- <p>Pegawai akan melakukan pemilahan sampah dan setelah itu akan dimasukkan ke gudang penyimpanan</p> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box iconbox-teal">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                                    </svg>
                                    <i class="fa-solids fa-1">6</i>
                                </div>
                                <h4><a href="">Nasabah Bisa Melihat Bukti Transaksi Di Akun Miliknya</a></h4>
                                <!-- <p>Pegawai akan menjual sampah yang ada di gudang ke pengepul</p> -->
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Penarkan Section -->

            <section class="counts">
                <div class="container">
                    <div class="row counters">

                    </div>
                </div>
            </section>

            <!-- ======= Service Section ======= -->
            <section id="syarat" class="services section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Syarat & Ketentuan</h2>
                        <br>
                        <div class="row gy-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Tata Tertib Bank Sampah Harum Melati RW 11</h4>
                                                <p class="card-text">KELURAHAN PANJANG WETAN KOTA PEKALONGAN</p>
                                                <br>
                                                <ul class="text-left" style="text-align: left!important;">
                                                    <li>Jadwal penyetoran sampah hari Jum'at s/d Minggu</li>
                                                    <li>Penyetoran sampah mulai jam 15.30 s/d 17.00</li>
                                                    <li>Harga sampah bisa berubah sesuai dengan kesepakatan harga dari pengepul</li>
                                                    <li>Nasabah memilah sampah yang akan ditabung</li>
                                                    <li>Penarikan bisa dilakukan sesuai dengan kebutuhan nasabah</li>
                                                    <li>Saldo bisa ditukarkan dengan sembako sesuai harga sembako di bank sampah</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Syarat Menjadi Anggota Bank Sampah Harum Melati</h4>
                                                <p class="card-text">KELURAHAN PANJANG WETAN KOTA PEKALONGAN</p>
                                                <br>
                                                <ul class="text-left" style="text-align: left!important;">
                                                    <li>Diutamakan warga panjang wetan kota pekalongan</li>
                                                    <li>Mempunyai kartu identitas</li>
                                                    <li>Melakukan registrasi sesuai data diri</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="counts">
                <div class="container">
                    <div class="row counters">

                    </div>
                </div>
            </section>

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Contact</h2>
                        <p></p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info-box mb-4">
                                <i class="bx bx-map"></i>
                                <h3>Alamat</h3>
                                <p>JL W.R Supratman Pisang Sari Gg Cucut RW 11</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box  mb-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>banksampah_harummelati@gmail.com</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box  mb-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telp</h3>
                                <p>+6290876536342</p>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 ">
                            <iframe class="mb-4 mb-lg-0" src="https://maps.google.com/maps?q=jl%20wr%20supratman%20pekalongan%20&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Bank Sampah Harum Melati</h3>
                            <p>
                                JL W.R Supratman Pisang Sari<br>
                                Gg Cucut RT 003 RW 011<br>
                                Kota Pekalongan <br><br>
                                <strong>Phone:</strong> +6290876536342<br>
                                <strong>Email:</strong> banksampah_harummelati@gmail.com<br>
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#about">Informasi</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#cara">Cara Transaksi</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#syarat">Syarat & Ketentuan</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Sosial Media</h4>
                            <ul>
                                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                                    <li><a href="#" class="twitter"><i class="bx bxl-twitter"></i></a></li>
                                    <li><a href="#" class="facebook"><i class="bx bxl-facebook"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="bx bxl-instagram"></i></a></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <center>&copy; Copyright <strong><span>Bank Sampah Harum Melati</span></strong>. All Rights Reserved</center>



            </footer><!-- End Footer -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
            <div id="preloader"></div>

            <!-- Vendor JS Files -->
            <script src="<?= base_url() ?>/assets2/vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/aos/aos.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="<?= base_url() ?>/assets2/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="<?= base_url() ?>/assets2/js/main.js"></script>

        </body>

        </html>