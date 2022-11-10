<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

<table id='table-Pegawai' class="datatable table table-bordered border-primary">
    <thead>
    <tr class='table-primary'>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Gelar Depan</th>
            <th>Gelar Belakang</th>
            <th>Gender</th>
            <th>No Telp</th>
            <th>No Wa</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Foto</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>

    </div>
    <div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pegawai</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formPegawai" method="post" action="<?=base_url('Pegawai')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Nip</label>
                        <input type="text" name="nip" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Depan</label>
                        <input type="text" name="gelar_depan" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telpon</label>
                        <input type="text" name="no_telpon" min="1" max="3" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Wa</label>
                        <input type="text" name="no_wa" min="1" max="3" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bagian Id</label>
                        <input type="number" name="bagian_id" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="sandi" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="text" name="foto" class="form-control"/>

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
        $('form#formPegawai').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-Pegawai").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formPegawai').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formPegawai').trigger('reset');
            $('input[name=_method]').val('');
        });
        $('table#table-Pegawai').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/Pegawai/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=nip]').val(e.nip);
                $('input[name=nama_depan]').val(e.nama_depan);
                $('input[name=nama_belakang]').val(e.nama_belakang);
                $('input[name=gelar_depan]').val(e.gelar_depan);
                $('input[name=gelar_belakang]').val(e.gelar_belakang);
                $('input[name=gender]').val(e.gender);
                $('input[name=no_telpon]').val(e.no_telpon);
                $('input[name=no_wa]').val(e.no_wa);
                $('input[name=email]').val(e.email);
                $('input[name=bagian_id]').val(e.bagian_id);
                $('input[name=sandi]').val(e.sandi);
                $('input[name=alamat]').val(e.alamat);
                $('input[name=kota]').val(e.kota);
                $('input[name=tgl_lahir]').val(e.tgl_lahir);
                $('input[name=tempat_lahir]').val(e.tempat_lahir);
                $('input[name=foto]').val(e.foto);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-Pegawai').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/Pegawai`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-Pegawai').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-Pegawai').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('Pegawai/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'nip'},
                {data: 'nama_depan'},
                {data: 'nama_belakang'},
                {data: 'gelar_depan'},
                {data: 'gelar_belakang'},
                {data: 'gender',
                    render: (data, type, meta, row)=>{
                        if( data === 'L'){
                            return 'Laki-Laki';
                        }else if(data === 'P' ){
                            return 'Perempuan';
                        }
                        return data;
                    }
                    },
                {data: 'no_telpon'},
                {data: 'no_wa'},
                {data: 'email'},
                {data: 'alamat'},
                {data: 'kota'},
                {data: 'tgl_lahir'},
                {data: 'tempat_lahir'},
                {data: 'foto'},
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