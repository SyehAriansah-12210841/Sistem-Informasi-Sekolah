<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class KehadiranGuruTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','kehadiranguru',[
			'waktu_masuk' => '2021-09-17 06:30:00',
			'waktu_keluar' => '2021-09-17 06:30:00',
			'pertemuan' => 1,
            'pegawai_id' => 1,
            'jadwal_id' => 1,
            'berita_acara' => 'mendidik siswa',
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "kehadiranguru/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'kehadiranguru', [
			'waktu_masuk' => '2021-09-17 06:30:00',
			'waktu_keluar' => '2021-09-17 06:30:00',
			'pertemuan' => 1,
            'pegawai_id' => 1,
            'jadwal_id' => 1,
            'berita_acara' => 'mendidik siswa',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'kehadiranguru', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'kehadiranguru/all')
			->assertStatus(200);
	}

}