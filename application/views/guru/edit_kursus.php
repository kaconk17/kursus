<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kursus</title>
</head>
<?php include './application/views/header.php'; ?> 
<body>

<?php 
foreach ($kursus as $k) {
    $kategori = $k['kategori_kursus'];
    $judul = $k['judul_kursus'];
    $harga = $k['harga_kursus'];
    $level = $k['level_kursus'];
    $point = $k['point_kelulusan'];
    $durasi = $k['durasi_kursus'];
    $desk = $k['deskripsi_kursus'];
   
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Edit Kursus</h4>
            </div>
            <div class="card-body">
                <form  id="buat_kursus">
                <div class="form-group row">
                        <label for="kategori_kursus" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="custon-select" id="kategori_kursus" name="kategori_kursus">
                                
                                <option value="keterampilan" <?=$kategori == 'keterampilan' ? ' selected="selected"' : '';?>>Keterampilan</option>
                                <option value="pelajaran" <?=$kategori == 'pelajaran' ? ' selected="selected"' : '';?>>Mata Pelajaran</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="level_kursus" class="col-sm-4 col-form-label">Level Kursus</label>
                        <div class="col-sm-8">
                            <select class="custon-select" id="level_kursus" name="level_kursus">
                               
                                <option value="sd" <?=$level == 'sd' ? ' selected="selected"' : '';?>>Dasar (SD)</option>
                                <option value="smp" <?=$level == 'smp' ? ' selected="selected"' : '';?>>Menengah (SMP)</option>
                                <option value="sma" <?=$level == 'sma' ? ' selected="selected"' : '';?>>Lanjut (SMA)</option>
                                <option value="mahir" <?=$level == 'mahir' ? ' selected="selected"' : '';?>>Mahir</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="biaya_kursus" class="col-sm-4 col-form-label">Biaya / pertemuan</label>
                        <div class="col-sm-6 my-1">
                        <label class="sr-only" for="biaya_kursus"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                            </div>
                            <input type="number" class="form-control" id="biaya_kursus" name="biaya_kursus" value="<?= $harga; ?>">
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="judul_kursus" class="col-sm-4 col-form-label">Judul Kursus</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="judul_kursus" name="judul_kursus" value="<?= $judul; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_kursus" class="col-sm-4 col-form-label">Jumlah Pertemuan</label>
                        <div class="col-sm-4">
                        <input type="number" class="form-control" id="jumlah_kursus" name="jumlah_kursus" value="<?= $durasi; ?>" required>
                        
                        </div>
                        <label for="jumlah_kursus" class="">Kali</label>
                    </div>
                    <div class="form-group row">
                        <label for="point_kursus" class="col-sm-4 col-form-label">Point Kelulusan</label>
                        <div class="col-sm-4">
                        <input type="number" class="form-control" id="point_kursus" name="point_kursus" value="<?=$point; ?>" required>
                        
                        </div>
                        <label for="jumlah_kursus" class="">point</label>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi_kursus" class="col-sm-2 col-form-label">Deskripsi Kursus</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi_kursus" name="deskripsi_kursus" rows="3" required><?= $desk; ?></textarea>
                        </div>
                    </div>  

                   
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                          
                                <div class="col-sm-2">
                            <a href="<?php echo base_url(); ?>" class="btn btn-secondary tombol">Cancel</a>
                            </div>
                            <div class="col-sm-2 offset-sm-2">
                            <button type="button" class="btn btn-primary tombol" id="update_kursus">Submit</button>
                         
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
    </div>
</div>    
</body>
<?php include './application/views/footer.php' ?>
</html>

<script type="text/javascript">

$(document).ready(function(){
    $('#update_kursus').click(function() {

        alert('4');
        
    });

});

</script>