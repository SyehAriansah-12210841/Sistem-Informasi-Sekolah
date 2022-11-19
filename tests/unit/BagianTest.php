<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class BagianTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','bagian',[
			'nama' => 'TU',
			'fungsi' => 'guru',
			'tugas_pokok' => 'guru'	
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "bagian/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'bagian', [
			'nama' => 'TU',
			'fungsi' => 'guru',
			'tugas_pokok' => 'guru',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'bagian', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'bagian/all')
			->assertStatus(200);
	}

}