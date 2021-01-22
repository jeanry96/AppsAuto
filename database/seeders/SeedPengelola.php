<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeedPengelola extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_pengelola = array(
            0=> array('kode_pengelola'    =>  'SCPR','account'  => '0045040101','keterangan'    => 'Autodebet Service Charge Perhimpunan Penghuni Ruma Susun'),
            1=> array('kode_pengelola'    =>  'LSPR','account'  => '0045040101','keterangan'    => 'Autodebet Listrik Perhimpunan Penghuni Ruma Susun'),
            2=> array('kode_pengelola'    =>  'SCMM','account'  => '0032740101','keterangan'    => 'Autodebet Service Charge Sarana Metro Mandiri'),
            3=> array('kode_pengelola'    =>  'LSMM','account'  => '0032740101','keterangan'    => 'Autodebet Listrik Sarana Metro Mandiri'),
            4=> array('kode_pengelola'    =>  'SCST','account'  => '0081140301','keterangan'    => 'Autodebet Service Charge Surya Tanah Abang Jaya'),
            5=> array('kode_pengelola'    =>  'LSST','account'  => '0081140301','keterangan'    => 'Autodebet Listrik Surya Tanah Abang Jaya'),
            6=> array('kode_pengelola'    =>  'TPMI','account'  => '0402540101','keterangan'    => 'Autodebet Telpon Metrocom Indonesia'),
        );

        for($i = 0; $i < count($data_pengelola); $i++)
        {
            // $id = $data_pengelola[$i]['id'];
            $kode = $data_pengelola[$i]['kode_pengelola'];
            $acc  = $data_pengelola[$i]['account'];
            $ket  = $data_pengelola[$i]['keterangan'];

            \App\Models\TblPengelola::insert([
                'kode_pengelola'    =>  $kode,
                'account'           => $acc,
                'keterangan'        =>  $ket,
            ]);
        }
    }
}
