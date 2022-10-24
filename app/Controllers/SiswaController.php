<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\SiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class SiswaController extends BaseController
{
    public function index()
    {
        return view('siswa/table');
    }
    public function all(){
        $pm = new SiswaModel();
        $pm ->select('id,nisn,nis,status_masuk,thn_masuk,nama_depan,nama_belakang,nik,no_kk,gender,tgl_lahir,tempat_lahir,alamat,kota,skr_kelas_id,no_telp_rumah,no_hp_ibu,no_hp_ayah,nm_ayah,nm_ibu,nm_wali,foto,created_at,updated_at,deleted_at');

        return (new Datatable($pm))
            ->setFieldFilter(['id','nisn','nis','status_masuk','thn_masuk','nama_depan','nama_belakang','nik','no_kk','gender','tgl_lahir','tempat_lahir','alamat','kota','skr_kelas_id','no_telp_rumah','no_hp_ibu','no_hp_ayah','nm_ayah','nm_ibu','nm_wali','foto','created_at','updated_at','deleted_at'])
            ->draw();
    }
    public function show($id){
        $r = (new SiswaModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
}
public function store(){
    $pm = new SiswaModel();

    $id = $pm->insert([
        'nisn' =>$this->request->getVar('nisn'),
        'nis' =>$this->request->getVar('nis'),
        'status_masuk' =>$this->request->getVar('status_masuk'),
        'thn_masuk' =>$this->request->getVar('thn_masuk'),
        'nama_depan' =>$this->request->getVar('nama_depan'),
        'nama_belakang' =>$this->request->getVar('nama_belakang'),
        'nik' =>$this->request->getVar('nik'),
        'no_kk' =>$this->request->getVar('no_kk'),
        'gender' =>$this->request->getVar('gender'),
        'tgl_lahir' =>$this->request->getVar('tgl_lahir'),
        'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
        'alamat' =>$this->request->getVar('alamat'),
        'kota' =>$this->request->getVar('kota'),
        'skr_kelas_id' =>$this->request->getVar('skr_kelas_id'),
        'no_telp_rumah' =>$this->request->getVar('no_telp_rumah'),
        'no_hp_ibu' =>$this->request->getVar('no_hp_ibu'),
        'no_hp_ayah' =>$this->request->getVar('no_hp_ayah'),
        'nm_ayah' =>$this->request->getVar('nm_ayah'),
        'nm_ibu' =>$this->request->getVar('nm_ibu'),
        'nm_wali' =>$this->request->getVar('nm_wali'),
        'foto' =>$this->request->getVar('foto'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new SiswaModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'nisn' =>$this->request->getVar('nisn'),
        'nis' =>$this->request->getVar('nis'),
        'status_masuk' =>$this->request->getVar('status_masuk'),
        'thn_masuk' =>$this->request->getVar('thn_masuk'),
        'nama_depan' =>$this->request->getVar('nama_depan'),
        'nama_belakang' =>$this->request->getVar('nama_belakang'),
        'nik' =>$this->request->getVar('nik'),
        'no_kk' =>$this->request->getVar('no_kk'),
        'gender' =>$this->request->getVar('gender'),
        'tgl_lahir' =>$this->request->getVar('tgl_lahir'),
        'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
        'alamat' =>$this->request->getVar('alamat'),
        'kota' =>$this->request->getVar('kota'),
        'skr_kelas_id' =>$this->request->getVar('skr_kelas_id'),
        'no_telp_rumah' =>$this->request->getVar('no_telp_rumah'),
        'no_hp_ibu' =>$this->request->getVar('no_hp_ibu'),
        'no_hp_ayah' =>$this->request->getVar('no_hp_ayah'),
        'nm_ayah' =>$this->request->getVar('nm_ayah'),
        'nm_ibu' =>$this->request->getVar('nm_ibu'),
        'nm_wali' =>$this->request->getVar('nm_wali'),
        'foto' =>$this->request->getVar('foto'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new SiswaModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}