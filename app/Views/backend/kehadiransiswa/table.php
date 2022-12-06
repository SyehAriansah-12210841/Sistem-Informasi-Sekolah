<?= $this->extend('backend/template') ?>
   <?= $this->section('content') ?>
    <div class="container">
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
    </li>
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-kehadiransiswa' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Kehadiran Guru Id</th>
            <th>Siswa Id</th>
            <th>Status Hadir</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Kehadiran Siswa</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formkehadiransiswa" method="post" action="<?=base_url('kehadiransiswa')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Kehadiran Guru Id</label>
                        <input type="text" name="kehadiran_guru_id" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Siswa Id</label>
                        <input type="text" name="siswa_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Hadir</label>
                    <select name="status_hadir" class="form-control">
                        <option value="Y">Hadir</option>
                        <option value="T">Tidak Hadir</option>
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
        $('form#formkehadiransiswa').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-kehadiransiswa").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formkehadiransiswa').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formkehadiransiswa').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-kehadiransiswa').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/kehadiransiswa/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=kehadiran_guru_id]').val(e.kehadiran_guru_id);
                $('input[name=siswa_id]').val(e.siswa_id);
                $('input[name=status_hadir]').val(e.status_hadir);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-kehadiransiswa').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/kehadiransiswa`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-kehadiransiswa').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-kehadiransiswa').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('kehadiransiswa/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'kehadiran_guru_id'},
                {data: 'siswa_id'},
                {data: 'status_hadir'},              
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