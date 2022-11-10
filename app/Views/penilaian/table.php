<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-penilaian' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Mapel Id</th>
            <th>Siswa Id</th>
            <th>Total Nilai</th>
            <th>Deskripsi Nilai</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penilaian</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formpenilaian" method="post" action="<?=base_url('penilaian')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Mapel Id</label>
                        <input type="text" name="mapel_id" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Siswa Id</label>
                        <input type="text" name="siswa_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Nilai</label>
                        <input type="text" name="total_kehadiran" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Nilai </label>
                        <input type="text" name="deskripsi_nilai" class="form-control"/>
                        
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
        $('form#formpenilaian').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-penilaian").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formpenilaian').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formpenilaian').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-penilaian').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/penilaian/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=mapel_id]').val(e.mapel_id);
                $('input[name=siswa_id]').val(e.siswa_id);
                $('input[name=total_kehadiran]').val(e.total_kehadiran);
                $('input[name=deskripsi_nilai]').val(e.deskripsi_nilai);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-penilaian').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/penilaian`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-penilaian').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-penilaian').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('penilaian/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'mapel_id'},
                {data: 'siswa_id'},
                {data: 'total_kehadiran'},
                {data: 'deskripsi_nilai'},                
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