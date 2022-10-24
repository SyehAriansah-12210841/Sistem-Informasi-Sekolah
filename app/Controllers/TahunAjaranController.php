<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\TahunAjarModel;
use CodeIgniter\Exceptions\PageNotFoundException;
class TahunAjaranController extends BaseController
{
    public function index()
    {
        return view('TahunAjaran/table');
    }
    public function all(){
        $pm = new TahunAjarModel();
        $pm ->select('id,tahun_ajaran,tgl_mulai,tgl_selesai,status_aktif');

        return (new Datatable($pm))
            ->setFieldFilter(['id','tahun_ajaran','tgl_mulai','tgl_selesai','status_aktif'])
            ->draw();
    }
    public function show($id){
        $r = (new TahunAjarModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
}
}