<?php

/**
 * Admin Projects Controller
 */

namespace Modules\AdminProjects\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminProjects\Models\ProjectsModel;
use \Modules\AdminProjects\Models\ProjectBAModel;
use \Modules\AdminProjects\Models\ProjectIntroModel;
use \Modules\AdminProjects\Models\ProjectLMModel;
use \Modules\AdminProjects\Models\ProjectMDModel;
use \Modules\AdminProjects\Models\ProjectTOBVModel;
use \Modules\AdminProjects\Models\ProjectTTEventsModel;
use \Modules\AdminProjects\Models\DataProjectCategoriesModel;
use \Modules\AdminProjects\Models\ProjectHeaderModel;

class Adminprojects extends \CodeIgniter\Controller
{
    protected $users;
    protected $systemConfiguration;

    function __construct()
    {
        $SystemConfigsModel = new SystemconfigsModel();
        $this->systemConfiguration = $SystemConfigsModel->first();

        $usersModel = new UsersModel();
        $this->user = $usersModel->where('id', session()->get('id'))->first();
    }

    public function index()
    {
        //Verify if there is logged in user! Else redirect to login
        if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

        $projectsModel = new ProjectsModel();
        $dataProjectCategoriesModel = new DataProjectCategoriesModel();
        $getAllProjectCatagoriesData = $dataProjectCategoriesModel->findAll();

        $projectHeaderModel = new ProjectHeaderModel();
        $getProjectHeaderData = $projectHeaderModel->first();
        
        if ($this->request->getMethod() == 'post')
        {
            if ($this->request->getPost('btnSubmit'))
            {
                $Banner = $this->request->getFile('txtIMGBanner');
                $TitleTC = $this->request->getPost('txtTitleTC');
                $TitleSC = $this->request->getPost('txtTitleSC');
                $TitleEN = $this->request->getPost('txtTitleEN');
                $DetailsTC = $this->request->getPost('txtDetailsTC');
                $DetailsSC = $this->request->getPost('txtDetailsSC');
                $DetailsEN = $this->request->getPost('txtDetailsEN');
                $ClientTC = $this->request->getPost('txtClientTC');
                $ClientSC = $this->request->getPost('txtClientSC');
                $ClientEN = $this->request->getPost('txtClientEN');
                $Category = $this->request->getPost('txtCategory');
                $Template = $this->request->getPost('txtTemplate');

                if ($Banner->getSize() > 0)
                {
                    $bannerImageName = custom_uploader($Banner, 'prjctbnnr', 'public/assets/uploads/projects', '');
                }

                $parameters = array(
                    'banner'            => $bannerImageName,
                    'title'             => $TitleTC,
                    'title_sc'          => $TitleSC,
                    'title_en'          => $TitleEN,
                    'description'       => $DetailsTC,
                    'description_sc'    => $DetailsSC,
                    'description_en'    => $DetailsEN,
                    'client'            => $ClientTC,
                    'client_sc'         => $ClientSC,
                    'client_en'         => $ClientEN,
                    'category_id'       => $Category,
                    'template'          => $Template,
                    'createdBy'         => session()->get('id'),
                    'dateCreated'       => time()
                );

                $qryInsert = $projectsModel->insert($parameters);
                if ($qryInsert)
                {
                    $URLFormat = formattingurl($TitleEN);
                    
                    $lastInsertedID = $projectsModel->where('banner', $bannerImageName)->first();
                    $update_url_parameter = array(
                        'url'   => $URLFormat.$lastInsertedID['id']
                    );

                    $qryUpdate = $projectsModel->update($lastInsertedID['id'], $update_url_parameter);
                    if ($qryUpdate) {
                        return redirect()->to(rtfldr().'/admin/projects/edit/'.$lastInsertedID['id']);
                    }
                }
            }

            if ($this->request->getPost('btnCSubmit'))
            {
                
                $NameTC = $this->request->getPost('txtCNameTC');
                $NameSC = $this->request->getPost('txtCNameSC');
                $NameEN = $this->request->getPost('txtCNameEN');
                $ID = $this->request->getPost('txtCID');
                $Process = $this->request->getPost('txtCProcess');

                if ($Process == "add") 
                {
                    $parameters = array(
                        'name'          => $NameTC,
                        'name_sc'       => $NameSC,
                        'name_en'       => $NameEN,
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $dataProjectCategoriesModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/projects');
                    }
                } else if ($Process == "edit") {
                    $parameters = array(
                        'name'          => $NameTC,
                        'name_sc'       => $NameSC,
                        'name_en'       => $NameEN,
                        'updatedBy'     => session()->get('id')
                    );

                    $qryUpdate = $dataProjectCategoriesModel->update($ID, $parameters);
                    if ($qryUpdate)
                    {
                        return redirect()->to(rtfldr().'/admin/projects');
                    }
                }
            }

            if ($this->request->getPost('btnBNSubmit'))
            {
                $TitleTC = $this->request->getPost('txtBNTitleTC');
                $TitleSC = $this->request->getPost('txtBNTitleSC');
                $TitleEN = $this->request->getPost('txtBNTitleEN');

                $parameters = array(
                    'title'     => $TitleTC,
                    'title_sc'  => $TitleSC,
                    'title_en'  => $TitleEN
                );

                $qryUpdate = $projectHeaderModel->update('1', $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects');
                }
            }
        }

        $data['pageTitle'] = "Projects";
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['account'] = $this->user;
        // Data
        $data['getAllProjectCatagoriesData'] = $getAllProjectCatagoriesData;
        $data['getProjectHeaderData'] = $getProjectHeaderData;

        return view('Modules\AdminProjects\Views\index', $data);
    }

