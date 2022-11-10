<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-jadwal' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Hari</th>
            <th>Kelas Id</th>
            <th>Mapel Id</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Pegawai Id</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Jadwal</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formJadwal" method="post" action="<?=base_url('jadwal')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                    <select name="hari" class="form-control">
                        <option value="1">Minggu</option>
                        <option value="2">Senin</option>
                        <option value="3">Selasa</option>
                        <option value="4">Rabu</option>
                        <option value="5">Kamis</option>
                        <option value="6">Jum'at</option>
                        <option value="7">Sabtu</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas Id</label>
                        <input type="text" name="kelas_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mapel Id</label>
                        <input type="text" name="mapel_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pegawai Id</label>
                        <input type="text" name="pegawai_id" class="form-control"/>

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
        $('form#formJadwal').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-jadwal").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formJadwal').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formJadwal').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-jadwal').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/jadwal/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=hari]').val(e.hari);
                $('input[name=kelas_id]').val(e.kelas_id);
                $('input[name=mapel_id]').val(e.mapel_id);
                $('input[name=jam_mulai]').val(e.jam_mulai);
                $('input[name=jam_selesai]').val(e.jam_selesai);
                $('input[name=pegawai_id]').val(e.pegawai_id);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-jadwal').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/jadwal`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-jadwal').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-jadwal').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('jadwal/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'hari'},
                {data: 'kelas_id'},
                {data: 'mapel_id'},
                {data: 'jam_mulai'},
                {data: 'jam_selesai'},
                {data: 'pegawai_id'},                
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