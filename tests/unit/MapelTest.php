<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class MapelTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','mapel',[
			'mapel' => 'bahasa inggris',
			'kelompok' => 'B',
			'keterangan' => 'bagus',
            'tingkat' => 2,
            'kkm' => 35
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "mapel/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'mapel', [
			'mapel' => 'bahasa inggris',
			'kelompok' => 'B',
			'keterangan' => 'bagus',
            'tingkat' => 2,
            'kkm' => 35,
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'mapel', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'mapel/all')
			->assertStatus(200);
	}

}