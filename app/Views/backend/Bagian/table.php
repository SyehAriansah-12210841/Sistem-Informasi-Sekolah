<?= $this->extend('backend/template') ?>
   <?= $this->section('content') ?>
    <div class="container">
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
    </li>
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-bagian' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Nama</th>
            <th>fungsi</th>
            <th>tugas pokok</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Bagian</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formBagian" method="post" action="<?=base_url('bagian')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                    <select name="nama" class="form-control">
                        <option value="Guru">Guru</option>
                        <option value="TU">Tu</option>
                        <option value="BK">Bk</option>
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                        <option value="PramuBakti">PramuBakti</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fungsi</label>
                    <select name="fungsi" class="form-control">
                        <option value="Satuan Pendidik Sekolah">Guru</option>
                        <option value="Penata Administrasi Sekolah">Tu</option>
                        <option value="Konselor Siswa">Bk</option>
                        <option value="Kepala Sekolah Sebagai Manajer">Kepala Sekolah</option>
                        <option value="Menyusun program pengajaran">Wakil Kepala Sekolah</option>
                        <option value="pengantaran dan penjemputan dokumen">PramuBakti</option>



                    </select>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Tugas Pokok</label>
                    <select name="tugas_pokok" class="form-control">
                        <option value="Menyiapkan Bahan Ajar, Mendidik Siswa dan Melakukan Penilaian">Guru</option>
                        <option value="Administrasi Kegiatan Kependidikan, Mempersiapkan Jadwal, Membantu Guru">Tu</option>
                        <option value="Memberikan Konsultasi, Motivasi, dan Pengawasan Kepada Peserta Didik">Bk</option>
                        <option value="Merumuskan, menetapkan, dan mengembangkan visi misi sekolah.">Kepala Sekolah</option>
                        <option value="Mengatur pelaksaan program perbaikan dan pengayaan">Wakil Kepala Sekolah</option>
                        <option value="membantu kelancaran sosial dari suatu sekolah.">PramuBakti</option>
                    </select>
                    </div>
                </form>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id='btn-kirim'>Kirim</button>
                    </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('form#formBagian').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-bagian").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formBagian').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formBagian').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-bagian').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/bagian/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=nama]').val(e.nama);
                $('input[name=fungsi]').val(e.fungsi);
                $('input[name=tugas_pokok]').val(e.tugas_pokok);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-bagian').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/bagian`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-bagian').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-bagian').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('bagian/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'nama'},
                {data: 'fungsi'},
                {data: 'tugas_pokok'},
                {data: 'id',
                    render: (data, type, meta, row)=>{
                        var btnEdit = `<button class='btn-edit' data-id='${data}'> Edit </button>`;
                        var btnHapus = `<button class='btn-hapus' data-id='${data}'> Hapus </button>`;
                        return btnEdit + btnHapus;
                    }
                }
            ]
        });
    });
</script>
<?= $this->endSection() ?>