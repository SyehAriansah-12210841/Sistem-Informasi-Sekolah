<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
<table id='table-siswa' class="datatable table table-bordered border-primary">
    <thead>
        <tr class='table-primary'>
            <th>No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Status Masuk</th>
            <th>Tahun Masuk</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>NIK</th>
            <th>No KK</th>
            <th>Gender</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Skr Kelas Id</th>
            <th>No Telpon Rumah</th>
            <th>No Hp Ibu</th>
            <th>No Hp Ayah</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Nama Wali</th>
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
                <h5 class="modal-title">Form Siswa</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">
                    <form id="formSiswa" method="post" action="<?=base_url('siswa')?>">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <input type="number" name="nisn" class="form-control"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nis</label>
                        <input type="number" name="nis" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Masuk</label>
                    <select name="status_masuk" class="form-control">
                        <option value="A">Asal</option>
                        <option value="P">Pindahan</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Masuk</label>
                        <input type="text" name="thn_masuk" class="form-control"/>
                        
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
                        <label class="form-label">Nik</label>
                        <input type="number" name="nik" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Kk</label>
                        <input type="number" name="no_kk" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
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
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Skr Kelas Id</label>
                        <input type="number" name="skr_kelas_id" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telpon Rumah</label>
                        <input type="text" name="no_telp_rumah" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Hp Ibu</label>
                        <input type="text" name="no_hp_ibu" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Hp Ayah</label>
                        <input type="text" name="no_hp_ayah" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" name="nm_ayah" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" name="nm_ibu" class="form-control"/>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Wali</label>
                        <input type="text" name="nm_wali" class="form-control"/>
                        
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
        $('form#formSiswa').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response,status)=>{
                $("#modalForm").modal('hide');
                $("table#table-siswa").DataTable().ajax.reload();
            },
            error: (xhr,status)=>{
                alert('maaf, data pengguna gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formSiswa').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formSiswa').trigger('reset');
            $('input[name=_method]').val('');
        });
        
        $('table#table-siswa').on('click', '.btn-edit', function(){
            let id =$(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/siswa/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=nisn]').val(e.nisn);
                $('input[name=nis]').val(e.nis);
                $('input[name=status_masuk]').val(e.status_masuk);
                $('input[name=thn_masuk]').val(e.thn_masuk);
                $('input[name=nama_depan]').val(e.nama_depan);
                $('input[name=nama_belakang]').val(e.nama_belakang);
                $('input[name=nik]').val(e.nik);
                $('input[name=no_kk]').val(e.no_kk);
                $('input[name=gender]').val(e.gender);
                $('input[name=tgl_lahir]').val(e.tgl_lahir);
                $('input[name=tempat_lahir]').val(e.tempat_lahir);
                $('input[name=alamat]').val(e.alamat);
                $('input[name=kota]').val(e.kota);
                $('input[name=skr_kelas_id]').val(e.skr_kelas_id);
                $('input[name=no_telp_rumah]').val(e.no_telp_rumah);
                $('input[name=no_hp_ibu]').val(e.no_hp_ibu);
                $('input[name=no_hp_ayah]').val(e.no_hp_ayah);
                $('input[name=nm_ayah]').val(e.nm_ayah);
                $('input[name=nm_ibu]').val(e.nm_ibu);
                $('input[name=nm_wali]').val(e.nm_wali);
                $('input[name=foto]').val(e.foto);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });
        $('table#table-siswa').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data pegawai akan dihapus, ingin melanjutkan?');

            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/siswa`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-siswa').DataTable().ajax.reload();
                });
            }
        });
        $('table#table-siswa').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('siswa/all')  ?>",
                method: 'GET'
            },
            columns:[
                {data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
                // {data: 'id'},
                {data: 'nisn'},
                {data: 'nis'},
                {data: 'status_masuk'},
                {data: 'thn_masuk'},
                {data: 'nama_depan'},
                {data: 'nama_belakang'},
                {data: 'nik'},
                {data: 'no_kk'},
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
                {data: 'tgl_lahir'},
                {data: 'tempat_lahir'},
                {data: 'alamat'},
                {data: 'kota'},
                {data: 'skr_kelas_id'},
                {data: 'no_telp_rumah'},
                {data: 'no_hp_ibu'},
                {data: 'no_hp_ayah'},
                {data: 'nm_ayah'},
                {data: 'nm_ibu'},
                {data: 'nm_wali'},
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