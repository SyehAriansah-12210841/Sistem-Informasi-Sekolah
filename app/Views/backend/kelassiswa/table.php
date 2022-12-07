<?= $this->extend('backend/template') ?>
   <?= $this->section('content') ?>
    <div class="container">
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
    </li>
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-kelassiswa' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Kelas Id</th>
            <th>Siswa Id</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Kelas Siswa</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formkelassiswa" method="post" action="<?=base_url('kelassiswa')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Kelas Id</label>
                        <select name="kelas_id" class="form-control">
                            <option>Pilih Kelas id</option>
                            <?php foreach ($kelas as $k) :?>
                                <option value='<?=$k['id']?>'><?=$k['id']?></option>
                             <?php endforeach;?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Siswa Id</label>
                        <select name="siswa_id" class="form-control">
                            <option>Pilih Siswa id</option>
                            <?php foreach ($siswa as $k) :?>
                                <option value='<?=$k['id']?>'><?=$k['id']?></option>
                             <?php endforeach;?>
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
        $('form#formkelassiswa').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-kelassiswa").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formkelassiswa').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formkelassiswa').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-kelassiswa').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/kelassiswa/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=kelas_id]').val(e.kelas_id);
                $('input[name=siswa_id]').val(e.siswa_id);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-kelassiswa').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/kelassiswa`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-kelassiswa').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-kelassiswa').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('kelassiswa/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'kelas_id'},
                {data: 'siswa_id'},                
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