<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\KehadiranGuruModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KehadiranGuruController extends BaseController
{
    public function index()
    {
        return view('kehadiranguru/table');
    }
    public function all(){
        $pm = new KehadiranGuruModel();
        $pm ->select('id,waktu_masuk,waktu_keluar,pertemuan,pegawai_id,jadwal_id,berita_acara');

        return (new Datatable($pm))
            ->setFieldFilter(['id','waktu_masuk','waktu_keluar','pertemuan','pegawai_id','jadwal_id','berita_acara'])
            ->draw();
    }
    public function show($id){
        $r = (new KehadiranGuruModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new KehadiranGuruModel();

    $id = $pm->insert([
        'waktu_masuk' =>$this->request->getVar('waktu_masuk'),
        'waktu_keluar' =>$this->request->getVar('waktu_keluar'),
        'pertemuan' =>$this->request->getVar('pertemuan'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'jadwal_id' =>$this->request->getVar('jadwal_id'),
        'berita_acara' =>$this->request->getVar('berita_acara'),

    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new KehadiranGuruModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'waktu_masuk' =>$this->request->getVar('waktu_masuk'),
        'waktu_keluar' =>$this->request->getVar('waktu_keluar'),
        'pertemuan' =>$this->request->getVar('pertemuan'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'jadwal_id' =>$this->request->getVar('jadwal_id'),
        'berita_acara' =>$this->request->getVar('berita_acara'),

    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new KehadiranGuruModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}