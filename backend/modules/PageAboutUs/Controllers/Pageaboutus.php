<?php

/**
 * Page About Us Controller
 */
namespace Modules\PageAboutUs\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminContactUs\Models\FooterContentModel;
use \Modules\AdminContactUs\Models\ContactUsModel;
use \Modules\AdminAboutUs\Models\AboutUsModel;
use \Modules\AdminAboutUs\Models\AboutUsOBBModel;
use \Modules\AdminAboutUs\Models\AboutUsOCModel;
use \Modules\AdminAboutUs\Models\AboutUsOSModel;
use \Modules\AdminAboutUs\Models\AboutUsOWCModel;

class Pageaboutus extends \CodeIgniter\Controller
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

        $aboutUsModel = new AboutUsModel();
        $getAboutUsData = $aboutUsModel->first();

        $aboutUsOBBModel = new AboutUsOBBModel();
        $getAllOBBData = $aboutUsOBBModel->orderBy('sequence')->findAll();

        $aboutUsOCModel = new AboutUsOCModel();
        $getAllOCData = $aboutUsOCModel->findAll();

        $aboutUsOSModel = new AboutUsOSModel();
        $getAllOSData = $aboutUsOSModel->findAll();

        $aboutUsOWCModel = new AboutUsOWCModel();
        $getAllOWCData = $aboutUsOWCModel->findAll();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent dark";
        $data['page_title'] = 'About Us';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // DATA
        $data['getAboutUsData'] = $getAboutUsData;
        $data['getAllOBBData'] = $getAllOBBData;
        $data['getAllOCData'] = $getAllOCData;
        $data['getAllOSData'] = $getAllOSData;
        $data['getAllOWCData'] = $getAllOWCData;

        return view('Modules\PageAboutUs\Views\index', $data);
    }
}
