<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\JadwalModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class JadwalController extends BaseController
{
    public function index()
    {
        return view('jadwal/table');
    }
    public function all(){
        $pm = new JadwalModel();
        $pm ->select('id,hari,kelas_id,mapel_id,jam_mulai,jam_selesai,pegawai_id');

        return (new Datatable($pm))
            ->setFieldFilter(['id','hari','kelas_id','mapel_id','jam_mulai','jam_selesai','pegawai_id'])
            ->draw();
    }
    public function show($id){
        $r = (new JadwalModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new JadwalModel();

    $id = $pm->insert([
        'hari' =>$this->request->getVar('hari'),
        'kelas_id' =>$this->request->getVar('kelas_id'),
        'mapel_id' =>$this->request->getVar('mapel_id'),
        'jam_mulai' =>$this->request->getVar('jam_mulai'),
        'jam_selesai' =>$this->request->getVar('jam_selesai'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),

    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new JadwalModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'hari' => $this->request->getVar('hari'),
        'kelas_id' =>$this->request->getVar('kelas_id'),
        'mapel_id' =>$this->request->getVar('mapel_id'),
        'jam_mulai' =>$this->request->getVar('jam_mulai'),
        'jam_selesai' =>$this->request->getVar('jam_selesai'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),

    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new JadwalModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}