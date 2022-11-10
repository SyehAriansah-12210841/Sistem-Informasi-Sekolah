<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\KehadiranSiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KehadiranSiswaController extends BaseController
{
    public function index()
    {
        return view('kehadiransiswa/table');
    }
    public function all(){
        $pm = new KehadiranSiswaModel();
        $pm ->select('id,kehadiran_guru_id,siswa_id,status_hadir');

        return (new Datatable($pm))
            ->setFieldFilter(['id','kehadiran_guru_id','siswa_id','status_hadir'])
            ->draw();
    }
    public function show($id){
        $r = (new KehadiranSiswaModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new KehadiranSiswaModel();

    $id = $pm->insert([
        'kehadiran_guru_id' =>$this->request->getVar('kehadiran_guru_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
        'status_hadir' =>$this->request->getVar('status_hadir'),

    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new KehadiranSiswaModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'kehadiran_guru_id' =>$this->request->getVar('kehadiran_guru_id'),
        'siswa_id' =>$this->request->getVar('siswa_id'),
        'status_hadir' =>$this->request->getVar('status_hadir'),

    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new KehadiranSiswaModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}