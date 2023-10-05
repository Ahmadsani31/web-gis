<?php

namespace App\Models;

use CodeIgniter\Model;

class MDrainase extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drainase';
    protected $primaryKey       = 'DrainaseID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['NamaDaerah', 'Kecamatan', 'Kelurahan', 'Keterangan', 'Kondisi', 'Konstruksi', 'Nama_Saluran', 'Panjang', 'PosisiSaluran', 'Tipe_Salur', 'X_Akhir', 'X_Awal', 'Y_Akhir', 'Y_Awal', 'Coordinates'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CreatedAT';
    protected $updatedField  = 'UpdatedAT';
    protected $deletedField  = 'DeletedAT';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}