<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

<table id='table-rincianpenilaian' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>Penilaian Id</th>
            <th>Nama Nilai</th>
            <th>Nilai Angka</th>
            <th>Nilai Deskripsi</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Rincian Penilaian</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formrincianpenilaian" method="post" action="<?=base_url('rincianpenilaian')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Penilaian Id</label>
                        <input type="text" name="penilaian_id" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Nilai</label>
                        <input type="text" name="nama_nilai" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai Angka</label>
                        <input type="text" name="nilai_angka" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai Deskripsi</label>
                        <input type="text" name="nilai_deskripsi" class="form-control"/>
                        
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
        $('form#formrincianpenilaian').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-rincianpenilaian").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formrincianpenilaian').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formrincianpenilaian').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-rincianpenilaian').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/rincianpenilaian/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=penilaian_id]').val(e.penilaian_id);
                $('input[name=nama_nilai]').val(e.nama_nilai);
                $('input[name=nilai_angka]').val(e.nilai_angka);
                $('input[name=nilai_deskripsi]').val(e.nilai_deskripsi);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-rincianpenilaian').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/rincianpenilaian`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-rincianpenilaian').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-rincianpenilaian').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('rincianpenilaian/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'penilaian_id'},
                {data: 'nama_nilai'},
                {data: 'nilai_angka'},
                {data: 'nilai_deskripsi'},                
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