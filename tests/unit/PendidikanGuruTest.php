<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class PendidikanGuruTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','pendidikanguru',[
			'pegawai_id' => '1',
			'jenjang' => 'S3',
			'jurusan' => 'Sistem Informasi',
            'asal_sekolah' => 'TKJ',
            'tahun_lulus' => '2020',
            'nilai_ijasah' => '80'
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "pendidikanguru/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'pendidikanguru', [
			'pegawai_id' => '1',
			'jenjang' => 'S3',
			'jurusan' => 'Sistem Informasi',
            'asal_sekolah' => 'TKJ',
            'tahun_lulus' => '2020',
            'nilai_ijasah' => '80',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'pendidikanguru', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'pendidikanguru/all')
			->assertStatus(200);
	}

}