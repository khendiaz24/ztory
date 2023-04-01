<?php

/**
 * About Us - Our Concept Model
 */

namespace Modules\AdminAboutUs\Models;

class AboutUsOCModel extends \CodeIgniter\Model
{
    protected $table = 'p_aboutus_oc';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'title_sc', 'title_en', 'details', 'details_sc', 'details_en',
                                'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
