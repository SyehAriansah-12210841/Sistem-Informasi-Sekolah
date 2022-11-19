<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class RincianPenilaianTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','rincianpenilaian',[
			'penilaian_id' => 1,
			'nama_nilai' => 'IPA',
			'nilai_angka' => 34,
            'nilai_deskripsi' => 'bagus'	
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "rincianpenilaian/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'rincianpenilaian', [
			'penilaian_id' => 1,
			'nama_nilai' => 'IPA',
			'nilai_angka' => 34,
            'nilai_deskripsi' => 'bagus',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'rincianpenilaian', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'rincianpenilaian/all')
			->assertStatus(200);
	}

}