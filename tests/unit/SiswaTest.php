<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class SiswaTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','siswa',[
			'nisn' => 1321312,
			'nis' => 32434,
			'status_masuk' => 'A',
            'thn_masuk' => '2025',
            'nama_depan' => 'udin',
            'nama_belakang' => 'petot',
            'nik' => 1321321213,
            'no_kk' => 255654,
            'gender' => 'P',
            'tgl_lahir' => '2001-12-13',
            'tempat_lahir' => 'Pontianak',
            'alamat' => 'rasau',
            'kota' => 'pontianak',
            'skr_kelas_id' => 1,
            'no_telp_rumah' => '082132121',
            'no_hp_ibu' => '08212332121',
            'no_hp_ayah' => '082132132221',
            'nm_ayah' => 'suandi',
            'nm_ibu' => 'siti',
            'nm_wali' => 'darson',
            'foto' => 'sadas'
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "siswa/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'siswa', [
			'nisn' => 1321312,
			'nis' => 32434,
			'status_masuk' => 'A',
            'thn_masuk' => '2025',
            'nama_depan' => 'udin',
            'nama_belakang' => 'petot',
            'nik' => 1321321213,
            'no_kk' => 255654,
            'gender' => 'P',
            'tgl_lahir' => '2001-12-13',
            'tempat_lahir' => 'Pontianak',
            'alamat' => 'rasau',
            'kota' => 'pontianak',
            'skr_kelas_id' => 1,
            'no_telp_rumah' => '082132121',
            'no_hp_ibu' => '08212332121',
            'no_hp_ayah' => '082132132221',
            'nm_ayah' => 'suandi',
            'nm_ibu' => 'siti',
            'nm_wali' => 'darson',
            'foto' => 'sadas',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'siswa', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'siswa/all')
			->assertStatus(200);
	}

}