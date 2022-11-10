<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\MapelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MapelController extends BaseController
{
    public function index()
    {
        return view('mapel/table');
    }
    public function all(){
        $pm = new MapelModel();
        $pm ->select('id,mapel,kelompok,keterangan,tingkat,kkm');

        return (new Datatable($pm))
            ->setFieldFilter(['id','mapel','kelompok','keterangan','tingkat','kkm'])
            ->draw();
    }
    public function show($id){
        $r = (new MapelModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new MapelModel();

    $id = $pm->insert([
        'mapel' =>$this->request->getVar('mapel'),
        'kelompok' =>$this->request->getVar('kelompok'),
        'keterangan' =>$this->request->getVar('keterangan'),
        'tingkat' =>$this->request->getVar('tingkat'),
        'kkm' =>$this->request->getVar('kkm'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new MapelModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'mapel' =>$this->request->getVar('mapel'),
        'kelompok' =>$this->request->getVar('kelompok'),
        'keterangan' =>$this->request->getVar('keterangan'),
        'tingkat' =>$this->request->getVar('tingkat'),
        'kkm' =>$this->request->getVar('kkm'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new MapelModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}