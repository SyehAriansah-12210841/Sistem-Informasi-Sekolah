<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\PenilaianModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PenilaianController extends BaseController
{
    public function index()
    {
        return view('penilaian/table');
    }
    public function all(){
        $pm = new PenilaianModel();
        $pm ->select('id,mapel_id,siswa_id,total_kehadiran,deskripsi_nilai');

        return (new Datatable($pm))
            ->setFieldFilter(['id','mapel_id','siswa_id','total_kehadiran','deskripsi_nilai'])
            ->draw();
    }
    public function show($id){
        $r = (new PenilaianModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
}
public function store(){
    $pm = new PenilaianModel();

    $id = $pm->insert([
        'mapel_id' =>$this->request->getVar('mapel_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
        'total_kehadiran' =>$this->request->getVar('total_kehadiran'),
        'deskripsi_nilai' =>$this->request->getVar('deskripsi_nilai'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new PenilaianModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'mapel_id' =>$this->request->getVar('mapel_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
        'total_kehadiran' =>$this->request->getVar('total_kehadiran'),
        'deskripsi_nilai' =>$this->request->getVar('deskripsi_nilai'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new PenilaianModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}