<?php namespace App\Models;

use CodeIgniter\Model;

class PersonalRecordModel extends Model
{
    protected $table = 'personal_record';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['competitor_id', 'movement_id', 'value', 'date'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}