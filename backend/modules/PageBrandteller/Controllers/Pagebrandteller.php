<?php

/**
 * Page Brandteller Controller
 */
namespace Modules\PageBrandteller\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminContactUs\Models\FooterContentModel;
use \Modules\AdminContactUs\Models\ContactUsModel;
use \Modules\AdminBrandteller\Models\BrandtellerModel;
use \Modules\AdminBrandteller\Models\BrandtellerContentModel;
use \Modules\AdminBrandteller\Models\BrandtellerTagsModel;
use \Modules\AdminBrandteller\Models\BrandtellerCategoriesModel;

class Pagebrandteller extends \CodeIgniter\Controller
{
    protected $users;
    protected $systemConfiguration;
    protected $footerContent;
    protected $contactUsContent;
    protected $brandCategories;

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

        $brandtellerCategoriesModel = new BrandtellerCategoriesModel();
        $getAllBrandtellerCategoriesData = $brandtellerCategoriesModel->findAll();
        foreach ($getAllBrandtellerCategoriesData as $rowC)
        {
            $this->brandCategories[$rowC['id']] = $rowC['name_en'];
        }
    }

    public function index()
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $brandtellerModel = new BrandtellerModel();
        $getFeaturedData = $brandtellerModel->where('isfeatured', '1')->first();
        $getAllProducts = $brandtellerModel->where('isfeatured', '0')->where('status', '1')->findAll();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent dark";
        $data['page_title'] = 'Brandteller';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        $data['brand_categories'] = $this->brandCategories;
        // DATA
        $data['getFeaturedData'] = $getFeaturedData;
        $data['getAllProducts'] = $getAllProducts;

        return view('Modules\PageBrandteller\Views\index', $data);
    }

    public function details($url)
    { 
        $lang = getpagelanguage($_SERVER['REQUEST_URI']);

        $brandtellerModel = new BrandtellerModel();
        $getBrandtellerData = $brandtellerModel->where('url', $url)->first();

        if (!$getBrandtellerData) {
            return redirect()->to(rtfldr().'/'.$lang.'/brandteller');
        }

        $brandtellerContentModel = new BrandtellerContentModel();
        $getContentByBrandtellerID = $brandtellerContentModel->where('brandteller_id', $getBrandtellerData['id'])->orderBy('sequence')->findAll();

        $brandtellerTagsModel = new BrandtellerTagsModel();
        $getTagsByBrandtellerID = $brandtellerTagsModel->where('brandteller_id', $getBrandtellerData['id'])->orderBy('sequence')->findAll();

        $data['lang'] = $lang;
        $data['added_nav_class'] = "transparent dark";
        $data['page_title'] = 'Brandteller - Details';
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['footer_content'] = $this->footerContent;
        $data['contactus_content'] = $this->contactUsContent;
        $data['brand_categories'] = $this->brandCategories;
        // DATA
        $data['getBrandtellerData'] = $getBrandtellerData;
        $data['getContentByBrandtellerID'] = $getContentByBrandtellerID;
        $data['getTagsByBrandtellerID'] = $getTagsByBrandtellerID;

        return view('Modules\PageBrandteller\Views\details', $data);
    }
}
