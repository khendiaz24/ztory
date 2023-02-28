<?php

/**
 * Page Projects Controller
 */
namespace Modules\PageProjects\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminContactUs\Models\FooterContentModel;
use \Modules\AdminContactUs\Models\ContactUsModel;
use \Modules\AdminProjects\Models\ProjectsModel;
use \Modules\AdminProjects\Models\ProjectBAModel;
use \Modules\AdminProjects\Models\ProjectIntroModel;
use \Modules\AdminProjects\Models\ProjectLMModel;
use \Modules\AdminProjects\Models\ProjectMDModel;
use \Modules\AdminProjects\Models\ProjectTOBVModel;
use \Modules\AdminProjects\Models\ProjectTTEventsModel;
use \Modules\AdminProjects\Models\DataProjectCategoriesModel;
use \Modules\AdminProjects\Models\ProjectHeaderModel;

class Pageprojects extends \CodeIgniter\Controller
{
    protected $users;
    protected $systemConfiguration;
    protected $footerContent;
    protected $contactUsContent;

    function __construct()
    {
        $SystemConfigsModel = new SystemconfigsModel();
        $this->systemConfiguration = $SystemConfigsModel->first();

        $usersModel = new UsersModel();
        $this->user = $usersModel->where('id', session()->get('id'))->first();

        $footerContentModel = new FooterContentModel();
        $this->footerContent = $footerContentModel->first();

        $contactUsModel = new ContactUsModel();
        $this->contactUsContent = $contactUsModel->first();  
    }

    public function index()
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $dataProjectCategoriesMode = new DataProjectCategoriesModel();
        $getAllProjectCategories = $dataProjectCategoriesMode->findAll();

        $projectsModel = new ProjectsModel();
        $getAllProjects = $projectsModel->where('status !=', '2')->findAll();

        $projectHeaderModel = new ProjectHeaderModel();
        $getProjectHeaderData = $projectHeaderModel->first();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent";
        $data['page_title'] = 'Projects';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // DATA
        $data['getAllProjectCategories'] = $getAllProjectCategories;
        $data['getAllProjects'] = $getAllProjects;
        $data['getProjectHeaderData'] = $getProjectHeaderData;

        return view('Modules\PageProjects\Views\index', $data);
    }

    public function details($url)
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $dataProjectCategoriesMode = new DataProjectCategoriesModel();
        $getAllProjectCategories = $dataProjectCategoriesMode->findAll();

        $projectsModel = new ProjectsModel();
        $getProjectData = $projectsModel->where('url', $url)->first();

        $projectIntroModel = new ProjectIntroModel();
        $getIntroImagesData = $projectIntroModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $projectBAModel = new ProjectBAModel();
        $getBAData = $projectBAModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $projectTOBVModel = new ProjectTOBVModel();
        $getBVData = $projectTOBVModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $projectMDModel = new ProjectMDModel();
        $getMDData = $projectMDModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $projectTTEventsModel = new ProjectTTEventsModel();
        $getEventImagesData = $projectTTEventsModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent";
        $data['page_title'] = $getProjectData['title'.cnvrtlng($lang)].' - Project';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // DATA
        $data['getAllProjectCategories'] = $getAllProjectCategories;
        $data['getProjectData'] = $getProjectData;
        $data['getIntroImagesData'] = $getIntroImagesData;
        $data['getBAData'] = $getBAData;
        $data['getBVData'] = $getBVData;
        $data['getMDData'] = $getMDData;
        $data['getEventImagesData'] = $getEventImagesData;

        return view('Modules\PageProjects\Views\details', $data);
    }

    public function learnmore($url)
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $dataProjectCategoriesMode = new DataProjectCategoriesModel();
        $getAllProjectCategories = $dataProjectCategoriesMode->findAll();

        $projectsModel = new ProjectsModel();
        $getProjectData = $projectsModel->where('url', $url)->first();

        $projectLMModel = new ProjectLMModel();
        $getLMImagesData = $projectLMModel->where('project_id', $getProjectData['id'])->orderBy('sequence')->findAll();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent";
        $data['page_title'] = 'Learn More About '.$getProjectData['title'.cnvrtlng($lang)].' - Project';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // DATA
        $data['getAllProjectCategories'] = $getAllProjectCategories;
        $data['getProjectData'] = $getProjectData;
        $data['getLMImagesData'] = $getLMImagesData;

        return view('Modules\PageProjects\Views\learnmore', $data);
    }
}
