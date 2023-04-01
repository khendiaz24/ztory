<?php

/**
 * About Us - Our Branding Blueprint Model
 */

namespace Modules\AdminAboutUs\Models;

class AboutUsOBBModel extends \CodeIgniter\Model
{
    protected $table = 'p_aboutus_obb';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image', 'label', 'label_sc', 'label_en', 'sequence',
                                'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
