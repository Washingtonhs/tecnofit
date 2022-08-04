<?php namespace App\Models;

use CodeIgniter\Model;

class MovementModel extends Model
{
    protected $table = 'movement';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}