<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
            <th>Created At</th>
            <th>Updated At</th>
            <th>Deleted At</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
</table>
<script>
    $(document).ready(function(){
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
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'deleted_at'},



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