<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
 <style>
        body {
        
            background: linear-gradient(to right, #3498db, #6dd5fa);
     
        }

        .custom-card {
            background: linear-gradient(to right, #2980b9, #3498db);
            border: none;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s;
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .custom-card-header {
            background: linear-gradient(to right, #2980b9, #2c3e50);
            color: #fff;
            border-bottom: none;
        }
    </style>
<main role="main" class="container">
    <div class="card mt-5 custom-card">
        <div class="card-header custom-card-header">
            <h2>Selamat Datang di Bank Sampah Harum Melati</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Selamat datang, <?=session()->get('nama')  ?>!</h5> 
            <p class="card-text">Saldo Anda saat ini:</p>
            <h1 class="display-4">Rp <?= session()->get('saldo') ?>,-</h1>
        </div>
    </div>
</main>




    <?= $this->endSection(); ?>