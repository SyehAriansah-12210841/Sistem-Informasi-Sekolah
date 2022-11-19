<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class JadwalTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','jadwal',[
			'hari' => 1,
			'kelas_id' => 3,
			'mapel_id' => 1,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '09:00:00',
            'pegawai_id' => 1
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "jadwal/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'jadwal', [
			'hari' => 1,
			'kelas_id' => 3,
			'mapel_id' => 1,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '09:00:00',
            'pegawai_id' => 1,
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'jadwal', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'jadwal/all')
			->assertStatus(200);
	}

}