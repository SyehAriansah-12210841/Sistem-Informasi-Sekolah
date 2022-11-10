<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-kehadiranguru' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Pertemuan</th>
            <th>Pegawai Id</th>
            <th>Jadwal Id</th>
            <th>Berita Acara</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form KehadiranGuru</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formKehadiranGuru" method="post" action="<?=base_url('kehadiranguru')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Waktu Masuk</label>
                        <input type="datetime-local" name="waktu_masuk" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Waktu Keluar</label>
                        <input type="datetime-local" name="waktu_keluar" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pertemuan</label>
                        <input type="text" name="pertemuan" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pegawai Id</label>
                        <input type="text" name="pegawai_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Id</label>
                        <input type="text" name="jadwal_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Berita Acara</label>
                        <input type="text" name="berita_acara" class="form-control"/>
                        
                    </div>
                </form>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id='btn-kirim'>Kirim</button>
                    </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('form#formKehadiranGuru').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-kehadiranguru").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formKehadiranGuru').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formKehadiranGuru').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-kehadiranguru').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/kehadiranguru/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=waktu_masuk]').val(e.waktu_masuk);
                $('input[name=waktu_keluar]').val(e.waktu_keluar);
                $('input[name=pertemuan]').val(e.pertemuan);
                $('input[name=pegawai_id]').val(e.pegawai_id);
                $('input[name=jadwal_id]').val(e.jadwal_id);
                $('input[name=berita_acara]').val(e.berita_acara);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-kehadiranguru').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/kehadiranguru`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-kehadiranguru').DataTable().ajax.reload();
                });
            }
        });
        
        $('table#table-kehadiranguru').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('kehadiranguru/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'waktu_masuk'},
                {data: 'waktu_keluar'},
                {data: 'pertemuan'},
                {data: 'pegawai_id'},
                {data: 'jadwal_id'},
                {data: 'berita_acara'},                
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