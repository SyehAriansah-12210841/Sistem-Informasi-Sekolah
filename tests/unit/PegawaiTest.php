<?php  

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
* @internal
*/
class PegawaiTest extends CIUnitTestCase{

	use FeatureTestTrait;

	public function testLogin(){
        $this->call('post', 'login',[
            'email' => 'fatimahsoim@gmail.com',
            'sandi' => '12345'
        ])->assertStatus(200);
    }

	public function testCreateShowUpdateDelete(){
		$json = $this->call('post','Pegawai',[
			'nip' => '6574',
			'nama_depan' => 'syeh',
			'nama_belakang' => 'ariansyah',
			'gelar_depan' => 'm.kom',
			'gelar_belakang' => 's.kom',
			'gender' => 'P',
			'no_telpon' =>'085738706898',
			'no_wa' => '086738917343',
			'email' => 'rian@gmail.com',
			'bagian_id' => 1,
			'alamat' => 'serdam',
			'kota' => 'serdam',
			'tgl_lahir' => '1996-12-13',
			'tempat_lahir' => 'serdam',
			'foto' => 'foto',
			'sandi' => '12345',
			'token_reset' => '213131232'		
		])->getJSON();
		$js = json_decode($json, true);

		$this->assertTrue($js['id'] > 0);
		
		$this->call('get', "Pegawai/".$js['id'])
			 ->assertStatus(200);

		$this->call('patch', 'Pegawai', [
			'nip' => '4675',
			'nama_depan' => 'syeh',
			'nama_belakang' => 'ariansyah',
			'gelar_depan' => 'm.kom',
			'gelar_belakang' => 's.kom',
			'gender' => 'P',
			'no_telpon' =>'085738706898',
			'no_wa' => '086738917343',
			'email' => 'rian@gmail.com',
			'bagian_id' => 1,
			'alamat' => 'serdam',
			'kota' => 'serdam',
			'tgl_lahir' => '1996-12-13',
			'tempat_lahir' => 'serdam',
			'foto' => 'foto',
			'sandi' => '12345',
			'token_reset' => '213131232',
			'id' => $js['id']
		])->assertStatus(200);	 

		$this->call('delete', 'Pegawai', [
			'id' => $js['id']
		])->assertStatus(200);
	}

	public function testRead()
	{
		$this->call('get', 'Pegawai/all')
			->assertStatus(200);
	}

	public function testLogout(){
        $this->call('delete', 'login')->assertStatus(302);
    }

}