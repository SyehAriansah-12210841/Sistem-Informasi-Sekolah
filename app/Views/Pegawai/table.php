<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<table id='table-Pegawai' class="datatable table table-bordered">
    <thead>
        <tr>
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
<script>
    $(document).ready(function(){
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