<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\KelasModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KelasController extends BaseController
{
    public function index()
    {
        return view('kelas/table');
    }
    public function all(){
        $pm = new KelasModel();
        $pm ->select('id,tingkat,kelas,pegawai_id,tahun_ajaran_id');

        return (new Datatable($pm))
            ->setFieldFilter(['id','tingkat','kelas','pegawai_id','tahun_ajaran_id'])
            ->draw();
    }
    public function show($id){
        $r = (new KelasModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new KelasModel();

    $id = $pm->insert([
        'tingkat' =>$this->request->getVar('tingkat'),
        'kelas' =>$this->request->getVar('kelas'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'tahun_ajaran_id' =>$this->request->getVar('tahun_ajaran_id'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new KelasModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'tingkat' =>$this->request->getVar('tingkat'),
        'kelas' =>$this->request->getVar('kelas'),
        'pegawai_id' =>$this->request->getVar('pegawai_id'),
        'tahun_ajaran_id' =>$this->request->getVar('tahun_ajaran_id'),

    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new KelasModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}