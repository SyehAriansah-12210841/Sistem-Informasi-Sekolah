<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class TahunAjarTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','tahun',[
			'tahun_ajaran' => '2021\2022',
			'tgl_mulai' => '2022-01-01',
			'tgl_selesai' => '2022-01-02',
            'status_aktif' => 'T'
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "tahun/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'tahun', [
			'tahun_ajaran' => '2021\2022',
			'tgl_mulai' => '2022-01-01',
			'tgl_selesai' => '2022-01-02',
            'status_aktif' => 'T',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'tahun', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'tahun/all')
			->assertStatus(200);
	}

}