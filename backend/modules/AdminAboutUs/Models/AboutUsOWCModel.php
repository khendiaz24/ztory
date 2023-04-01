<?php

/**
 * About Us - Our Wonderful Clients Model
 */

namespace Modules\AdminAboutUs\Models;

class AboutUsOWCModel extends \CodeIgniter\Model
{
    protected $table = 'p_aboutus_owc';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
