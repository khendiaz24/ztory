<?php

/**
 * Page Home Controller
 */
namespace Modules\PageHome\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminContactUs\Models\FooterContentModel;
use \Modules\AdminContactUs\Models\ContactUsModel;
use \Modules\AdminDashboard\Models\DashboardHomeModel;
use \Modules\AdminProjects\Models\ProjectsModel;
use \Modules\AdminDashboard\Models\DashboardHomeFeaturedBrandtellerModel;
use \Modules\AdminBrandteller\Models\BrandtellerModel;

class Pagehome extends \CodeIgniter\Controller
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
        return redirect()->to(rtfldr().'/tc/home');
    }

    public function home()
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $dashboardHomeModel = new DashboardHomeModel();
        $getHomeContentData = $dashboardHomeModel->first();

        $projectsModel = new ProjectsModel();
        $getProjectData = $projectsModel->where('status !=', '2')->findAll();

        $dashboardHomeFeaturedBrandtellerModel = new DashboardHomeFeaturedBrandtellerModel();
        $getFeaturedBrandtellerData = $dashboardHomeFeaturedBrandtellerModel->orderBy('sequence')->findAll();

        $brandtellerModel = new BrandtellerModel();
        $getAllBrandteller = $brandtellerModel->where('status', '1')->findAll();
        $brandtellerDataLists = array();
        foreach ($getAllBrandteller as $rowB) 
        {
            $brandtellerDataLists[$rowB['id']] = array(
                'name'  => $rowB['name'.cnvrtlng($lang)],
                'details'   => $rowB['details'.cnvrtlng($lang)]
            );
        }

        $data['lang'] = $lang;
        $data['added_nav_class'] = "";
        $data['page_title'] = 'Home';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        // CONTENT
        $data['brandtellerDataLists'] = $brandtellerDataLists;
        $data['getHomeContentData'] = $getHomeContentData;
        $data['getProjectData'] = $getProjectData;
        $data['getFeaturedBrandtellerData'] = $getFeaturedBrandtellerData;

        return view('Modules\PageHome\Views\index', $data);
    }

    public function search_result()
    {
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);
        $Keyword = $this->request->getPost('txtSearchKeyword');
        $searchModel = new SearchModel();

        if (!empty($Keyword)) 
        {
            // Search Keyword Process
            $getAllSearchResults = $searchModel->like('search_keywords', strtolower($Keyword), 'both')->findAll();

            $data['getAllSearchResults'] = $getAllSearchResults;
        }
        
        // CONTENT
        $data['lang'] = $lang;
        $data['page_title'] = 'Search Result Page';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['Keyword'] = $Keyword;
        
        return view('Modules\PageHome\Views\search', $data);
    }
}
