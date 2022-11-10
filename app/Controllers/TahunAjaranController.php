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

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new TahunAjarModel();

    $id = $pm->insert([
        'tahun_ajaran' =>$this->request->getVar('tahun_ajaran'),
        'tgl_mulai' =>$this->request->getVar('tgl_mulai'),
        'tgl_selesai' =>$this->request->getVar('tgl_selesai'),
        'status_aktif' =>$this->request->getVar('status_aktif'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new TahunAjarModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'tahun_ajaran' =>$this->request->getVar('tahun_ajaran'),
        'tgl_mulai' =>$this->request->getVar('tgl_mulai'),
        'tgl_selesai' =>$this->request->getVar('tgl_selesai'),
        'status_aktif' =>$this->request->getVar('status_aktif'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new TahunAjarModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}