<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\PendidikanGuruModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PendidikanGuruController extends BaseController
{
    public function index()
    {
        return view('pendidikanguru/table');
    }
    public function all(){
        $pm = new PendidikanGuruModel();
        $pm ->select('id,pegawai_id,jenjang,jurusan,asal_sekolah,tahun_lulus,nilai_ijasah');

        return (new Datatable($pm))
            ->setFieldFilter(['id','pegawai_id','jenjang','jurusan','asal_sekolah','tahun_lulus','nilai_ijasah'])
            ->draw();
    }
    public function show($id){
        $r = (new PendidikanGuruModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
}
public function store(){
    $pm = new PendidikanGuruModel();

    $id = $pm->insert([
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'jenjang' =>$this->request->getVar('jenjang'),
        'jurusan' =>$this->request->getVar('jurusan'),
        'asal_sekolah' =>$this->request->getVar('asal_sekolah'),
        'tahun_lulus' =>$this->request->getVar('tahun_lulus'),
        'nilai_ijasah' =>$this->request->getVar('nilai_ijasah'),

    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new PendidikanGuruModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'jenjang' =>$this->request->getVar('jenjang'),
        'jurusan' =>$this->request->getVar('jurusan'),
        'asal_sekolah' =>$this->request->getVar('asal_sekolah'),
        'tahun_lulus' =>$this->request->getVar('tahun_lulus'),
        'nilai_ijasah' =>$this->request->getVar('nilai_ijasah'),
     ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new PendidikanGuruModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}