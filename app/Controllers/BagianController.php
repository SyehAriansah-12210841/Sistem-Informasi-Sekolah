<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\BagianModel;
use CodeIgniter\Exceptions\PageNotFoundException;
class BagianController extends BaseController
{
public function index()
    {
        return view('Bagian/table');
    }
public function all(){
        $pm = new BagianModel();
        $pm ->select('id, nama, fungsi, tugas_pokok');

        return (new Datatable($pm))
            ->setFieldFilter(['id','nama','fungsi','tugas_pokok'])
            ->draw();
    }
public function show($id){
        $r = (new BagianModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new BagianModel();

    $id = $pm->insert([
        'nama' =>$this->request->getVar('nama'),
        'fungsi' =>$this->request->getVar('fungsi'),
        'tugas_pokok' =>$this->request->getVar('tugas_pokok'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new BagianModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'nama' => $this->request->getVar('nama'),
        'fungsi' =>$this->request->getVar('fungsi'),
        'tugas_pokok' =>$this->request->getVar('tugas_pokok'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new BagianModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}