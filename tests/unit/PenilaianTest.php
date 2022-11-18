<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class PenilaianTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','penilaian',[
			'mapel_id' => 1,
			'siswa_id' => 1,
			'total_nilai' => 80,
            'deskripsi_nilai' => 'bagus'
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "penilaian/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'penilaian', [
            'mapel_id' => 1,
			'siswa_id' => 1,
			'total_nilai' => 80,
            'deskripsi_nilai' => 'bagus',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'penilaian', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'penilaian/all')
			->assertStatus(200);
	}

}