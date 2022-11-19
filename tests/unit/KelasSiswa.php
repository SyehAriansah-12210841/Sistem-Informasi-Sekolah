<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class KelasSiswaTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','kelassiswa',[
			'kelas_id' => 1,
			'siswa_id' => 1
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "kelassiswa/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'kelassiswa', [
			'kelas_id' => 1,
			'siswa_id' => 1,
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'kelassiswa', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'kelassiswa/all')
			->assertStatus(200);
	}

}