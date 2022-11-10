<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\RincianPenilaianModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class RincianPenilaianController extends BaseController
{
    public function index()
    {
        return view('rincianpenilaian/table');
    }
    public function all(){
        $pm = new RincianPenilaianModel();
        $pm ->select('id,penilaian_id,nama_nilai,nilai_angka,nilai_deskripsi');

        return (new Datatable($pm))
            ->setFieldFilter(['id','penilaian_id','nama_nilai','nilai_angka','nilai_deskripsi'])
            ->draw();
    }
    public function show($id){
        $r = (new RincianPenilaianModel())->where('id',$id)->first();
        
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new RincianPenilaianModel();

    $id = $pm->insert([
        'penilaian_id' =>$this->request->getVar('penilaian_id'),
        'nama_nilai' =>$this->request->getVar('nama_nilai'),
        'nilai_angka' =>$this->request->getVar('nilai_angka'),
        'nilai_deskripsi' =>$this->request->getVar('nilai_deskripsi'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new RincianPenilaianModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'penilaian_id' =>$this->request->getVar('penilaian_id'),
        'nama_nilai' =>$this->request->getVar('nama_nilai'),
        'nilai_angka' =>$this->request->getVar('nilai_angka'),
        'nilai_deskripsi' =>$this->request->getVar('nilai_deskripsi'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new RincianPenilaianModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}