<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Input data Barang</h4>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url()?>page/tambah" method="post">
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label>tanggal masuk</label>
            <input type="date" name="tgl" class="form-control" required>
          </div>
          <div class="form-group">
            <label>jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kondisi Barang</label>
            <select class="form-control" name="kondisi">
              <option disabled>--Pilih opsi--</option>
              <option value="1">Baik</option>
              <option value="2">Kurang Baik</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block my-3" tabindex="4">Simpan</button>
        </div>
          </form>
      </div>
    </div>
  </div>
</div>