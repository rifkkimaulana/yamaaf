<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../config.php");
include('session.php');

$users = mysqli_query($koneksi, 'SELECT COUNT(*) AS jml FROM tb_users');
$row_users = mysqli_fetch_assoc($users);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            <?= $row_users['jml'] ?>
                        </h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=users" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>