    public function edit($id)
    {
        //Verify if there is logged in user! Else redirect to login
        if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

        $projectsModel = new ProjectsModel();
        $getProjectData = $projectsModel->where('id', $id)->first();

        $projectIntroModel = new ProjectIntroModel();
        $pojectLMModel = new ProjectLMModel();
        $projectBAModel = new ProjectBAModel();
        $projectMDModel = new ProjectMDModel();
        $projectTOBVModel = new ProjectTOBVModel();
        $projectTTEventsModel = new ProjectTTEventsModel();
        $dataProjectCategoriesModel = new DataProjectCategoriesModel();
        $getAllProjectCatagoriesData = $dataProjectCategoriesModel->findAll();

        $defaultImage = base_url('public/themes/global/images/default_image.jpg');

        if ($this->request->getMethod() == 'post')
        {
            if ($this->request->getPost('btnHSubmit'))
            {
                $Banner = $this->request->getFile('txtHBanner');
                $OLDBanner = $this->request->getPost('txtOLDHBanner');
                $TitleTC = $this->request->getPost('txtHTitleTC');
                $TitleSC = $this->request->getPost('txtHTitleSC');
                $TitleEN = $this->request->getPost('txtHTitleEN');
                $DetailsTC = $this->request->getPost('txtHDetailsTC');
                $DetailsSC = $this->request->getPost('txtHDetailsSC');
                $DetailsEN = $this->request->getPost('txtHDetailsEN');
                $ClientTC = $this->request->getPost('txtHClientTC');
                $ClientSC = $this->request->getPost('txtHClientSC');
                $ClientEN = $this->request->getPost('txtHClientEN');
                $WWDTC = $this->request->getPost('txtHWWDTC');
                $WWDSC = $this->request->getPost('txtHWWDSC');
                $WWDEN = $this->request->getPost('txtHWWDEN');
                $Category = $this->request->getPost('txtHCategory');
                $Status = $this->request->getPost('txtHStatus');

                $bannerImageName = $OLDBanner;
                if ($Banner->getSize() > 0)
                {
                    $bannerImageName = custom_uploader($Banner, 'prjctbnnr', 'public/assets/uploads/projects', $OLDBanner);
                }

                $parameters = array(
                    'banner'            => $bannerImageName,
                    'title'             => $TitleTC,
                    'title_sc'          => $TitleSC,
                    'title_en'          => $TitleEN,
                    'description'       => $DetailsTC,
                    'description_sc'    => $DetailsSC,
                    'description_en'    => $DetailsEN,
                    'client'            => $ClientTC,
                    'client_sc'         => $ClientSC,
                    'client_en'         => $ClientEN,
                    'wwd'               => $WWDTC,
                    'wwd_sc'            => $WWDSC,
                    'wwd_en'            => $WWDEN,
                    'category_id'       => $Category,
                    'status'            => $Status,
                    'updatedBy'         => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnISubmit'))
            {
                $IntroBanner = $this->request->getFile('txtIBanner');
                $OLDIntroBanner = $this->request->getPost('txtOLDIBanner');
                $DetailsTC = $this->request->getPost('txtIDetailsTC');
                $DetailsSC = $this->request->getPost('txtIDetailsSC');
                $DetailsEN = $this->request->getPost('txtIDetailsEN');

                $introBannerImageName = $OLDIntroBanner;
                if ($IntroBanner->getSize() > 0)
                {
                    $introBannerImageName = custom_uploader($IntroBanner, 'prjctntrbnnr', 'public/assets/uploads/projects', $OLDIntroBanner);
                }

                $parameters = array(
                    'intro_image'       => $introBannerImageName,
                    'intro_details'     => $DetailsTC,
                    'intro_details_sc'  => $DetailsSC,
                    'intro_details_en'  => $DetailsEN,
                    'updatedBy'         => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnIImageSubmit'))
            {
                $Images = $this->request->getFiles('txtIImage');
                
                $UploadedImages = array();
                for ($i = 0; $i < count($Images['txtIImage']); $i++)
                {   
                    $UploadedImages[] = custom_uploader($Images['txtIImage'][$i], 'prjctintroimage_'.$i.'_', 'public/assets/uploads/projects', '');
                }
                
                foreach ($UploadedImages as $key => $value)
                {
                    $parameters = array(
                        'project_id'    => $id,
                        'image'         => $value,
                        'sequence'      => custom_increament_order($projectIntroModel, 'project_id', $id),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $projectIntroModel->insert($parameters);
                }
                
                return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
            }

            if ($this->request->getPost('btnLMSubmit'))
            {
                $Image = $this->request->getFile('txtLMImage');
                $OLDImage = $this->request->getPost('txtOLDLMImage');
                $HeaderTC = $this->request->getPost('txtLMTitleTC');
                $HeaderSC = $this->request->getPost('txtLMTitleSC');
                $HeaderEN = $this->request->getPost('txtLMTitleEN');
                $ShortDetailsTC = $this->request->getPost('txtLMShortDetailsTC');
                $ShortDetailsSC = $this->request->getPost('txtLMShortDetailsSC');
                $ShortDetailsEN = $this->request->getPost('txtLMShortDetailsEN');
                $DetailsTC = $this->request->getPost('txtLMDetailsTC');
                $DetailsSC = $this->request->getPost('txtLMDetailsSC');
                $DetailsEN = $this->request->getPost('txtLMDetailsEN');

                $learnMoreImageName = $OLDImage;
                if ($Image->getSize() > 0)
                {
                    $learnMoreImageName = custom_uploader($Image, 'prjctlrnmrimage', 'public/assets/uploads/projects', $OLDImage);
                }

                $parameters = array(
                    'lm_image'              => $learnMoreImageName,
                    'lm_title'              => $HeaderTC,
                    'lm_title_sc'           => $HeaderSC,
                    'lm_title_en'           => $HeaderEN,
                    'lm_short_details'      => $ShortDetailsTC,
                    'lm_short_details_sc'   => $ShortDetailsSC,
                    'lm_short_details_en'   => $ShortDetailsEN,
                    'lm_full_details'       => $DetailsTC,
                    'lm_full_details_sc'    => $DetailsSC,
                    'lm_full_details_en'    => $DetailsEN,
                    'updatedBy'             => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnLMImageSubmit'))
            {
                $Images = $this->request->getFiles('txtLMImages');
                
                $UploadedImages = array();
                for ($i = 0; $i < count($Images['txtLMImages']); $i++)
                {   
                    $UploadedImages[] = custom_uploader($Images['txtLMImages'][$i], 'prjctlrnmrimgs_'.$i.'_', 'public/assets/uploads/projects', '');
                }
                
                foreach ($UploadedImages as $key => $value)
                {
                    $parameters = array(
                        'project_id'    => $id,
                        'image'         => $value,
                        'sequence'      => custom_increament_order($pojectLMModel, 'project_id', $id),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $pojectLMModel->insert($parameters);
                }
                
                return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
            }

            if ($this->request->getPost('btnBASubmit'))
            {
                $DetailsTC = $this->request->getPost('txtBADetailsTC');
                $DetailsSC = $this->request->getPost('txtBADetailsSC');
                $DetailsEN = $this->request->getPost('txtBADetailsEN');

                $parameters = array(
                    'ba_details'    => $DetailsTC,
                    'ba_details_sc' => $DetailsSC,
                    'ba_details_en' => $DetailsEN,
                    'updatedBy'     => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnBAImageSubmit'))
            {
                $Images = $this->request->getFiles('txtBAImages');
                
                $UploadedImages = array();
                for ($i = 0; $i < count($Images['txtBAImages']); $i++)
                {   
                    $UploadedImages[] = custom_uploader($Images['txtBAImages'][$i], 'prjctbrndpprchimgs_'.$i.'_', 'public/assets/uploads/projects', '');
                }
                
                foreach ($UploadedImages as $key => $value)
                {
                    $parameters = array(
                        'project_id'    => $id,
                        'image'         => $value,
                        'sequence'      => custom_increament_order($projectBAModel, 'project_id', $id),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $projectBAModel->insert($parameters);
                }
                
                return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
            }

            if ($this->request->getPost('btnBVSubmit'))
            {
                $DetailsTC = $this->request->getPost('txtBVDetailsTC');
                $DetailsSC = $this->request->getPost('txtBVDetailsSC');
                $DetailsEN = $this->request->getPost('txtBVDetailsEN');

                $parameters = array(
                    'to_bv_details'     => $DetailsTC,
                    'to_bv_details_sc'  => $DetailsSC,
                    'to_bv_details_en'  => $DetailsEN,
                    'updatedBy'         => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnBVImageSubmit'))
            {
                $Images = $this->request->getFiles('txtBVImages');
                
                $UploadedImages = array();
                for ($i = 0; $i < count($Images['txtBVImages']); $i++)
                {   
                    $UploadedImages[] = custom_uploader($Images['txtBVImages'][$i], 'prjctbrndvlmimgs_'.$i.'_', 'public/assets/uploads/projects', '');
                }
                
                foreach ($UploadedImages as $key => $value)
                {
                    $parameters = array(
                        'project_id'    => $id,
                        'image'         => $value,
                        'sequence'      => custom_increament_order($projectTOBVModel, 'project_id', $id),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $projectTOBVModel->insert($parameters);
                }
                
                return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
            }

            if ($this->request->getPost('btnMDSubmit'))
            {
                $HeaderTC = $this->request->getPost('txtMDTitleTC');
                $HeaderSC = $this->request->getPost('txtMDTitleSC');
                $HeaderEN = $this->request->getPost('txtMDTitleEN');
                $DetailsTC = $this->request->getPost('txtMDDetailsTC');
                $DetailsSC = $this->request->getPost('txtMDDetailsSC');
                $DetailsEN = $this->request->getPost('txtMDDetailsEN');

                $parameters = array(
                    'md_title'      => $HeaderTC,
                    'md_title_sc'   => $HeaderSC,
                    'md_title_en'   => $HeaderEN,
                    'md_details'    => $DetailsTC,
                    'md_details_sc' => $DetailsSC,
                    'md_details_en' => $DetailsEN,
                    'updatedBy'     => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnMDImages'))
            {
                $Type = $this->request->getPost('txtMDImageType');
                $FWImage1 = $this->request->getFile('txtMDFWImage');
                $LImage2 = $this->request->getFile('txtMDLImage2');
                $RImage2 = $this->request->getFile('txtMDRImage2');
                $LImage3 = $this->request->getFile('txtMDLImage3');
                $RTImage3 = $this->request->getFile('txtMDRTImage3');
                $LBImage3 = $this->request->getFile('txtMDRBImage3');

                if ($Type == "1") {
                    if ($FWImage1->getSize() > 0)
                    {
                        $fullWidthImage1 = custom_uploader($FWImage1, 'prjctmrdtlfllwdthimg', 'public/assets/uploads/projects', '');
                    }

                    $parameters = array(
                        'project_id'        => $id,
                        'full_width_image'  => $fullWidthImage1,
                        'type'              => $Type,
                        'sequence'          => custom_increament_order($projectMDModel, 'project_id', $id),
                        'createdBy'         => session()->get('id'),
                        'dateCreated'       => time()
                    );

                    $qryInsert = $projectMDModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                    }
                } else if ($Type == "2") {
                    if ($LImage2->getSize() > 0)
                    {
                        $leftImage2 = custom_uploader($LImage2, 'prjctmrdtllft2img', 'public/assets/uploads/projects', '');
                    }
                    if ($RImage2->getSize() > 0)
                    {
                        $rightImage2 = custom_uploader($RImage2, 'prjctmrdtlrght2img', 'public/assets/uploads/projects', '');
                    }

                    $parameters = array(
                        'project_id'        => $id,
                        'left_image_2'      => $leftImage2,
                        'right_image_2'     => $rightImage2,
                        'type'              => $Type,
                        'sequence'          => custom_increament_order($projectMDModel, 'project_id', $id),
                        'createdBy'         => session()->get('id'),
                        'dateCreated'       => time()
                    );

                    $qryInsert = $projectMDModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                    }
                } else if ($Type == "3") {
                    if ($LImage3->getSize() > 0)
                    {
                        $leftImage3 = custom_uploader($LImage3, 'prjctmrdtllft3img', 'public/assets/uploads/projects', '');
                    }
                    if ($RTImage3->getSize() > 0)
                    {
                        $rightTopImage3 = custom_uploader($RTImage3, 'prjctmrdtlrghttp3img', 'public/assets/uploads/projects', '');
                    }
                    if ($LBImage3->getSize() > 0)
                    {
                        $rightBottomImage3 = custom_uploader($LBImage3, 'prjctmrdtlrghtbttm3img', 'public/assets/uploads/projects', '');
                    }

                    $parameters = array(
                        'project_id'            => $id,
                        'left_image_3'          => $leftImage3,
                        'right_top_image_3'     => $rightTopImage3,
                        'right_bottom_image_3'  => $rightBottomImage3,
                        'type'                  => $Type,
                        'sequence'              => custom_increament_order($projectMDModel, 'project_id', $id),
                        'createdBy'             => session()->get('id'),
                        'dateCreated'           => time()
                    );

                    $qryInsert = $projectMDModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                    }
                }
            }

            if ($this->request->getPost('btnEventSubmit'))
            {
                $DetailsTC = $this->request->getPost('txtEventDetailsTC');
                $DetailsSC = $this->request->getPost('txtEventDetailsSC');
                $DetailsEN = $this->request->getPost('txtEventDetailsEN');

                $parameters = array(
                    'tt_events_description'     => $DetailsTC,
                    'tt_events_description_sc'  => $DetailsSC,
                    'tt_events_description_en'  => $DetailsEN,
                    'updatedBy'                 => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }

            if ($this->request->getPost('btnEventImageSubmit'))
            {
                $Images = $this->request->getFiles('txtEventImages');
                
                $UploadedImages = array();
                for ($i = 0; $i < count($Images['txtEventImages']); $i++)
                {   
                    $UploadedImages[] = custom_uploader($Images['txtEventImages'][$i], 'prjcteventimgs_'.$i.'_', 'public/assets/uploads/projects', '');
                }
                
                foreach ($UploadedImages as $key => $value)
                {
                    $parameters = array(
                        'project_id'    => $id,
                        'image'         => $value,
                        'sequence'      => custom_increament_order($projectTTEventsModel, 'project_id', $id),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $projectTTEventsModel->insert($parameters);
                }
                
                return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
            }

            if ($this->request->getPost('btnCreditsSubmit'))
            {
                $CreativeDirector = $this->request->getPost('txtCCreativeDirector');
                $Designer = $this->request->getPost('txtCDesigner');
                $Copywriter = $this->request->getPost('txtCCopywriter');
                $Animator = $this->request->getPost('txtCAnimator');
                $Photographer = $this->request->getPost('txtCPhotographer');

                $parameters = array(
                    'credits_director'      => $CreativeDirector,
                    'credits_designer'      => $Designer,
                    'credits_copywriter'    => $Copywriter,
                    'credits_animator'      => $Animator,
                    'credits_photographer'  => $Photographer,
                    'updatedBy'             => session()->get('id')
                );

                $qryUpdate = $projectsModel->update($getProjectData['id'], $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/projects/edit/'.$getProjectData['id']);
                }
            }
        }

        $data['pageTitle'] = "Projects - Edit";
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['account'] = $this->user;
        // Data
        $data['defaultImage'] = $defaultImage;
        $data['getProjectData'] = $getProjectData;
        $data['getAllProjectCatagoriesData'] = $getAllProjectCatagoriesData; 

        return view('Modules\AdminProjects\Views\edit', $data);
    }

    /**
     * DataTables AJAX Request
     */
    function get_all()
    {
        $pageModel = new ProjectsModel();
        $dataLists = $pageModel->where('status !=', '2')->findAll();

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'id'        => $ctr,
                    'banner'    => custom_table_image('public/assets/uploads/projects/'.$row['banner'], '100px'),
                    'title'     => $row['title_en'],
                    'client'    => $row['client_en'],
                    'status'    => project_status($row['status']),
                    'actions'   => custom_table_buttons('projects/edit', '', $row['id'], 2)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_categories()
    {
        $pageModel = new DataProjectCategoriesModel();
        $dataLists = $pageModel->findAll();

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $delete_button = 'delete_cat_by_id';

                $dataTables[] = array(
                    'id'        => $ctr,
                    'nametc'    => $row['name'],
                    'namesc'    => $row['name_sc'],
                    'nameen'    => $row['name_en'],
                    'actions'   => custom_table_buttons('get_cat_by_id', '', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_intro_images($id)
    {
        $pageModel = new ProjectIntroModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'image'     => custom_table_image('public/assets/uploads/projects/'.$row['image'], '100px'),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_intro_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_intro_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_learnmore_images($id)
    {
        $pageModel = new ProjectLMModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'image'     => custom_table_image('public/assets/uploads/projects/'.$row['image'], '100px'),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_learnmore_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_learnmore_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_baimages_images($id)
    {
        $pageModel = new ProjectBAModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'image'     => custom_table_image('public/assets/uploads/projects/'.$row['image'], '100px'),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_ba_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_ba_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_bvimages_images($id)
    {
        $pageModel = new ProjectTOBVModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'image'     => custom_table_image('public/assets/uploads/projects/'.$row['image'], '100px'),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_bv_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_bv_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_eventimage_images($id)
    {
        $pageModel = new ProjectTTEventsModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'image'     => custom_table_image('public/assets/uploads/projects/'.$row['image'], '100px'),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_event_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_event_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_mdimages_images($id)
    {
        $pageModel = new ProjectMDModel();
        $dataLists = $pageModel->where('project_id', $id)->orderBy('sequence')->findAll();

        $orderLists = array();
        foreach ($dataLists as $rowOrders)
        {
            $orderLists[] = $rowOrders['sequence'];
        }

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $ImageDisplay = "";
                if ($row['type'] == '1') {
                    $ImageDisplay = custom_table_image('public/assets/uploads/projects/'.$row['full_width_image'], '100px');
                } else if ($row['type'] == '2') {
                    $ImageDisplay = custom_table_image('public/assets/uploads/projects/'.$row['left_image_2'], '100px').' '.custom_table_image('public/assets/uploads/projects/'.$row['right_image_2'], '100px');
                } else if ($row['type'] == '3') {
                    $ImageDisplay = custom_table_image('public/assets/uploads/projects/'.$row['left_image_3'], '100px').' '.custom_table_image('public/assets/uploads/projects/'.$row['right_top_image_3'], '100px').' '.custom_table_image('public/assets/uploads/projects/'.$row['right_bottom_image_3'], '100px');
                }

                $dataTables[] = array(
                    'image'     => $ImageDisplay,
                    'type'      => project_md_image_types($row['type']),
                    'sequence'  => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'swtich_md_image_order', $id),
                    'actions'   => custom_table_buttons('', 'delete_md_image_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    /**
     * AJAX Processing Data
     */
    function get_project_category_by_id()
    {
        $ID = $this->request->getPost('id');
        $selectedModel = new DataProjectCategoriesModel();

        $data = $selectedModel->where('id', $ID)->first();

        echo $data['name']."*".$data['name_sc']."*".$data['name_en'];
    }

    function remove_intro_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectIntroModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_intro_image_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectIntroModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }

    function remove_learnmore_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectLMModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_learnmore_image_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectLMModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }

    function remove_ba_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectBAModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_ba_image_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectBAModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }

    function remove_bv_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectTOBVModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_bv_image_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectTOBVModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }

    function remove_md_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectMDModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_event_md_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectMDModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }

    function remove_event_image()
    {
        $ID = $this->request->getPost('id');
        $CurrentID = $this->request->getPost('current_id');
        $selectedModel = new ProjectTTEventsModel();

        $deleteQuery = $selectedModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $selectedModel->where('project_id', $CurrentID)->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $selectedModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_event_image_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');
        $CustomParam = $this->request->getPost('CustomParam');

        $pageContentModel = new ProjectTTEventsModel();
        $checkToSwitchPosition = $pageContentModel->where('project_id', $CustomParam)->where('sequence', $ToSwitchPosition)->first();

        $parameterToSwitch = array('sequence' => $ToSwitchPosition);
        $updateFeaturedOrder = $pageContentModel->update($DataID, $parameterToSwitch);
        if ($updateFeaturedOrder)
        {
            $parameterToSwitchSearch = array("sequence" => $CurrentPosition);
            $updateToSwitchOrder = $pageContentModel->update($checkToSwitchPosition['id'], $parameterToSwitchSearch);

            if ($updateToSwitchOrder)
            {
                echo "ok";
            }
        }
    }
}
