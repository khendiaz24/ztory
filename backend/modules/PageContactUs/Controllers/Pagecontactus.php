<?php

/**
 * Page Contact Us Controller
 */
namespace Modules\PageContactUs\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminContactUs\Models\FooterContentModel;
use \Modules\AdminContactUs\Models\ContactUsModel;
use \Modules\AdminContactUs\Models\InquiriesModel;

class Pagecontactus extends \CodeIgniter\Controller
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

        $inquiriesModel = new InquiriesModel();

        if ($this->request->getMethod() == 'post')
        {
            if ($this->request->getPost('btnSubmit'))
            {
                $Company = $this->request->getPost('txtCompany');
                $Name = $this->request->getPost('txtName');
                $Email = $this->request->getPost('txtEmail');
                $Number = $this->request->getPost('txtNumber');
                $Request = $this->request->getPost('txtRequest');

                $parameters = array(
                    'company'   => $Company,
                    'name'      => $Name,
                    'email'     => $Email,
                    'number'    => $Number,
                    'request'   => $Request
                );

                $qryInsert = $inquiriesModel->insert($parameters);
                if ($qryInsert)
                {
                    return redirect()->to(rtfldr().'/'.$lang.'/contactus');
                }
            }
        }

        // CONTENT
        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent";
        $data['page_title'] = 'Contact Us';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // Custom

        return view('Modules\PageContactUs\Views\index', $data);
    }
}
