<?php

/**
 * Admin About Us Controller
 */

namespace Modules\AdminAboutUs\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Systems\Models\SystemconfigsModel;
use \Modules\AdminAboutUs\Models\AboutUsModel;
use \Modules\AdminAboutUs\Models\AboutUsOBBModel;
use \Modules\AdminAboutUs\Models\AboutUsOCModel;
use \Modules\AdminAboutUs\Models\AboutUsOSModel;
use \Modules\AdminAboutUs\Models\AboutUsOWCModel;

class Adminaboutus extends \CodeIgniter\Controller
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

        $aboutUsModel = new AboutUsModel();
        $getAboutUsData = $aboutUsModel->first();

        $aboutUsOBBModel = new AboutUsOBBModel();
        $aboutUsOCModel = new AboutUsOCModel();
        $aboutUsOSModel = new AboutUsOSModel();
        $aboutUsOWCModel = new AboutUsOWCModel();
        
        if ($this->request->getMethod() == 'post')
        {
            if ($this->request->getPost('btnISubmit'))
            {
                $Banner = $this->request->getFile('txtIMGBanner');
                $OLDBanner = $this->request->getPost('txtOLDIMGBanner');
                $TitleTC = $this->request->getPost('txtTitleTC');
                $TitleSC = $this->request->getPost('txtTitleSC');
                $TitleEN = $this->request->getPost('txtTitleEN');
                $IntroTC = $this->request->getPost('txtIntroTC');
                $IntroSC = $this->request->getPost('txtIntroSC');
                $IntroEN = $this->request->getPost('txtIntroEN');
                $DetailsTC = $this->request->getPost('txtDetailsTC');
                $DetailsSC = $this->request->getPost('txtDetailsSC');
                $DetailsEN = $this->request->getPost('txtDetailsEN');

                $bannerImageName = $OLDBanner;
                if ($Banner->getSize() > 0)
                {
                    $bannerImageName = custom_uploader($Banner, 'abtsntrobnnr', 'public/assets/uploads/aboutus', $OLDBanner);
                }

                $parameters = array(
                    'banner'            => $bannerImageName,
                    'title'             => $TitleTC,
                    'title_sc'          => $TitleSC,
                    'title_en'          => $TitleEN,
                    'introduction'      => $IntroTC,
                    'introduction_sc'   => $IntroSC,
                    'introduction_en'   => $IntroEN,
                    'description'       => $DetailsTC,
                    'description_sc'    => $DetailsSC,
                    'description_en'    => $DetailsEN,
                    'updatedBy'         => session()->get('id')
                );

                $qryUpdate = $aboutUsModel->update('1', $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/aboutus');
                }
            }

            if ($this->request->getPost('btnOBBSubmit'))
            {
                $Icon = $this->request->getFile('txtOBBIMGIcon');
                $OLDIcon = $this->request->getPost('txtOLDOBBIMGIcon');
                $LabelTC = $this->request->getPost('txtOBBLabelTC');
                $LabelSC = $this->request->getPost('txtOBBLabelSC');
                $LabelEN = $this->request->getPost('txtOBBLabelEN');
                $ID = $this->request->getPost('txtOBBID');
                $Process = $this->request->getPost('txtOBBProcess');

                $iconImageName = $OLDIcon;
                if ($Icon->getSize() > 0)
                {
                    $iconImageName = custom_uploader($Icon, 'abtsobbicon', 'public/assets/uploads/aboutus', $OLDIcon);
                }

                if ($Process == "add") {
                    $parameters = array(
                        'image'         => $iconImageName,
                        'label'         => $LabelTC,
                        'label_sc'      => $LabelSC,
                        'label_en'      => $LabelEN,
                        'sequence'      => custom_increament_order($aboutUsOBBModel),
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $aboutUsOBBModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                } else if ($Process == "edit") {
                    $parameters = array(
                        'image'         => $iconImageName,
                        'label'         => $LabelTC,
                        'label_sc'      => $LabelSC,
                        'label_en'      => $LabelEN,
                        'updatedBy'     => session()->get('id')
                    );

                    $qryUpdate = $aboutUsOBBModel->update($ID, $parameters);
                    if ($qryUpdate)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                }
            }

            if ($this->request->getPost('btnOBPSubmit'))
            {
                $DetailsTC = $this->request->getPost('txtOBPDetailsTC');
                $DetailsSC = $this->request->getPost('txtOBPDetailsSC');
                $DetailsEN = $this->request->getPost('txtOBPDetailsEN');

                $parameters = array(
                    'obp_details'       => $DetailsTC,
                    'obp_details_sc'    => $DetailsSC,
                    'obp_details_en'    => $DetailsEN,
                    'updatedBy'         => session()->get('id')
                );

                $qryUpdate = $aboutUsModel->update('1', $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/aboutus');
                }
            }

            if ($this->request->getPost('btnOCSubmit'))
            {
                $TitleTC = $this->request->getPost('txtOCTitleTC');
                $TitleSC = $this->request->getPost('txtOCTitleSC');
                $TitleEN = $this->request->getPost('txtOCTitleEN');
                $DetailsTC = $this->request->getPost('txtOCDetailsTC');
                $DetailsSC = $this->request->getPost('txtOCDetailsSC');
                $DetailsEN = $this->request->getPost('txtOCDetailsEN');
                $ID = $this->request->getPost('txtOCID');
                $Process = $this->request->getPost('txtOCProcess');

                if ($Process == "add") {
                    $parameters = array(
                        'title'         => $TitleTC,
                        'title_sc'      => $TitleSC,
                        'title_en'      => $TitleEN,
                        'details'       => $DetailsTC,
                        'details_sc'    => $DetailsSC,
                        'details_en'    => $DetailsEN,
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $aboutUsOCModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                } else if ($Process == "edit") {
                    $parameters = array(
                        'title'         => $TitleTC,
                        'title_sc'      => $TitleSC,
                        'title_en'      => $TitleEN,
                        'details'       => $DetailsTC,
                        'details_sc'    => $DetailsSC,
                        'details_en'    => $DetailsEN,
                        'updatedBy'     => session()->get('id')
                    );

                    $qryUpdate = $aboutUsOCModel->update($ID, $parameters);
                    if ($qryUpdate)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                }
            }

            if ($this->request->getPost('btnOSPSubmit'))
            {
                $DetailsTC = $this->request->getPost('txtOSDetailsTC');
                $DetailsSC = $this->request->getPost('txtOSDetailsSC');
                $DetailsEN = $this->request->getPost('txtOSDetailsEN');

                $parameters = array(
                    'os_details'    => $DetailsTC,
                    'os_details_sc' => $DetailsSC,
                    'os_details_en' => $DetailsEN,
                    'updatedBy'     => session()->get('id')
                );

                $qryUpdate = $aboutUsModel->update('1', $parameters);
                if ($qryUpdate)
                {
                    return redirect()->to(rtfldr().'/admin/aboutus');
                }
            }

            if ($this->request->getPost('txtOSBSubmit'))
            {
                $CategoryTC = $this->request->getPost('txtOSBCategoryTC');
                $CategorySC = $this->request->getPost('txtOSBCategorySC');
                $CategoryEN = $this->request->getPost('txtOSBCategoryEN');
                $DetailsTC = $this->request->getPost('txtOSBDetailsTC');
                $DetailsSC = $this->request->getPost('txtOSBDetailsSC');
                $DetailsEN = $this->request->getPost('txtOSBDetailsEN');
                $ID = $this->request->getPost('txtOSBID');
                $Process = $this->request->getPost('txtOSBProcess');

                if ($Process == "add") {
                    $parameters = array(
                        'category'      => $CategoryTC,
                        'category_sc'   => $CategorySC,
                        'category_en'   => $CategoryEN,
                        'details'       => $DetailsTC,
                        'details_sc'    => $DetailsSC,
                        'details_en'    => $DetailsEN,
                        'createdBy'     => session()->get('id'),
                        'dateCreated'   => time()
                    );

                    $qryInsert = $aboutUsOSModel->insert($parameters);
                    if ($qryInsert)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                } else if ($Process == "edit") {
                    $parameters = array(
                        'category'      => $CategoryTC,
                        'category_sc'   => $CategorySC,
                        'category_en'   => $CategoryEN,
                        'details'       => $DetailsTC,
                        'details_sc'    => $DetailsSC,
                        'details_en'    => $DetailsEN,
                        'updatedBy'     => session()->get('id')
                    );

                    $qryUpdate = $aboutUsOSModel->update($ID, $parameters);
                    if ($qryUpdate)
                    {
                        return redirect()->to(rtfldr().'/admin/aboutus');
                    }
                }
            }

            if ($this->request->getPost('btnOWCSubmit'))
            {
                $Logo = $this->request->getFile('txtOWCLogo'); 

                if ($Logo->getSize() > 0)
                {
                    $clientLogoName = custom_uploader($Logo, 'abtsntrorwndrflclntlg', 'public/assets/uploads/aboutus', '');
                }

                $parameters = array(
                    'image'         => $clientLogoName,
                    'createdBy'     => session()->get('id'),
                    'dateCreated'   => time()
                );

                $qryInsert = $aboutUsOWCModel->insert($parameters);
                if ($qryInsert)
                {
                    return redirect()->to(rtfldr().'/admin/aboutus');
                }
            }
        }

        $data['pageTitle'] = "About Us";
        $data['systemConfiguration'] = $this->systemConfiguration;
        $data['account'] = $this->user;
        // Data
        $data['getAboutUsData'] = $getAboutUsData;

        return view('Modules\AdminAboutUs\Views\index', $data);
    }

    /**
     * DataTables AJAX Request
     */
    function get_all_obb()
    {
        $pageModel = new AboutUsOBBModel();
        $dataLists = $pageModel->orderBy('sequence')->findAll();

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
                    'id'        => $ctr,
                    'image'     => custom_table_image('public/assets/uploads/aboutus/'.$row['image'], '70px'),
                    'label'     => $row['label'],
                    'label_sc'  => $row['label_sc'],
                    'label_en'  => $row['label_en'],
                    'order'     => custom_select_order_lists($row['id'], $row['sequence'], $orderLists, 'switch_obb_order'),
                    'actions'   => custom_table_buttons('get_obb_by_id', 'delete_obb_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_oc()
    {
        $pageModel = new AboutUsOCModel();
        $dataLists = $pageModel->findAll();

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'id'        => $ctr,
                    'title'     => $row['title_en'],
                    'details'   => $row['details_en'],
                    'actions'   => custom_table_buttons('get_oc_by_id', 'delete_oc_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_os()
    {
        $pageModel = new AboutUsOSModel();
        $dataLists = $pageModel->findAll();

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'id'        => $ctr,
                    'category'  => $row['category_en'],
                    'details'   => $row['details_en'],
                    'actions'   => custom_table_buttons('get_os_by_id', 'delete_os_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    function get_all_owc()
    {
        $pageModel = new AboutUsOWCModel();
        $dataLists = $pageModel->findAll();

        $dataTables = array();
        $ctr = 1;
        if (count($dataLists) > 0)
        {
            foreach ($dataLists as $row)
            {
                $dataTables[] = array(
                    'id'        => $ctr,
                    'image'     => custom_table_image('public/assets/uploads/aboutus/'.$row['image'], '100px'),
                    'actions'   => custom_table_buttons('', 'delete_owc_by_id', $row['id'], 1)
                );

                $ctr++;
            }
        }

        echo json_encode(array("data" => $dataTables));
    }

    /**
     * AJAX Processing Data
     */
    function get_obb_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOBBModel = new AboutUsOBBModel();

        $data = $aboutUsOBBModel->where('id', $ID)->first();

        echo $data['image']."*".$data['label']."*".$data['label_sc']."*".$data['label_en'];
    }
    function delete_obb_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOBBModel = new AboutUsOBBModel();

        $deleteQuery = $aboutUsOBBModel->delete($ID);
        if ($deleteQuery)
        {
            // Get the rest of content
            $getTheRestOfContent = $aboutUsOBBModel->orderBy('sequence')->findAll();

            $restOfContent = array();
            $ctrOrder = 1;
            foreach ($getTheRestOfContent as $rowRestOfContent)
            {
                //Update order field of the rest of content
                $parameterOrder = array('sequence' => $ctrOrder);
                $updateEachContentOrder = $aboutUsOBBModel->update($rowRestOfContent['id'], $parameterOrder);

                $ctrOrder++;
            }

            echo "ok";
        }
    }
    function switch_obb_order()
    {
        $DataID = $this->request->getPost('DataID');
        $CurrentPosition = $this->request->getPost('CurrentPosition');
        $ToSwitchPosition = $this->request->getPost('ToSwitchPosition');

        $pageContentModel = new AboutUsOBBModel();
        $checkToSwitchPosition = $pageContentModel->where('sequence', $ToSwitchPosition)->first();

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

    function get_oc_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOCModel = new AboutUsOCModel();

        $data = $aboutUsOCModel->where('id', $ID)->first();

        echo $data['title']."*".$data['title_sc']."*".$data['title_en']."*".$data['details']."*".$data['details_sc']."*".$data['details_en'];
    }
    function delete_oc_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOCModel = new AboutUsOCModel();

        $deleteQuery = $aboutUsOCModel->delete($ID);
        if ($deleteQuery)
        {
            echo "ok";
        }
    }

    function get_os_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOSModel = new AboutUsOSModel();

        $data = $aboutUsOSModel->where('id', $ID)->first();

        echo $data['category']."*".$data['category_sc']."*".$data['category_en']."*".$data['details']."*".$data['details_sc']."*".$data['details_en'];
    }
    function delete_os_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOSModel = new AboutUsOSModel();

        $deleteQuery = $aboutUsOSModel->delete($ID);
        if ($deleteQuery)
        {
            echo "ok";
        }
    }

    function delete_owc_data_by_id()
    {
        $ID = $this->request->getPost('id');
        $aboutUsOWCModel = new AboutUsOWCModel();

        $deleteQuery = $aboutUsOWCModel->delete($ID);
        if ($deleteQuery)
        {
            echo "ok";
        }
    }
}
