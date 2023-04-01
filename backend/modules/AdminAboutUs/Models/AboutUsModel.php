<?php

/**
 * About Us - Intro Model
 */

namespace Modules\AdminAboutUs\Models;

class AboutUsModel extends \CodeIgniter\Model
{
    protected $table = 'p_aboutus_intro';
    protected $primaryKey = 'id';
    protected $allowedFields = ['banner', 'title', 'title_sc', 'title_en', 'introduction', 'introduction_sc', 'introduction_en',
                                'description', 'description_sc', 'description_en', 'obp_details', 'obp_details_sc', 'obp_details_en',
                                'os_details', 'os_details_sc', 'os_details_en',
                                'updatedBy', 'dateUpdated'];
}
