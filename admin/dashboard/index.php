<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../config.php");
include('session.php');

$users = mysqli_query($koneksi, 'SELECT COUNT(*) AS jml FROM tb_users');
$row_users = mysqli_fetch_assoc($users);

// Ambil data pengunjung dari database
$query = "SELECT DATE(waktu_lihat) AS tanggal, COUNT(*) AS total FROM tb_lihat GROUP BY DATE(waktu_lihat) ORDER BY tanggal ASC";
$result = mysqli_query($koneksi, $query);

$data_lihat = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tanggal = $row['tanggal'];
    $total = $row['total'];
    $data_lihat[] = ["tanggal" => $tanggal, "total" => $total];
}

$jsonDataLihat = json_encode($data_lihat);
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
                    <a href="<?= $base_url ?>admin/dashboard.php?page=users" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Pengunjung</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="lihat-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var jsonDataLihat = <?php echo $jsonDataLihat; ?>;
    var labelsLihat = [];
    var dataLihat = [];

    jsonDataLihat.forEach(function (item) {
        labelsLihat.push(item.tanggal);
        dataLihat.push(item.total);
    });

    var visitorCtx = document.getElementById('lihat-chart').getContext('2d');
    var visitorChart = new Chart(visitorCtx, {
        type: 'line',
        data: {
            labels: labelsLihat,
            datasets: [{
                label: 'Lihat',
                data: dataLihat,
                backgroundColor: 'rgba(0,123,255,0.8)',
                borderColor: 'rgba(0,123,255,1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(0,123,255,1)',
                pointRadius: 4,
                pointHoverRadius: 6,
                pointHitRadius: 6,
                pointBorderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>