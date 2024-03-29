<?php $this->load->view('users/layout/new-header');?>
<?php $this->load->view('users/layout/new-navbar');?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pengajuan Izin Penelitian</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                                <li class="breadcrumb-item active">Pengajuan Izin</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <!-- <?php print("<pre>" . print_r($data_rr, true) . "</pre>");?> -->
                            <h4 class="card-title mb-0 flex-grow-1">Data Pengajuan Izin</h4>
                            <div class="flex-shrink-0">
                                <button class="btn btn-success btn-animation waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#addmembers"><i
                                        class="ri-add-fill me-1 align-bottom"></i> Tambah</button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table id="datatable1" class="table table-striped table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Keperluan</th>
                                                <th scope="col">Invoice ID</th>
                                                <th scope="col">No. Surat</th>
                                                <th scope="col">Judul Penelitian</th>
                                                <th scope="col">Keterangan</th>
                                                <!-- <th scope="col">Dokumen</th> -->
                                                <th scope="col">Aksi</th>
                                                <th scope="col">Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$count = 0;
foreach ($data_pengajuan as $val) {
    $count = $count + 1;
    if ($this->session->userdata('role') == 1) {
        if ($val->isApproved == 0) {
            $tombol = '<button type="button" class="btn btn-soft-success btn-animation waves-effect waves-light" title="Edit" onclick="update_approve(' . "'" . $val->id . "'" . ')"><i class="las la-check-double"></i></button> &nbsp;';
        } else {
            $tombol = '<button type="button" class="btn btn-soft-danger btn-animation waves-effect waves-light" title="Edit" onclick="update_nonapprove(' . "'" . $val->id . "'" . ')"><i class="las la-times"></i></button> &nbsp;';
        }
    } else {
        $tombol = '';
    }

    ?>
                                            <tr>
                                                <td style="width: 5%; vertical-align"><?php echo $count; ?></td>
                                                <td style="width: 5%; vertical-align">
                                                    <?php echo help_nama_user($val->id_user); ?></td>
                                                <td style="width: 20%; vertical-align">
                                                    <?php echo help_nama_kategori($val->id_kategori); ?></td>
                                                <td style="width: 20%; vertical-align">
                                                    <?php echo $val->invoiceid; ?></td>
                                                <td style="width: 20%; vertical-align">
                                                    <?php echo $val->no_surat; ?></td>
                                                <td style="width: 20%; vertical-align">
                                                    <?php echo $val->judul_penelitian; ?>
                                                <td style="width: 20%; vertical-align">
                                                    <?php echo help_approve($val->isApproved); ?>
                                                </td>
                                                <!-- <td style="width: 20%; vertical-align">
                                                    <?php echo '<button type="button" class="btn btn-warning btn-animation waves-effect waves-light" title="Foto" onclick="detail_foto(' . "'" . $val->id . "'" . ')"><i class="las la-photo-video"></i></button> &nbsp;' ?>
                                                </td> -->
                                                <td style="width: 10%; vertical-align">
                                                    <?php echo '<button type="button" class="btn btn-info btn-animation waves-effect waves-light" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="las la-pen-fancy"></i></button> &nbsp;' . '<button type="button" class="btn btn-danger btn-animation waves-effect waves-light" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="las la-trash"></i></button> &nbsp;' . $tombol; ?>
                                                </td>
                                                <td style="width: 10%; vertical-align">
                                                    <?php
echo '<button type="button" class="btn btn-success btn-animation waves-effect waves-light" title="Download" onclick="preview(' . "'" . $val->id . "'" . ')"><i class="las la-eye"></i></button> &nbsp;';
    ?>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                                <!-- end table responsive -->
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <!-- End Page-content -->


    <!-- PENGAJUAN IZIN -->
    <div class="modal fade" id="addmembers" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="myModalLabel">Form Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-top: 0px; padding-bottom: 10px;  ">
                        <a href="<?php echo base_url(); ?>/assets/contoh.jpeg" target="_blank"
                            class="btn btn-warning btn-label waves-effect waves-light"><i
                                class="lar la-file-image label-icon align-middle fs-16 me-2"></i> Contoh Pengisian Form
                        </a>
                    </div>
                    <form id="form_input">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="teammembersName" class="form-label">Keperluan</label>
                                    <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                                    <input type="hidden" class="form-control" id="indikator" name="indikator">
                                    <select class="form-control" name="id_kategori" id="id_kategori" required>
                                        <option value="" selected disabled>Kategori</option>
                                        <?php
foreach ($data_kategori as $val) {?>
                                        <option value="<?=$val->id;?>" ;?>
                                            <?=$val->kategori;?></option>;
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="teammembersName" class="form-label">Judul Penelitian</label>
                                    <input type="text" class="form-control" id="judul_penelitian"
                                        name="judul_penelitian" placeholder="contoh: Asuhan kebidanan bayi baru lahir">
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- ++++++++++ JAM RAPAT +++++++++++++++ -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Surat Dari</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nama_pejabat"
                                                    name="nama_pejabat" placeholder="contoh: Dekan Stikes Satria Bhakti
                                                Nganjuk">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">No. Surat Pengantar</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="no_surat" name="no_surat"
                                                    placeholder="contoh: IIII/STIKes.SB/DIII.Keb/TU/I/2022">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- ++++++++++ JAM RAPAT +++++++++++++++ -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Status Pemohon</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="status_pemohon"
                                                    name="status_pemohon" placeholder="contoh: Mahasiswi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">No. Whatsapp</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="no_wa" name="no_wa"
                                                    placeholder="contoh: 08XXXXXXXXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="teammembersName" class="form-label">Lokasi Kegiatan Penelitian</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        placeholder="Contoh: PMB Cicik Yuni SST.KEB Ds.Pesadukuh, Kec.Bagor, Kab.Nganjuk">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="teammembersName" class="form-label">Alamat Lembaga Pemohon</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Contoh: Jl.Panglima Sudirman VI - Jl.Brantas No.3B Nganjuk 64412 Telp/Fax (0358)326110">
                                </div>
                            </div>




                            <div class="col-12">
                                <!-- ++++++++++ JAM RAPAT +++++++++++++++ -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lama Kegiatan</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="lama_kegiatan"
                                                    name="lama_kegiatan" placeholder="contoh: 33 hari">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Anggota Penelitian</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="jumlah_anggota"
                                                    name="jumlah_anggota" placeholder="contoh: 1 orang">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-12" id="event-time"> -->
                            <!-- ++++++++++ JAM RAPAT +++++++++++++++ -->
                            <!-- <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mulai</label>
                                            <div class="input-group">

                                                <input type="date" id="mulai_penelitian" name="mulai_penelitian"
                                                    class="form-control flatpickr flatpickr-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Selesai</label>
                                            <div class="input-group">

                                                <input type="date" id="selesai_penelitian" name="selesai_penelitian"
                                                    class="form-control flatpickr flatpickr-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="teammembersName" class="form-label">Perihal Surat</label>
                                    <input type="text" class="form-control" id="perihal" name="perihal"
                                        placeholder="Permohonan Bantuan Pengumpulan Data Awal Penyusunan Proposal">
                                </div>
                            </div>

                            <!-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Surat Pengantar</label>

                                    <input class="form-control" type="file" id="file" name="file">
                                    <div style="margin-top: 1rem;">
                                        <a href="" id="link_download" target="_blank"
                                            class="btn btn-warning btn-label waves-effect waves-light"><i
                                                class=" ri-download-cloud-2-fill label-icon align-middle fs-16 me-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-12" id="progress" style="display:none">
                                <div class="progress animated-progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"> Harap Tunggu</div>
                                </div>
                            </div>

                            <div class="col-lg-12" id="tombol">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-success" onclick="save_pengajuan()"><i
                                            class="las la-save"></i> Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                            class="las la-times"></i> Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
    <!--end pengajuan izin-->

    <!------------------------------------------MODAL DOWNLOAD---------------------------------->

    <div class="modal fade" id="download" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p- bg-soft-info">
                    <h5 class="modal-title" id="myModalLabel">Detail Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_input">
                        <input type="hidden" class="form-control" id="id_download" name="id_download">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <table style="width:100%">
                                        <tr>
                                            <th>Nama Pemohon</th>
                                            <th>Perihal</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="id_user"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="id_kategori"></span></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>Status Pemohon</th>
                                            <th>Judul Penelitian</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="status_pemohon"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="judul"></span></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Mulai Penalitian</th>
                                            <th>Selesai Penelitian</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="mulai_penelitian"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="selesai_penelitian"></span></td>
                                        </tr> -->
                                        <tr>
                                            <th>Pejabat</th>
                                            <th>No. Surat</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="nama_pejabat"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="no_surat"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>No. Whatsapp</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="alamat"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="no_wa"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi</th>
                                            <th>Lama Kegiatan</th>
                                        </tr>
                                        <tr>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="lokasi_kegiatan"></span></td>
                                            <td><label for="teammembersName" class="form-label"></label><span
                                                    id="lama_kegiatan"></span></td>
                                        </tr>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <?php if ($this->session->userdata('role') == 1) {?>
                                    <label for="teammembersName" class="form-label">Disampaikan Kepada : </label>
                                    <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                                    <input type="hidden" class="form-control" id="indikator" name="indikator">
                                    <select class="form-control" name="id_dinas1" id="id_dinas1" required>
                                        <option value="" selected disabled>Pilihan Dinas</option>
                                        <?php
foreach ($data_dinas as $val) {?>
                                        <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                                        <?php }?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('role') == 1) {?>
                        <label for="teammembersName" class="form-label">Tembusan Disampaikan Kepada</label>
                        <ol>
                            <li>Bupati Nganjuk (Sebagai Laporan)</li>
                            <li>Kepala Bappeda Kabupaten Nganjuk</li>
                        </ol>
                        <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                        <input type="hidden" class="form-control" id="indikator" name="indikator">
                        <select class="form-control" name="id_dinas2" id="id_dinas2" required>
                            <option value="" selected disabled>Pilihan Dinas</option>
                            <?php foreach ($data_dinas as $val) {?>
                            <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                            <?php }?>
                        </select><br>
                        <select class="form-control" name="id_dinas3" id="id_dinas3" required>
                            <option value="" selected disabled>Pilihan Dinas</option>
                            <?php foreach ($data_dinas as $val) {?>
                            <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                            <?php }?>
                        </select><br>
                        <select class="form-control" name="id_dinas4" id="id_dinas4" required>
                            <option value="" selected disabled>Pilihan Dinas</option>
                            <?php foreach ($data_dinas as $val) {?>
                            <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                            <?php }?>
                        </select><br>
                        <select class="form-control" name="id_dinas5" id="id_dinas5" required>
                            <option value="" selected disabled>Pilihan Dinas</option>
                            <?php foreach ($data_dinas as $val) {?>
                            <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                            <?php }?>
                        </select><br>
                        <select class="form-control" name="id_dinas6" id="id_dinas6" required>
                            <option value="" selected disabled>Pilihan Dinas</option>
                            <?php foreach ($data_dinas as $val) {?>
                            <option value="<?=$val->nama;?>" ;?><?=$val->nama;?></option>;
                            <?php }?>
                        </select>
                        <?php }?>
                        <br>
                        <div class="col-lg-12" id="tombol">
                            <div class="hstack gap-2 justify-content-end">
                                <?php
if ($this->session->userdata('role') == 1) {
    // <a href="" id="url_download" class="btn btn-success" title="Download"><i
    //         class="las la-print"></i> Download</a>
    echo '<button type="button" class="btn btn-info" onclick="download_surat()"><i
                                        class="las la-print"></i> Download</button>';
    echo '<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        class="las la-times"></i> Batal</button>';
} else {
    echo '<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        class="las la-times"></i> Batal</button>';
}
?>
                            </div>
                        </div>
                </div>

            </div>
        </div>
        </form>

    </div>
    <!--end modal-content-->

    <!-- Gambar Modal -->
    <div class="modal fade" id="modal_gambar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="myModalLabel">Detail Foto/Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <img id="gambar" src="" style="width: 100%; padding-right: 2rem; padding-bottom: 2rem">
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
    <!--end modal-->



    <?php $this->load->view('users/layout/new-footer');?>

    <script type="text/javascript">
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';

    $('#addmembers').on('hidden.bs.modal', function() {
        $("#addmembers").find("input[name='indikator']").val('');
        $("#addmembers").find("input[name='id_edit']").val('');
        $("#addmembers").find("input[name='judul_penelitian']").val('');
        $("#addmembers").find("input[name='mulai_penelitian']").val('');
        $("#addmembers").find("input[name='selesai_penelitian']").val('');
        $("#addmembers").find("input[name='nama_pejabat']").val('');
        $("#addmembers").find("input[name='no_surat']").val('');
        $("#addmembers").find("input[name='status_pemohon']").val('');
        $("#addmembers").find("input[name='no_wa']").val('');
        $("#addmembers").find("input[name='lokasi']").val('');
        $("#addmembers").find("input[name='alamat']").val('');
        $("#addmembers").find("input[name='lama_kegiatan']").val('');
        $("#addmembers").find("input[name='jumlah_anggota']").val('');
        $("#addmembers").find("input[name='perihal']").val('');
        $("#addmembers").find("select[name='kategori']").val('');
        $("#addmembers").find("input[name='file_gambar']").val('');

        $("#addmembers").find("a[id='link_download']").text('');
        $("#addmembers").find("a[id='link_download']").removeAttr("href");
    })

    function save_pengajuan() {
        var indikator = $("#addmembers").find("input[name='indikator']").val();
        var id = $("#addmembers").find("input[name='id_edit']").val();
        var judul_penelitian = $("#addmembers").find("input[name='judul_penelitian']").val();
        var mulai_penelitian = $("#addmembers").find("input[name='mulai_penelitian']").val();
        var selesai_penelitian = $("#addmembers").find("input[name='selesai_penelitian']").val();
        var nama_pejabat = $("#addmembers").find("input[name='nama_pejabat']").val();
        var no_surat = $("#addmembers").find("input[name='no_surat']").val();
        var status_pemohon = $("#addmembers").find("input[name='status_pemohon']").val();
        var no_wa = $("#addmembers").find("input[name='no_wa']").val();
        var lokasi = $("#addmembers").find("input[name='lokasi']").val();
        var alamat = $("#addmembers").find("input[name='alamat']").val();
        var lama_kegiatan = $("#addmembers").find("input[name='lama_kegiatan']").val();
        var jumlah_anggota = $("#addmembers").find("input[name='jumlah_anggota']").val();
        var kategori = $("#addmembers").find("select[name='id_kategori']").val();
        var perihal = $("#addmembers").find("input[name='perihal']").val();
        // var file_gambar = $("#addmembers").find("input[name='file']")[0].files[0];
        var url = '';



        if (indikator == 69) {
            url = 'pengajuan/edit-data/' + id;
        } else {
            url = 'pengajuan/insert-data';
        }


        if (judul_penelitian == "" || perihal == "") {
            toastr.error('Harap Isi Semua Kolom', 'Error Alert', {
                timeOut: 5000
            });
        } else {
            var form_data = new FormData();
            form_data.append('id_edit', id);
            form_data.append('judul_penelitian', judul_penelitian);
            form_data.append('mulai_penelitian', mulai_penelitian);
            form_data.append('selesai_penelitian', selesai_penelitian);
            // form_data.append('file_gambar', file_gambar);
            form_data.append('id_kategori', kategori);
            form_data.append('nama_pejabat', nama_pejabat);
            form_data.append('no_surat', no_surat);
            form_data.append('status_pemohon', status_pemohon);
            form_data.append('no_wa', no_wa);
            form_data.append('lokasi', lokasi);
            form_data.append('alamat', alamat);
            form_data.append('lama_kegiatan', lama_kegiatan);
            form_data.append('jumlah_anggota', jumlah_anggota);
            form_data.append('perihal', perihal);

            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data, status) {
                    if (data.status != 'error') {
                        $("#addmembers").find("input[name='id_edit']").val('');
                        $("#addmembers").find("input[name='judul_penelitian']").val('');
                        $("#addmembers").find("input[name='mulai_penelitian']").val('');
                        $("#addmembers").find("input[name='selesai_penelitian']").val('');
                        $("#addmembers").find("select[name='kategori']").val('');
                        // $("#addmembers").find("input[name='file_gambar']").val('');
                        $("#addmembers").find("input[name='nama_pejabat']").val('');
                        $("#addmembers").find("input[name='no_surat']").val('');
                        $("#addmembers").find("input[name='status_pemohon']").val('');
                        $("#addmembers").find("input[name='no_wa']").val('');
                        $("#addmembers").find("input[name='lokasi']").val('');
                        $("#addmembers").find("input[name='alamat']").val('');
                        $("#addmembers").find("input[name='lama_kegiatan']").val('');
                        $("#addmembers").find("input[name='jumlah_anggota']").val('');
                        $("#addmembers").find("input[name='perihal']").val('');

                        $(".modal").modal('hide');
                        location.reload();
                        toastr.success(data.msg, 'Success Alert', {
                            timeOut: 5000
                        });
                        toastr.success('Data Berhasil Disimpan', 'Success Alert', {
                            timeOut: 5000
                        });
                    } else {
                        toastr.error(data.msg, 'Error Alert', {
                            timeOut: 5000
                        });
                    }
                },
            })
        }
    }

    function update(id) {
        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id/' + id,
            success: function(data) {
                console.log(data);
                var filename = data.data[0].upload_file.split('/').pop();

                $("#addmembers").find("input[name='indikator']").val(69);
                $("#addmembers").find("input[name='id_edit']").val(data.data[0].id);
                $("#addmembers").find("input[name='judul_penelitian']").val(data.data[0]
                    .judul_penelitian);
                $("#addmembers").find("input[name='mulai_penelitian']").val(data.data[0]
                    .mulai_penelitian);
                $("#addmembers").find("input[name='selesai_penelitian']").val(data.data[0]
                    .selesai_penelitian);
                $("#addmembers").find("input[name='nama_pejabat']").val(data.data[0].nama_pejabat);
                $("#addmembers").find("input[name='no_surat']").val(data.data[0].no_surat);
                $("#addmembers").find("input[name='status_pemohon']").val(data.data[0].status_pemohon);
                $("#addmembers").find("input[name='no_wa']").val(data.data[0].no_wa);
                $("#addmembers").find("input[name='lokasi']").val(data.data[0].lokasi);
                $("#addmembers").find("input[name='alamat']").val(data.data[0].alamat);
                $("#addmembers").find("input[name='lama_kegiatan']").val(data.data[0].lama_kegiatan);
                $("#addmembers").find("input[name='jumlah_anggota']").val(data.data[0].jumlah_anggota);
                $("#addmembers").find("input[name='perihal']").val(data.data[0].perihal);
                $("#addmembers").find("select[name='id_kategori']").val(data.data[0].id_kategori);
                $("#addmembers").find("a[id='link_download']").attr("href", baseUrl + data.data[0]
                    .upload_file);
                $("#addmembers").find("a[id='link_download']").text('' + filename);
                $("#addmembers").find("input[name='perihal']").val(data.data[0].perihal);
                $('#addmembers').modal('show');
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function preview(id) {
        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id-print/' + id,
            success: function(data) {

                var filename = data.upload_file.split('/').pop();
                var url_download = '<?=site_url('Word/print_pengajuan')?>' + '/' + data.id;
                console.log(url_download);

                $("#download").find("input[name='id_download']").val(data.id);
                $("#download").find("span[id='judul']").text(data.judul_penelitian);
                $("#download").find("span[id='mulai_penelitian']").text(data.mulai_penelitian);
                $("#download").find("span[id='id_user']").text(data.id_user);
                $("#download").find("span[id='selesai_penelitian']").text(data.selesai_penelitian);
                $("#download").find("span[id='nama_pejabat']").text(data.nama_pejabat);
                $("#download").find("span[id='no_surat']").text(data.no_surat);
                $("#download").find("span[id='status_pemohon']").text(data.status_pemohon);
                $("#download").find("span[id='no_wa']").text(data.no_wa);
                $("#download").find("span[id='lokasi_kegiatan']").text(data.lokasi);
                $("#download").find("span[id='alamat']").text(data.alamat);
                $("#download").find("span[id='lama_kegiatan']").text(data.lama_kegiatan);
                $("#download").find("span[id='jumlah_anggota']").text(data.jumlah_anggota);
                $("#download").find("span[id='perihal']").text(data.perihal);
                $("#download").find("span[id='id_kategori']").text(data.id_kategori);
                $("#download").find("a[id='link_download']").attr("href", baseUrl + data.upload_file);
                $("#download").find("a[id='link_download']").text('' + filename);
                $("#download").find("input[name='perihal']").val(data.perihal);

                $('#download').modal('show');
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function download_surat() {

        var id_download = $("#download").find("input[id='id_download']").val();
        var id_dinas1 = $("#download").find("select[id='id_dinas1']").val();
        var id_dinas2 = $("#download").find("select[id='id_dinas2']").val();
        var id_dinas3 = $("#download").find("select[id='id_dinas3']").val();
        var id_dinas4 = $("#download").find("select[id='id_dinas4']").val();
        var id_dinas5 = $("#download").find("select[id='id_dinas5']").val();
        var id_dinas6 = $("#download").find("select[id='id_dinas6']").val();

        var form_data = new FormData();
        form_data.append('id_download', id_download);
        form_data.append('id_dinas1', id_dinas1);
        form_data.append('id_dinas2', id_dinas2);
        form_data.append('id_dinas3', id_dinas3);
        form_data.append('id_dinas4', id_dinas4);
        form_data.append('id_dinas5', id_dinas5);
        form_data.append('id_dinas6', id_dinas6);

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '<?=site_url('Word/print_pengajuan')?>',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                console.log(data);
                window.location.href = '<?=base_url();?>' + data;
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function hapus(id) {

        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id/' + id,
            success: function(data) {
                var judul_penelitian = data.data[0].judul_penelitian;
                Swal.fire({
                    title: 'Hapus Data',
                    text: "Apakah Anda Yakin Untuk Menghapus : " + judul_penelitian,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal',
                    showCloseButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            url: 'pengajuan/remove/' + id,
                            data: {
                                id: id
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data Berhasil Dihapus",
                                    icon: "success",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            failure: function(response) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Gagal Menghapus Data",
                                    icon: "warning",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    window.location.reload();
                                });
                            }
                        });
                    } else if (

                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            'Dibatalkan',
                            'Batal Menghapus Data :)',
                            'error'
                        )
                    }
                })
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function detail_foto(id) {
        var url_gambar = "";
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id/' + id,
            success: function(data) {
                url_gambar = baseUrl + '/' + data.data[0].upload_file;
                $("#modal_gambar").find("#gambar").attr("src", url_gambar);
                $('#modal_gambar').modal('show');
                console.log(url_gambar);
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function update_approve(id) {
        console.log(id);
        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id/' + id,
            success: function(data) {
                var judul_penelitian = data.data[0].judul_penelitian;
                Swal.fire({
                    title: 'Setujui Proposal',
                    text: "Apakah Anda Yakin Untuk Menyetujui : " + judul_penelitian,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: 'Setuju!',
                    cancelButtonText: 'Batal',
                    showCloseButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            url: 'pengajuan/update_approve/' + id,
                            data: {
                                id: id,
                                isApproved: 1
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Proposal telah disetujui",
                                    icon: "success",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            failure: function(response) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Proposal gagal disetujui",
                                    icon: "warning",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    window.location.reload();
                                });
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            'Dibatalkan',
                            'Batal Menyetujui Proposal :)',
                            'error'
                        )
                    }
                })
            },
            error: function(data) {
                console.log('error');
            }
        });
    }

    function update_nonapprove(id) {
        console.log(id);
        $.ajax({
            dataType: 'json',
            url: 'pengajuan/ambil-data-by-id/' + id,
            success: function(data) {
                var judul_penelitian = data.data[0].judul_penelitian;
                Swal.fire({
                    title: 'Setujui Proposal',
                    text: "Apakah Anda Yakin Untuk Tidak Menyetujui : " + judul_penelitian,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: 'Tidak Setuju!',
                    cancelButtonText: 'Batal',
                    showCloseButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            url: 'pengajuan/update_approve/' + id,
                            data: {
                                id: id,
                                isApproved: 0
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Maaf!",
                                    text: "Proposal Belum disetujui",
                                    icon: "success",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            failure: function(response) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Gagal Menyetujui Proposal",
                                    icon: "warning",
                                    confirmButtonClass: "btn btn-primary w-xs mt-2",
                                    buttonsStyling: !1
                                }).then(function() {
                                    window.location.reload();
                                });
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            'Dibatalkan',
                            'Batal Menyetujui Proposal :)',
                            'error'
                        )
                    }
                })
            },
            error: function(data) {
                console.log('error');
            }
        });
    }
    </script>