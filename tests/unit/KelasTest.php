<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class KelasTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','kelas',[
			'tingkat' => '12',
			'kelas' => 'D',
			'pegawai_id' => '1',
            'tahun_ajaran_id' => '1'
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "kelas/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'kelas', [
			'tingkat' => '12',
			'kelas' => 'D',
			'pegawai_id' => '1',
            'tahun_ajaran_id' => '1',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'kelas', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'kelas/all')
			->assertStatus(200);
	}

}