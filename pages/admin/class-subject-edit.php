<?php 
    session_start();
    if ($_SESSION['role'] != "Admin") {
        header("Location: ../../index.php");
        exit;
    } else {
        include '../../common/connection.php';
        include '../../common/userQuery.php';
        include '../../common/getImg.php';

        $role = $_SESSION['role'];
        $nama = $_SESSION['nama'];
        $userID = $_SESSION['id'];
        $classID = $_GET['classID'];
        $className = $_GET['className'];
        $id = $_GET['id'];
        $user = getUser('dosen');
        $msg = '';

        $querySubject = "SELECT * FROM mata_kuliah WHERE id=$id";
        $subject = mysqli_query($conn, $querySubject);

        if (isset($_POST['edit'])) {
            $name = mysqli_real_escape_string($conn, $_POST['nama']);
            $dosen = $_POST['dosen'];
            $kelas = $_POST['kelas'];

            $query = "UPDATE mata_kuliah SET nama='$name', dosenNIP='$dosen', kelasID=$kelas WHERE id=$id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                $msg = 'Gagal mengubah data';
            } else {
                header('Location: class-subject.php?id='.$classID.'&nama='.$className);
            }
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Language" content="en" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Huge selection of charts created with the React ChartJS Plugin" />
    <meta name="msapplication-tap-highlight" content="no" />
    <!--
        =========================================================
        * ArchitectUI HTML Theme Dashboard - v1.0.0
        =========================================================
        * Product Page: https://dashboardpack.com
        * Copyright 2019 DashboardPack (https://dashboardpack.com)
        * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
        =========================================================
        * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
        -->

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link href="../../assets/css/main.css" rel="stylesheet" />
    <link href="../../assets/css/admin-card.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"><a href="index.php">X-MENTOR</a></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group d-flex align-items-center justify-content-between">
                                        <span class="col-10"
                                            style="width: 300px;text-align: right;"><?= $role.' | '.$nama; ?></span>
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn col-2">
                                            <img width="42" class="rounded-circle" src="<?php echo image($userID); ?>"
                                                alt="">
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <a href="../../common/logout.php" tabindex="0"
                                                class="dropdown-item">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                <a href="lecture.php" class="">
                                    <i class="las la-user-tie"></i> Mentor
                                </a>
                                <a href="student.php" class="">
                                    <i class="las la-graduation-cap"></i> X-Mentor
                                </a>
                                <a href="class.php" class="mm-active">
                                    <i class="las la-university"></i> Kelas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php if($msg != '') : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>
                    <header>
                        <h3>Edit Mata Kuliah</h3>
                    </header>
                    <span class="mb-4 back d-flex justify-content-start">
                        <a href="class-subject.php?id=<?= $classID; ?>&nama=<?= $className; ?>">Kembali</a>
                    </span>
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpane">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <?php if(mysqli_num_rows($subject) > 0) : ?>
                                <form action="" method="post">
                                    <?php foreach($subject as $data) : ?>
                                    <div class="position-relative row form-group">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input name="nama" id="nama" type="text" class="form-control"
                                                value="<?= $data['nama']; ?>" required />
                                        </div>
                                    </div>
                                    <input name="kelas" id="kelas" type="number" class="form-control" value="1"
                                        hidden />
                                    <div class="position-relative row form-group">
                                        <label for="dosen" class="col-sm-2 col-form-label">Mentor</label>
                                        <div class="col-sm-10">
                                            <?php if(mysqli_num_rows($user) > 0) : ?>
                                            <select name="dosen" id="dosen" class="form-control">
                                                <option value="" disabled>Pilih Mentor</option>
                                                <?php foreach($user as $dosen) : ?>
                                                <option value="<?= $dosen['nrp_nip'] ?>"
                                                    <?php if($data['dosenNIP'] == $dosen['nrp_nip']) echo 'selected'; ?>>
                                                    <?= $dosen['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button class="btn btn-outline-primary" name="edit">Submit</button>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript" src="../../assets/js/main.js"></script>

            </div>