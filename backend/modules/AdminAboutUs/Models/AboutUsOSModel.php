<?php

/**
 * About Us - Our Services Model
 */

namespace Modules\AdminAboutUs\Models;

class AboutUsOSModel extends \CodeIgniter\Model
{
    protected $table = 'p_aboutus_os';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category', 'category_sc', 'category_en', 'details', 'details_sc', 'details_en',
                                'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
