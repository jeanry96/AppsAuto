<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB,Hash};
use Illuminate\Support\Str;
use App\Models\User;

class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            0=>array('name'=> 'Lili Chiandra Hasan',    'email'=> 'cs@banksar.co.id',       'role'=> 'CS',                          'password'=> 'cs12345'),
            1=>array('name'=> 'Dewi Evi Susanti',       'email'=> 'akunting@banksar.co.id', 'role'=> 'Akunting',                    'password'=> 'akunting123'),
            2=>array('name'=> 'Jeanry Renhart',         'email'=> 'it@banksar.co.id',       'role'=> 'Administrator',               'password'=> 'jr123'),
            3=>array('name'=> 'Agha Shandi',            'email'=> 'ao@banksar.co.id',       'role'=> 'AO',                          'password'=> 'ao123'),
            4=>array('name'=> 'Fransiscus Hendra',      'email'=> 'dirut@banksar.co.id',    'role'=> 'Dirut',                       'password'=> 'dirut123'),
            5=>array('name'=> 'Lira',                   'email'=> 'dirop@banksar.co.id',    'role'=> 'Dirop',                       'password'=> 'dirop123'),
            6=>array('name'=> 'Employee7',              'email'=> 'employee7@gmail.com',    'role'=> 'Guest',                       'password'=> 'employee7'),
            7=>array('name'=> 'Employee8',              'email'=> 'employee8@gmail.com',    'role'=> 'User',                        'password'=> 'employee8'),
            8=>array('name'=> 'Employee9',              'email'=> 'employee9@gmail.com',    'role'=> 'User',                        'password'=> 'employee9'),
            9=>array('name'=> 'Employee10',             'email'=> 'employee10@gmail.com',   'role'=> 'Guest',                       'password'=> 'employee10'),

        );

        for($i=0; $i<count($data); $i++)
        {
            $name = $data[$i]['name'];
            $email = $data[$i]['email'];
            $role = $data[$i]['role'];
            $password = $data[$i]['password'];

            DB::table('users')->insert([
                'name'  => $name,
                'email' => $email,
                'role'  => $role,
                'password'  =>Hash::make($password)
            ]);
        }
        //User::factory()->count(100)->create();
        
    }
}

// $data_pengelola = array(
//     0=> array('kode_pengelola'    =>  'SCPR','account'  => '0045040101','keterangan'    => 'Autodebet Service Charge Perhimpunan Penghuni Ruma Susun'),
//     1=> array('kode_pengelola'    =>  'LSPR','account'  => '0045040101','keterangan'    => 'Autodebet Listrik Perhimpunan Penghuni Ruma Susun'),
//     2=> array('kode_pengelola'    =>  'SCMM','account'  => '0032740101','keterangan'    => 'Autodebet Service Charge Sarana Metro Mandiri'),
//     3=> array('kode_pengelola'    =>  'LSMM','account'  => '0032740101','keterangan'    => 'Autodebet Listrik Sarana Metro Mandiri'),
//     4=> array('kode_pengelola'    =>  'SCST','account'  => '0081140301','keterangan'    => 'Autodebet Service Charge Surya Tanah Abang Jaya'),
//     5=> array('kode_pengelola'    =>  'LSST','account'  => '0081140301','keterangan'    => 'Autodebet Listrik Surya Tanah Abang Jaya'),
//     6=> array('kode_pengelola'    =>  'TPMI','account'  => '0402540101','keterangan'    => 'Autodebet Telpon Metrocom Indonesia'),
// );

// for($i = 0; $i < count($data_pengelola); $i++)
// {
//     // $id = $data_pengelola[$i]['id'];
//     $kode = $data_pengelola[$i]['kode_pengelola'];
//     $acc  = $data_pengelola[$i]['account'];
//     $ket  = $data_pengelola[$i]['keterangan'];

//     \App\Models\TblPengelola::insert([
//         'kode_pengelola'    =>  $kode,
//         'account'           => $acc,
//         'keterangan'        =>  $ket,
//     ]);
// }