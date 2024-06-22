<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= base_url('cPeminjaman/edit/' . $edit->id_pinjam) ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <select name="anggota" class="form-control select2" style="width: 100%;">
                                        <option value="">---Pilih Nama Anggota---</option>
                                        <?php
                                        foreach ($anggota as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id_anggota ?>" <?php if ($edit->id_anggota == $value->id_anggota) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $value->nama_anggota ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?= form_error('anggota', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Judul Buku</label>
                                    <select name="buku" class="form-control select2" style="width: 100%;">
                                        <option value="">---Pilih Judul Buku---</option>
                                        <?php
                                        foreach ($buku as $key => $value) {
                                            if ($edit->id_buku == $value->id_buku) {
                                        ?>
                                                <option value="<?= $value->id_buku ?>" <?php if ($edit->id_buku == $value->id_buku) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $value->judul ?> | <?= $value->nama_kategori ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $value->id_buku ?>" <?php if ($edit->id_buku == $value->id_buku) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php if ($value->status != '1') {
                                                                                                ?>
                                                        <?= $value->judul ?> | <?= $value->nama_kategori ?>
                                                    <?php
                                                                                                } ?></option>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?= form_error('buku', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Peminjaman</label>
                                    <input name="tgl_pinjam" type="text" value="<?= $edit->tgl_pinjam ?>" name="password" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Batas Peminjaman</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input name="bts" value="<?= $edit->bts_pinjam ?>" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <?= form_error('bts', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->