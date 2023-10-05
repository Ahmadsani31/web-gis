<?php

namespace App\Controllers;

use App\Models\MDrainase;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    public $drain;
    public function __construct()
    {
        $this->drain = new MDrainase();
    }

    public function index(): string
    {
        $this->data['DA'] = $this->drain->findAll();
        return view('welcome_message', $this->data);
    }

    public function gis_extrak()
    {
        $json = file_get_contents('assets/geojson/DRAINASE_PERKOTAAN_KOTA_BUKITTINGGI.geojson');

        // Decode the JSON file
        $json_data = json_decode($json, true);

        // Display data
        $noSatu = 0;
        foreach ($json_data['features'] as $key => $value) {
            echo '<pre>';
            print_r($value);
            echo '</pre>';
            // $cordinat[] = $value['geometry']['coordinates'];
            $dataIsi[] = $value['properties'];
            $cordinat[] = $value;
            foreach ($value['geometry']['coordinates'] as $a1 => $a2) {

                foreach ($a2 as $b1 => $b2) {
                    # code...
                    $dCor1[$value['properties']['Name']][$noSatu][$a1][] = [
                        $b2[1],
                        $b2[0],
                    ];
                }
                # code...
            }
            $noSatu++;
        }


        foreach ($dataIsi as $isi1 => $isi2) {
            # code...
            $daInsert11[] = [
                'NamaDaerah' => $isi2['Name'],
                'Kecamatan' => $isi2['Kecamatan'],
                'Kelurahan' => $isi2['Kelurahan'],
                'Keterangan' => $isi2['Keterangan'],
                'Kondisi' => $isi2['Kondisi'],
                'Konstruksi' => $isi2['Konstruksi'],
                'Nama_Saluran' => $isi2['Nama_Saluran'],
                'Panjang' => $isi2['Panjang_'],
                'PosisiSaluran' => $isi2['Posisi Saluran'],
                'Tipe_Salur' => $isi2['Tipe_Salur'],
                'X_Akhir' => $isi2['X_Akhir'],
                'X_Awal' => $isi2['X_Awal'],
                'Y_Akhir' => $isi2['Y_Akhir'],
                'Y_Awal' => $isi2['Y_Awal'],
                'Coordinates' => json_encode($dCor1[$isi2['Name']][$isi1])
            ];
            // $dIsiNew[$isi2['Name']] = $isi2;

            // $dCor2[] = $dCor1[$isi2['Name']][$isi1];
        }




        // foreach ($dIsiNew as $nmDaerah => $isiDataDaerah) {
        //     # code...

        //     $dataBaru[] = [
        //         'data' => $isiDataDaerah,
        //         'coordinates' => $dCor1[$nmDaerah]
        //     ];
        // }

        // foreach ($dataBaru as $baru1 => $baru2) {
        //     $daInsert[] = [
        //         'NamaDaerah' => $baru2['data']['Name'],
        //         'Kecamatan' => $baru2['data']['Kecamatan'],
        //         'Kelurahan' => $baru2['data']['Kelurahan'],
        //         'Keterangan' => $baru2['data']['Keterangan'],
        //         'Kondisi' => $baru2['data']['Kondisi'],
        //         'Konstruksi' => $baru2['data']['Konstruksi'],
        //         'Nama_Saluran' => $baru2['data']['Nama_Saluran'],
        //         'Panjang' => $baru2['data']['Panjang_'],
        //         'PosisiSaluran' => $baru2['data']['Posisi Saluran'],
        //         'Tipe_Salur' => $baru2['data']['Tipe_Salur'],
        //         'X_Akhir' => $baru2['data']['X_Akhir'],
        //         'X_Awal' => $baru2['data']['X_Awal'],
        //         'Y_Akhir' => $baru2['data']['Y_Akhir'],
        //         'Y_Awal' => $baru2['data']['Y_Awal'],
        //         'Coordinates' => $baru2['coordinates']
        //     ];
        //     $dataCor[] =  $baru2['coordinates'];
        //     # code...
        // }

        // $this->drain->insertBatch($daInsert11);
        echo '<pre>';
        echo (print_r($dCor1));
        echo '</pre>';


        // foreach ($dataIsi as $isi1 => $isi2) {
        //     # code...
        //     $dIsiNew[] = [
        //         'data' => $isi2,
        //         'coordinates' => json_encode($dCor1[$isi1])
        //     ];
        // }

        // echo '<pre>';
        // echo print_r($cordinat);
        // echo '</pre>';
        // foreach ($cordinat as $key1 => $value1) {

        //     foreach ($value1 as $nK => $value2) {
        //         // echo '<pre>';
        //         // echo print_r($value2);
        //         // echo '</pre>';
        //         foreach ($value2 as $value3) {


        //             # code...

        //             $dCor[$key1][$nK][] = [
        //                 $value3[1],
        //                 $value3[0],
        //             ];
        //         }
        //     }

        // }

        // echo '<pre>';
        // echo (json_encode($dCor));
        // echo '</pre>';


    }

    public function gis_data()
    {
        $json = file_get_contents('assets/geojson/DRAINASE_PERKOTAAN_KOTA_BUKITTINGGI.geojson');

        // Decode the JSON file
        $json_data = json_decode($json, true);

        // Display data
        foreach ($json_data['features'] as $key => $value) {

            $cordinat[] = $value;
        }

        echo '<pre>';
        echo print_r($cordinat);
        echo '</pre>';
    }

    public  function getCoordinat()
    {
        $dCoor = [];
        $dCoor1 = [];
        $drainID = $this->request->getPost('idDrainAce');


        $sql = db_connect()->table('drainase');
        $sql->select('*');
        if (!empty($drainID)) {
            $sql->where('DrainaseID', $drainID);
        }

        foreach ($sql->get()->getResultArray() as $key => $value) {
            # code..
            if ($value['Kondisi'] == 'Baik') {
                $warna = 'blue';
            } elseif ($value['Kondisi'] == 'Dibawah Trotoar') {
                $warna = 'yellow';
            } elseif ($value['Kondisi'] == 'Parit Antang') {
                $warna = 'black';
            } else {
                $warna = 'red';
            }
            $dCoor[] = [
                'kondisi' => $value['Kondisi'],
                'warna' => $warna,
                'coordinat' => json_decode($value['Coordinates'])
            ];
        }


        // echo '<pre>';
        // echo print_r($dCoor);
        // echo '</pre>';

        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
        return  $this->respond($dCoor, 200);
    }
}
