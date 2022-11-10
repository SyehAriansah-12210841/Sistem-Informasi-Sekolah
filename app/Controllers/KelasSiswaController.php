<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\KelasSiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KelasSiswaController extends BaseController
{
    public function index()
    {
        return view('kelassiswa/table');
    }
    public function all(){
        $pm = new KelasSiswaModel();
        $pm ->select('id,kelas_id,siswa_id');

        return (new Datatable($pm))
            ->setFieldFilter(['id','kelas_id','siswa_id'])
            ->draw();
    }
    public function show($id){
        $r = (new KelasSiswaModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new KelasSiswaModel();

    $id = $pm->insert([
        'kelas_id' =>$this->request->getVar('kelas_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new KelasSiswaModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'kelas_id' =>$this->request->getVar('kelas_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new KelasSiswaModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}