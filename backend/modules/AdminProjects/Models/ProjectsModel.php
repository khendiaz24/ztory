<?php

/**
 * Projects Model
 */

namespace Modules\AdminProjects\Models;

class ProjectsModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['banner', 'title', 'title_sc', 'title_en', 'description', 'description_sc', 'description_en',
                                'client', 'client_sc', 'client_en', 'category_id', 'intro_image',
                                'intro_details', 'intro_details_sc', 'intro_details_en', 'lm_image', 'lm_title', 'lm_title_sc', 
                                'lm_title_en', 'lm_short_details', 'lm_short_details_sc', 'lm_short_details_en', 'lm_full_details', 
                                'lm_full_details_sc', 'lm_full_details_en', 'ba_details', 
                                'ba_details_sc', 'ba_details_en', 'credits_director', 'credits_designer', 'credits_copywriter',
                                'credits_animator', 'credits_photographer', 'md_title', 'md_title_sc', 'md_title_en', 'md_details', 
                                'md_details_sc', 'md_details_en', 'to_bv_details', 'to_bv_details_sc', 'to_bv_details_en', 
                                'tt_events_description', 'tt_events_description_sc', 
                                'tt_events_description_en', 'template', 'status', 'url', 'wwd', 'wwd_sc', 'wwd_en',
                                'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
