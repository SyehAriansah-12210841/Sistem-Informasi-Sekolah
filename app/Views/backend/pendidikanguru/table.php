<?= $this->extend('backend/template') ?>
   <?= $this->section('content') ?>
    <div class="container">
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
    </li>
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-pendidikanguru' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Pegawai Id</th>
            <th>Jenjang</th>
            <th>Jurusan</th>
            <th>Asal Sekolah</th>
            <th>Tahun Lulus</th>
            <th>Nilai Ijazah</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pendidikan Guru</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formpendidikan_guru" method="post" action="<?=base_url('pendidikanguru')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                    <label class="form-label">Pegawai Id</label>
                        <select name="pegawai_id" class="form-control">
                            <option>Pilih Pegawai Id</option>
                            <?php foreach ($Pegawai as $k) :?>
                                <option value='<?=$k['id']?>'><?=$k['id']?></option>
                             <?php endforeach;?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenjang</label>
                        <input type="text" name="jenjang" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai Ijazah (0-100)</label>
                        <input type="number" name="nilai_ijasah" min="0" max="100" class="form-control"/>
                        
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
        $('form#formpendidikan_guru').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-pendidikanguru").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formpendidikan_guru').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formpendidikan_guru').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-pendidikanguru').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/pendidikanguru/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=pegawai_id]').val(e.pegawai_id);
                $('input[name=jenjang]').val(e.jenjang);
                $('input[name=jurusan]').val(e.jurusan);
                $('input[name=asal_sekolah]').val(e.asal_sekolah);
                $('input[name=tahun_lulus]').val(e.tahun_lulus);
                $('input[name=nilai_ijasah]').val(e.nilai_ijasah);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-pendidikanguru').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/pendidikanguru`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-pendidikanguru').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-pendidikanguru').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('pendidikanguru/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'pegawai_id'},
                {data: 'jenjang'},
                {data: 'jurusan'},
                {data: 'asal_sekolah'},
                {data: 'tahun_lulus'},
                {data: 'nilai_ijasah'},                
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