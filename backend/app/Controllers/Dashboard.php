<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\RegisterModel;

class Dashboard extends BaseController
{
    private $loggedInfo;
    private $registerModel;
    public function __construct()
    {
        $this->registerModel = new RegisterModel();
        $this->loggedInfo = session()->get('LoggedData');
    }
    public function index()
    {
        $data = [
            'pageTitle' => 'VRS | Dashboard',
            'pageHeading' => 'Dashboard',
            'loggedInfo' => $this->loggedInfo
        ];
        return view('common/top', $data)
            . view('dashboard/index')
            . view('common/bottom');
    }
    public function view()
    {
        $registeredData = $this->registerModel->where(['status' => 1])->findAll();
        $data = [
            'pageTitle' => 'VRS | Dashboard',
            'pageHeading' => 'Dashboard',
            'loggedInfo' => $this->loggedInfo,
            'registeredData' => $registeredData
        ];
        return view('common/top', $data)
            . view('dashboard/view')
            . view('common/bottom');
    }
    public function show($register_id = 0)
    {
        $registeredData = $this->registerModel->where(['register_id' => $register_id, 'status' => 1])->findAll();
        $data = [
            'pageTitle' => 'VRS | Dashboard',
            'pageHeading' => 'Dashboard',
            'loggedInfo' => $this->loggedInfo,
            'registeredData' => $registeredData[0]
        ];
        return view('common/top', $data)
            . view('dashboard/show')
            . view('common/bottom');
    }
    public function edit($register_id = 0)
    {
        $registeredData = $this->registerModel->where(['register_id' => $register_id, 'status' => 1])->findAll();
        $data = [
            'pageTitle' => 'VRS | Dashboard',
            'pageHeading' => 'Dashboard',
            'loggedInfo' => $this->loggedInfo,
            'registeredData' => $registeredData[0]
        ];
        return view('common/top', $data)
            . view('dashboard/edit')
            . view('common/bottom');
    }
    public function delete($register_id = 0)
    {
        $inputData = array(
            'status'    => 0,
            'login_id' => $this->loggedInfo['login_id']
        );
        $query = $this->registerModel->update($register_id, $inputData);
        if (!$query) {
            return  redirect()->back()->with('fail', 'Something went wrong Files.');
        } else {
            $registeredData = $this->registerModel->where(['register_id' => $register_id])->findAll();
            rename('uploads/' . $registeredData[0]['phone'], 'uploads/' . $registeredData[0]['phone'] . '_old');
            return  redirect()->back()->with('success', 'Congratulation. You are now deleted ');
        }
    }
    public function add()
    {
        $data = [
            'pageTitle' => 'VRS | Dashboard',
            'pageHeading' => 'Dashboard',
            'loggedInfo' => $this->loggedInfo
        ];
        return view('common/top', $data)
            . view('dashboard/add')
            . view('common/bottom');
    }
    public function addAction()
    {
        $validation = $this->validate([
            'fullname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Fullname is required.'
                ]
            ],
            'fname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Father / Husband name is required.'
                ],
            ],
            'address' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Email is required.'
                ],
            ],
            'phone' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Phone is required.'
                ],
            ],
            'aadhar_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Aadhar is required Yes/No.'
                ],
            ],
            'relieving_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Relieving is required Yes/No.'
                ],
            ],
            'payslip_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Payslip is required Yes/No.'
                ],
            ],
            'identitycard_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Identitycard is required Yes/No.'
                ],
            ],
            'pensionorder_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pensionorder is required Yes/No.'
                ],
            ],
            'esipf_radio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'ESI PF is required Yes/No.'
                ],
            ]
        ]);
        if (!$validation) {
            return  redirect()->back()->with('validation', $this->validator)->withInput();
        } else {
            $phone_folder = $this->request->getPost("phone");
            if (!is_dir('uploads/' . $phone_folder)) {
                mkdir('./uploads/' . $phone_folder, 0777, TRUE);
                $path = 'uploads/' . $phone_folder;
            } else {
                $path = 'uploads/' . $phone_folder;
            }
            $aadhar_path = '';
            if ($this->request->getPost("aadhar_radio") == "Yes") {
                $aadhar = $this->request->getFile('aadhar');
                if ($aadhar->isValid()) {
                    if (!$aadhar->hasMoved()) {
                        $aadhar_path = $aadhar->getRandomName();
                        $aadhar->move($path, $aadhar_path);
                        $aadhar_path = $path . "/" . $aadhar_path;
                    }
                } else {
                    if (empty($this->request->getPost("aadhar"))) {
                        return  redirect()->back()->with('fail', 'Aadhar Choose First')->withInput();
                    }
                    $aadhar_path = $this->request->getPost("aadhar");
                }
            }
            $relieving_path = '';
            if ($this->request->getPost("relieving_radio") == "Yes") {
                $relieving = $this->request->getFile('relieving');
                if ($relieving->isValid()) {
                    if (!$relieving->hasMoved()) {
                        $relieving_path = $relieving->getRandomName();
                        $relieving->move($path, $relieving_path);
                        $relieving_path = $path . "/" . $relieving_path;
                    }
                } else {
                    if (empty($this->request->getPost("relieving"))) {
                        return  redirect()->back()->with('fail', 'Relieving Choose First')->withInput();
                    }
                    $relieving_path = $this->request->getPost("relieving");
                }
            }
            $payslip_path = '';
            if ($this->request->getPost("payslip_radio") == "Yes") {
                $payslip = $this->request->getFile('payslip');
                if ($payslip->isValid()) {
                    if (!$payslip->hasMoved()) {
                        $payslip_path = $payslip->getRandomName();
                        $payslip->move($path, $payslip_path);
                        $payslip_path = $path . "/" . $payslip_path;
                    }
                } else {
                    if (empty($this->request->getPost("payslip"))) {
                        return  redirect()->back()->with('fail', 'Pay Slip Choose First')->withInput();
                    }
                    $payslip_path = $this->request->getPost("payslip");
                }
            }
            $identitycard_path = '';
            if ($this->request->getPost("identitycard_radio") == "Yes") {
                $identitycard = $this->request->getFile('identitycard');
                if ($identitycard->isValid()) {
                    if (!$identitycard->hasMoved()) {
                        $identitycard_path = $identitycard->getRandomName();
                        $identitycard->move($path, $identitycard_path);
                        $identitycard_path = $path . "/" . $identitycard_path;
                    }
                } else {
                    if (empty($this->request->getPost("identitycard"))) {
                        return  redirect()->back()->with('fail', 'Identity Card Choose First')->withInput();
                    }
                    $identitycard_path = $this->request->getPost("identitycard");
                }
            }
            $pensionorder_path = '';
            if ($this->request->getPost("pensionorder_radio") == "Yes") {
                $pensionorder = $this->request->getFile('pensionorder');
                if ($pensionorder->isValid()) {
                    if (!$pensionorder->hasMoved()) {
                        $pensionorder_path = $pensionorder->getRandomName();
                        $pensionorder->move($path, $pensionorder_path);
                        $pensionorder_path = $path . "/" . $pensionorder_path;
                    }
                } else {
                    if (empty($this->request->getPost("pensionorder"))) {
                        return  redirect()->back()->with('fail', 'Pension Order Choose First')->withInput();
                    }
                    $pensionorder_path = $this->request->getPost("pensionorder");
                }
            }
            $esipf_path = '';
            if ($this->request->getPost("esipf_radio") == "Yes") {
                $esipf = $this->request->getFile('esipf');
                if ($esipf->isValid()) {
                    if (!$esipf->hasMoved()) {
                        $esipf_path = $esipf->getRandomName();
                        $esipf->move($path, $esipf_path);
                        $esipf_path = $path . "/" . $esipf_path;
                    }
                } else {
                    if (empty($this->request->getPost("esipf"))) {
                        return  redirect()->back()->with('fail', 'ESI PF Choose First')->withInput();
                    }
                    $esipf_path = $this->request->getPost("esipf");
                }
            }
            $inputData = [
                'fullname' => $this->request->getPost("fullname"),
                'fname' => $this->request->getPost("fname"),
                'address' => $this->request->getPost("address"),
                'email' => $this->request->getPost("email"),
                'phone' => $this->request->getPost("phone"),
                'aadhar_radio' => $this->request->getPost("aadhar_radio"),
                'aadhar' => $aadhar_path,
                'relieving_radio' => $this->request->getPost("relieving_radio"),
                'relieving' => $relieving_path,
                'payslip_radio' => $this->request->getPost("payslip_radio"),
                'payslip' => $payslip_path,
                'identitycard_radio' => $this->request->getPost("identitycard_radio"),
                'identitycard' => $identitycard_path,
                'pensionorder_radio' => $this->request->getPost("pensionorder_radio"),
                'pensionorder' => $pensionorder_path,
                'esipf_radio' => $this->request->getPost("esipf_radio"),
                'esipf' => $esipf_path,
                'thumb' => 'thumb',
                'status' => 1,
                'login_id' => $this->loggedInfo['login_id'],
                'created' => date("Y-m-d H:i:s")
            ];
            if ($this->request->getPost("register_id")) {
                $query = $this->registerModel->update($this->request->getPost("register_id"), $inputData);
            } else {
                $query = $this->registerModel->insert($inputData);
            }
        }
        if (!$query) {
            return  redirect()->back()->with('fail', 'Something went wrong Input Data.')->withInput();
        } else {
            return  redirect()->to('dashboard/' . Hash::path('index'))->with('success', 'Congratulations! Record Efected');
        }
    }
}
