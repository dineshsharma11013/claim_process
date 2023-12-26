<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\generalInfoCntrlr;
use App\Http\Controllers\admin\irpCntrlr;
use App\Http\Controllers\admin\UserCntrlr;
use App\Http\Controllers\admin\sabredgerepCntrlr;
use App\Http\Controllers\admin\formACntrlr;
use App\Http\Controllers\admin\arCntrlr;
use App\Http\Controllers\admin\companyDtlCntrlr;
use App\Http\Controllers\admin\userTypeCntrlr;
use App\Http\Controllers\admin\authenticationCntrlr;
use App\Http\Controllers\admin\formBDtlCntrlr;
use App\Http\Controllers\admin\assignCompanyCntrlr;
use App\Http\Controllers\admin\irpUserDetails;
use App\Http\Controllers\admin\commonCntrlr;
use App\Http\Controllers\admin\employeeCntrlr;
use App\Http\Controllers\admin\todoCntrlr;
use App\Http\Controllers\admin\caseCntrlr;

use App\Http\Controllers\admin\publishCntrlr;
use App\Http\Controllers\admin\case_cntrlr;

use App\Http\Controllers\admin\reportCntrlr;
use App\Http\Controllers\admin\formCDtlCntrlr;
use App\Http\Controllers\admin\formDDtlCntrlr;
use App\Http\Controllers\admin\formCADtlCntrlr;
use App\Http\Controllers\admin\formEDtlCntrlr;
use App\Http\Controllers\admin\formFDtlCntrlr;

use App\Http\Controllers\admin\reportGenerateCntrl;
use App\Http\Controllers\admin\reportGenerateCntrlr;

use App\Http\Controllers\admin\formSCntrlr;
use App\Http\Controllers\admin\formGCntrlr;
use App\Http\Controllers\admin\formAACntrlr;
use App\Http\Controllers\admin\formTimelineSCntrlr;

use App\Http\Controllers\admin\assignmentGenerateCntrlr;
use App\Http\Controllers\admin\claimentCntrlr;
use App\Http\Controllers\admin\llpmaster_DtlCntrlr;

use App\Http\Controllers\front\front;
use App\Http\Controllers\front\User;

use App\Http\Controllers\front\formBCntrlr;
use App\Http\Controllers\front\formCCntrlr;
use App\Http\Controllers\front\formCaCntrlr;
use App\Http\Controllers\front\formFCntrlr;
use App\Http\Controllers\front\formECntrlr;
use App\Http\Controllers\front\formDCntrlr;

use App\Http\Controllers\front\Work_employee;




// admin section

Route::get(admin().'/login', [generalInfoCntrlr::class, 'login'])->middleware('adminLoginCheck');
Route::post(admin().'/login', [generalInfoCntrlr::class, 'loginUser'])->middleware('adminLoginCheck');

Route::get(admin().'/sign-up', [generalInfoCntrlr::class, 'signUp'])->middleware('adminLoginCheck');
Route::post(admin().'/sign-up', [generalInfoCntrlr::class, 'signUpIp'])->middleware('adminLoginCheck');

Route::group(['prefix'=>admin(),'middleware'=>'AdminCheck'],function(){
Route::get('/', [generalInfoCntrlr::class, 'index'])->name('adminDashboard');
Route::get('/todo-details/sort-data', [generalInfoCntrlr::class, 'sortTodo']);
Route::get('/todo-pagination/sort_data', [generalInfoCntrlr::class, 'sort_Todo']);


Route::get('/assignments-details', [generalInfoCntrlr::class, 'assignDetails']);

Route::get('/get-notifications', [generalInfoCntrlr::class, 'getNotifications']);
Route::post('/form-notification-update', [generalInfoCntrlr::class, 'updateNotifications']);

Route::get('sign-out', [generalInfoCntrlr::class, 'logout']);

Route::get('/general-info', [generalInfoCntrlr::class, 'generalInfo'])->name('generalInfo');
Route::post('/save-general-info', [generalInfoCntrlr::class, 'saveData'])->name('saveData');

Route::get('/change-password', [generalInfoCntrlr::class, 'changePassword'])->name('AchangePassword');
Route::post('/change-password', [generalInfoCntrlr::class, 'adminChangePassword']);


Route::post('update-general-info/{id}', [generalInfoCntrlr::class, 'updateData']);
Route::post('remove-banner/{id}/{banner}', [generalInfoCntrlr::class, 'removeBanner']);

Route::get('employee-details', [employeeCntrlr::class, 'index'])->name('employeeDetails');
Route::get('add-employee', [employeeCntrlr::class, 'addData']);
Route::post('save-employee', [employeeCntrlr::class, 'saveData']);
Route::get('get-invoice-no', [employeeCntrlr::class, 'getInvoiceNo']);
Route::get('delete-employee-detail/{id}', [employeeCntrlr::class, 'deleteData']);
Route::get('edit-employee/{id}', [employeeCntrlr::class, 'editData']);
Route::post('update-employee/{id}', [employeeCntrlr::class, 'updateEmpData']);

Route::get('case-list/{id}', [caseCntrlr::class, 'index']);
Route::get('assign-case/{id}', [caseCntrlr::class, 'assignCase']);
Route::post('assign-case/{id}', [caseCntrlr::class, 'saveAssignCase']);
Route::get('edit-assign-case/{cmp}/{id}', [caseCntrlr::class, 'editAssignCase']);
Route::post('edit-assign-case/{cmp}/{id}', [caseCntrlr::class, 'updateAssignCase']);
Route::post('delete-assign-case/{id}', [caseCntrlr::class, 'deleteAssignCase']);

Route::get('activity-details', [todoCntrlr::class, 'index'])->name('todoDetails');
Route::get('assign-task/{id?}', [todoCntrlr::class, 'assignTask']);
Route::post('assign-task/{id?}', [todoCntrlr::class, 'saveAssignTask']);

Route::get('edit-assign-task/{id}/{cmp?}', [todoCntrlr::class, 'editAssignTask']);
Route::post('edit-assign-task/{id}/{cmp?}', [todoCntrlr::class, 'updateAssignTask']);
Route::get('delete-assign-task/{id}', [todoCntrlr::class, 'deleteAssignTask']);
Route::get('detail-assign-task/{id}', [todoCntrlr::class, 'detailAssignTask']);
Route::get('get-todo-info/{id}', [todoCntrlr::class, 'getDetailAssignTask']);

Route::get('todo-details/fetch-data', [todoCntrlr::class, 'filterTodo']);
// Route::get('todo-pagination/fetch_data', [todoCntrlr::class, 'filterPagination']);
Route::get('todo-pagination/fetch_data', [todoCntrlr::class, 'filterPagination']);


// Route::get('activity-details', [todoCntrlr::class, 'index'])->name('publications');

Route::get('form-g-details', [formGCntrlr::class, 'index']);
Route::get('form-g', [formGCntrlr::class, 'addData']);
Route::post('form-g', [formGCntrlr::class, 'saveData']);
Route::get('edit-form-g/{id}', [formGCntrlr::class, 'editData']);
Route::post('update-form-g/{id}', [formGCntrlr::class, 'updateData']);
Route::get('delete-form-g/{id}', [formGCntrlr::class, 'deleteData']);


Route::get('form-a-details', [formACntrlr::class, 'index']);
Route::get('form-a', [formACntrlr::class, 'addData']);
Route::post('form-a', [formACntrlr::class, 'saveData']);
Route::get('edit-form-a/{id}', [formACntrlr::class, 'editData']);
Route::post('update-form-a/{id}', [formACntrlr::class, 'updateData']);
Route::get('delete-form-a/{id}', [formACntrlr::class, 'deleteData']);
Route::get('get-company-details/{id}', [formACntrlr::class, 'getCompanyData']);
Route::get('get-formA-row', [formACntrlr::class, 'getFormARow']);
Route::get('remove-class-data/{id}', [formACntrlr::class, 'removeClassRow']);
Route::get('update-creditor-class', [formACntrlr::class, 'updateClassRow']);


Route::get('registered-forms', [commonCntrlr::class, 'registeredForms']);
Route::get('unregistered-forms', [commonCntrlr::class, 'unregisteredForms']);

Route::get('sabredge-representative', [sabredgerepCntrlr::class, 'index']);
Route::get('get-company/{id}', [sabredgerepCntrlr::class, 'getCompany']);
Route::get('add-sabredge-representative', [sabredgerepCntrlr::class, 'addData']);
Route::post('save-sabredge-representative', [sabredgerepCntrlr::class, 'saveData']);
Route::get('sabredge-representative-delete-record/{id}', [sabredgerepCntrlr::class, 'deleteData']);
Route::get('edit-sabredge-representative/{id}', [sabredgerepCntrlr::class, 'editData']);
Route::post('update-sabredge-representative/{id}', [sabredgerepCntrlr::class, 'updateData']);

Route::get('/ip-details', [irpCntrlr::class, 'irpDetails']);
Route::get('/sub-ip-details', [irpCntrlr::class, 'irpDetails']);
Route::get('/sub-ip-details/{id}', [irpCntrlr::class, 'subirpDetails'])->name('subirpDetails');

Route::get('/add-ip', [irpCntrlr::class, 'addIrp']);
Route::get('/add-sub-ip/{id?}', [irpCntrlr::class, 'addIrp']);

Route::post('/add-ip/{id?}', [irpCntrlr::class, 'saveIrp'])->name('saveIrp');
Route::get('/edit-ip/{id}', [irpCntrlr::class, 'editIrp']);
Route::get('/edit-sub-ip/{id}', [irpCntrlr::class, 'editIrp']);
Route::post('/edit-ip/{id}', [irpCntrlr::class, 'updateIrp'])->name('updateIrp');
Route::get('/delete-ip/{id}', [irpCntrlr::class, 'deleteIrp'])->name('deleteIrp');
Route::get('/delete-ip-detail/{id}', [irpCntrlr::class, 'deleteIpDetail']);

Route::get('/ip-user-details', [irpUserDetails::class, 'irpUserDetails'])->name('irpUserDetails');
Route::get('/add-ip-user', [irpUserDetails::class, 'addIrp']);
Route::post('/add-user-ip', [irpUserDetails::class, 'saveIrp']);
Route::get('/edit-ip-user/{id}', [irpUserDetails::class, 'editIrp']);
Route::post('/edit-ip-user/{id}', [irpUserDetails::class, 'updateIrp']);
Route::get('/delete-ip-user/{id}', [irpUserDetails::class, 'deleteIrp']);
Route::get('/delete-ip-user-detail/{id}', [irpUserDetails::class, 'deleteIpDetail']);

Route::get('/assigning-details', [assignCompanyCntrlr::class, 'assignDetails'])->name('assignDetails');
Route::get('/assign-data', [assignCompanyCntrlr::class, 'addAssignIp'])->name('addAssignIp');
Route::post('/assign-ip', [assignCompanyCntrlr::class, 'saveAssignIp'])->name('saveAssignIp');
Route::get('/assign-ip-dt', [assignCompanyCntrlr::class, 'getIpDt']);
Route::get('/edit-assign-data/{id}', [assignCompanyCntrlr::class, 'editAssignIp'])->name('editAssignIp');
Route::post('/edit-assign-data/{id}', [assignCompanyCntrlr::class, 'updateAssignIp'])->name('updateAssignIp');
Route::get('/delete-assign-data/{id}', [assignCompanyCntrlr::class, 'deleteAssignIp'])->name('deleteAssignIp');

Route::get('/ar-details', [arCntrlr::class, 'arDetails'])->name('arDetails');
Route::get('/add-ar', [arCntrlr::class, 'addAr'])->name('addAr');
Route::post('/add-ar', [arCntrlr::class, 'saveAr'])->name('saveAr');
Route::get('/edit-ar/{id}', [arCntrlr::class, 'editAr'])->name('editAr');
Route::post('/edit-ar/{id}', [arCntrlr::class, 'updateAr'])->name('updateAr');
Route::get('/delete-ar/{id}', [arCntrlr::class, 'deleteAr'])->name('deleteAr');

Route::get('/company-details', [companyDtlCntrlr::class, 'companyDetails']);
Route::get('/add-company', [companyDtlCntrlr::class, 'addCompany']);
Route::post('/add-company', [companyDtlCntrlr::class, 'saveCompany']);
Route::get('/edit-company/{id}', [companyDtlCntrlr::class, 'editCompany']);
Route::post('/edit-company/{id}', [companyDtlCntrlr::class, 'updateCompany']);
Route::get('/delete-company/{id}', [companyDtlCntrlr::class, 'deleteCompany']);

Route::get('/view_company_timeline_cart/{id}',[companyDtlCntrlr::class, 'viewtimeline']);




Route::get('/cirp-details', [companyDtlCntrlr::class, 'cirpDetails']);
Route::get('/user-form-details/{id}', [companyDtlCntrlr::class, 'userFormDetails']);


Route::get('/user-types', [userTypeCntrlr::class, 'userTypeDetails'])->name('userTypeDetails');
Route::get('/add-user-type', [userTypeCntrlr::class, 'addUserType'])->name('addUserType');
Route::post('/add-user-type', [userTypeCntrlr::class, 'saveUserType'])->name('saveUserType');
Route::get('/edit-user-type/{id}', [userTypeCntrlr::class, 'editUserType'])->name('editUserType');
Route::post('/edit-user-type/{id}', [userTypeCntrlr::class, 'updateUserType'])->name('updateUserType');
Route::get('/delete-user-type/{id}', [userTypeCntrlr::class, 'deleteUserType'])->name('deleteUserType');

Route::get('/authentication', [authenticationCntrlr::class, 'index']);
Route::get('/authentication-details', [authenticationCntrlr::class, 'authDetails']);
Route::post('/save-authentication', [authenticationCntrlr::class, 'saveData']);
Route::post('/save-authentication/{id}', [authenticationCntrlr::class, 'saveData']);


Route::post('save-user-submission', [authenticationCntrlr::class, 'userFormAuth']);
Route::get('delete-user-form-auth/{id}', [authenticationCntrlr::class, 'deleteUserFormAuth']);
Route::get('delete-selected-user-form-auth/{id}', [authenticationCntrlr::class, 'deleteSelectedUsersFormAuth']);
Route::get('update-users-form-auth/{st}/{id}', [authenticationCntrlr::class, 'updateSelectedUserFormAuth']);
Route::get('get-selected-form-name/{id}', [authenticationCntrlr::class, 'getSelectedUserFormAuth']);


Route::get('/user-details', [UserCntrlr::class, 'userDetails'])->name('userDetails');
Route::post('/user-upload-excel', [UserCntrlr::class, 'uploadUser']);
Route::get('user-export-excel', [UserCntrlr::class, 'exportExcel'])->name('export_excel');
Route::get('/add-user', [UserCntrlr::class, 'addUser'])->name('addUser');
Route::post('/add-user', [UserCntrlr::class, 'saveUser'])->name('saveUser');
Route::get('/edit-user/{id}', [UserCntrlr::class, 'editUser'])->name('editUser');
Route::post('/edit-user/{id}', [UserCntrlr::class, 'updateUser'])->name('updateUser');
Route::get('/delete-user/{id}', [UserCntrlr::class, 'deleteUser'])->name('deleteUser');
Route::get('user-info-pagination/fetch_data', [UserCntrlr::class, 'userDetailsByData']);
Route::get('user-details/fetch-data', [UserCntrlr::class, 'filterDetails']);
Route::get('user-details/fetch-status', [UserCntrlr::class, 'filterStatus']);
Route::get('delete-selected-users/{id}', [UserCntrlr::class, 'deleteSelectedUsers']);
Route::get('update-users-status/{st}/{id}', [UserCntrlr::class, 'updateSelectedUsers']);
Route::get('update-users-authentication/{st}/{id}', [UserCntrlr::class, 'updateSelectedAuth']);
Route::get('edit-user-info/{id}', [UserCntrlr::class, 'editUserInfo']);
Route::get('search-user-data', [UserCntrlr::class, 'searchUserInfo']);

// Form details

Route::get('/forms-report', [reportCntrlr::class, 'formsReport'])->name('formsReport');
Route::post('/generate-report', [reportCntrlr::class, 'generateReport']);


Route::get('/form-b', [formBDtlCntrlr::class, 'formBDetails'])->name('formBDetails');
Route::post('/form-b-approval', [formBDtlCntrlr::class, 'formBDetailsApproval']);



Route::get('/form-b-registered', [formBDtlCntrlr::class, 'formBDetails'])->name('formBRegDetails');
Route::get('/form-b-registered-details/{id}', [formBDtlCntrlr::class, 'viewFormBDetails']);
Route::get('/form-b-documents/{id}', [formBDtlCntrlr::class, 'FormBDocDetails']);
Route::get('/form-b-mail-rp/{id}', [formBDtlCntrlr::class, 'rpMailInfo']);
Route::post('/send-formB-user-report', [formBDtlCntrlr::class, 'rpMailSend']);
Route::get('/delete-form-b/{id}', [formBDtlCntrlr::class, 'removeFormBDetails']);
Route::get('/form-b-unregistered', [formBDtlCntrlr::class, 'formBUnRegDetails'])->name('formBUnRegDetails');
Route::get('/get-form-b-pdf-report/{main_id}/{other_id}', [formBDtlCntrlr::class, 'getFormBPdfReport']);


Route::get('/form-c-registered', [formCDtlCntrlr::class, 'formCDetails'])->name('formCRegDetails');
Route::get('/form-c-registered-details/{id}', [formCDtlCntrlr::class, 'viewFormCDetails']);
Route::get('/form-c-documents/{id}', [formCDtlCntrlr::class, 'viewFormCDocDetails']);
Route::post('/form-c-approval', [formCDtlCntrlr::class, 'formCDetailsApproval']);
Route::get('/delete-form-c/{id}', [formCDtlCntrlr::class, 'removeFormCDetails']);
Route::get('/form-c-unregistered', [formCDtlCntrlr::class, 'formCUnRegDetails'])->name('formCUnRegDetails');
Route::get('/get-form-c-pdf-report/{main_id}/{other_id}', [formCDtlCntrlr::class, 'getFormCPdfReport']);
Route::get('/form-c-mail-rp/{id}', [formCDtlCntrlr::class, 'rpMailInfoFormC']);
Route::post('/send-formC-user-report', [formCDtlCntrlr::class, 'rpMailSend']);
//Route::post('/form-c-notification-update', [formCDtlCntrlr::class, 'updateFormCNotifications']);

Route::get('/form-d-registered', [formDDtlCntrlr::class, 'formDDetails'])->name('formDRegDetails');
Route::get('/form-d-registered-details/{id}', [formDDtlCntrlr::class, 'viewFormDDetails']);
Route::get('/form-d-documents/{id}', [formDDtlCntrlr::class, 'viewFormDDocDetails']);
Route::post('/form-d-approval', [formDDtlCntrlr::class, 'formDDetailsApproval']);
Route::get('/delete-form-d/{id}', [formDDtlCntrlr::class, 'removeFormDDetails']);
Route::get('/form-d-unregistered', [formDDtlCntrlr::class, 'formDUnRegDetails'])->name('formDUnRegDetails');
Route::get('/get-form-d-pdf-report/{main_id}/{other_id}', [formDDtlCntrlr::class, 'getFormDPdfReport']);
Route::get('/form-d-mail-rp/{id}', [formDDtlCntrlr::class, 'rpMailInfoFormD']);
Route::post('/send-formD-user-report', [formDDtlCntrlr::class, 'rpMailSend']);


Route::get('/form-ca-registered', [formCADtlCntrlr::class, 'formCaDetails'])->name('formCaRegDetails');
Route::get('/form-ca-registered-details/{id}', [formCADtlCntrlr::class, 'viewFormCADetails']);
Route::get('/form-ca-documents/{id}', [formCADtlCntrlr::class, 'viewFormCADocDetails']);
Route::post('/form-ca-approval', [formCADtlCntrlr::class, 'formCADetailsApproval']);
Route::get('/delete-form-ca/{id}', [formCADtlCntrlr::class, 'removeFormCaDetails']);
Route::get('/form-ca-unregistered', [formCADtlCntrlr::class, 'formCaUnRegDetails'])->name('formCaUnRegDetails');
Route::get('/get-form-ca-pdf-report/{main_id}/{other_id}', [formCADtlCntrlr::class, 'getFormCAPdfReport']);
Route::get('/form-ca-mail-rp/{id}', [formCADtlCntrlr::class, 'rpMailInfoFormCA']);
Route::post('/send-formCA-user-report', [formCADtlCntrlr::class, 'rpMailSend']);


Route::get('/form-e-registered', [formEDtlCntrlr::class, 'formEDetails'])->name('formERegDetails');
Route::get('/form-e-registered-details/{id}', [formEDtlCntrlr::class, 'viewFormEDetails']);
Route::get('/form-e-documents/{id}', [formEDtlCntrlr::class, 'viewFormEDocDetails']);
Route::post('/form-e-approval', [formEDtlCntrlr::class, 'formEDetailsApproval']);
Route::get('/delete-form-e/{id}', [formEDtlCntrlr::class, 'removeFormEDetails']);
Route::get('/form-e-unregistered', [formEDtlCntrlr::class, 'formEUnRegDetails'])->name('formEUnRegDetails');
Route::get('/get-form-e-pdf-report/{main_id}/{other_id}', [formEDtlCntrlr::class, 'getFormEPdfReport']);
Route::get('/form-e-mail-rp/{id}', [formEDtlCntrlr::class, 'rpMailInfoFormE']);
Route::post('/send-formE-user-report', [formEDtlCntrlr::class, 'rpMailSend']);



Route::get('/form-f-registered', [formFDtlCntrlr::class, 'formFRegDetails'])->name('formFRegDetails');
Route::get('/form-f-registered-details/{id}', [formFDtlCntrlr::class, 'viewFormFDetails']);
Route::get('/form-f-documents/{id}', [formFDtlCntrlr::class, 'viewFormFDocDetails']);
Route::post('/form-f-approval', [formFDtlCntrlr::class, 'formFDetailsApproval']);
Route::get('/delete-form-f/{id}', [formFDtlCntrlr::class, 'removeFormFDetails']);
Route::get('/form-f-unregistered', [formFDtlCntrlr::class, 'formFUnRegDetails'])->name('formFUnRegDetails');
Route::get('/get-form-f-pdf-report/{main_id}/{other_id}', [formFDtlCntrlr::class, 'getFormFPdfReport']);
Route::get('/form-f-mail-rp/{id}', [formFDtlCntrlr::class, 'rpMailInfoFormF']);
Route::post('/send-formF-user-report', [formFDtlCntrlr::class, 'rpMailSend']);


Route::get('/forms_genertae_Report', [reportGenerateCntrl::class, 'formxsReport']);
Route::get('/forms_anexure_Report', [reportGenerateCntrlr::class, 'formxanexureReport']);
Route::post('/generateAnexaformreport', [reportGenerateCntrlr::class, 'generateAnexaformreport']);
Route::post('/generateformreport', [reportGenerateCntrlr::class, 'generateRdcseport']);



//my code start
Route::get('form-2', [formSCntrlr::class, 'index']);
Route::get('form-2-details', [formSCntrlr::class, 'form2list']);
Route::get('form-2/{id}', [formSCntrlr::class, 'form2_pdf']);
Route::get('form2-edit/{id}', [formSCntrlr::class, 'form2_edit']);
Route::get('/validate', [formSCntrlr::class, 'form2validation']);
Route::post('/updateform-2/{id}', [formSCntrlr::class, 'handleFormupdate']);
Route::get('/remove-form2-data/{id}', [formSCntrlr::class, 'removeForm2OtherData']);
Route::get('/remove-form2-file/{id}/{file}', [formSCntrlr::class, 'removeForm2Files']);

Route::get('/form-aa-list', [formAACntrlr::class, 'formaalist']);
Route::get('/form-aa/{id}', [formAACntrlr::class, 'formAAView']);


Route::get('form-2-timeline', [formTimelineSCntrlr::class, 'formTimeline']);
Route::get('form-2-timeline/{id}', [formTimelineSCntrlr::class, 'formTimelineEnteyDetails']);

Route::get('timeline', [formTimelineSCntrlr::class, 'Timeline']);

Route::get('form-2-processchat/{id}', [formTimelineSCntrlr::class, 'formTimelineprocesschat']);
Route::get('/dawnload_pdf/fortimeline/{id}', [formTimelineSCntrlr::class, 'generatepdf_timeline']);

Route::get('delete-form2/{id}', [formSCntrlr::class, 'form2_delete']);

Route::post('/postform-2', [formSCntrlr::class, 'handleFormSubmit']);


Route::get('/form_aa', [formAACntrlr::class, 'index']);
Route::get('delete_formaa/{id}', [formAACntrlr::class, 'form_aa_delete']);

Route::get('edit_formaa/{id}', [formAACntrlr::class, 'form_aa_edit']);
Route::post('/postformAA', [formAACntrlr::class, 'post_form_AA']);
Route::post('/updatepostformAA/{id}', [formAACntrlr::class, 'update_form_AA']);


Route::get('/fliter_assignments', [assignmentGenerateCntrlr::class, 'assignmentfilter']);
Route::get('/show_all_forms_filter', [reportGenerateCntrlr::class, 'formAllformfilter']);
Route::get('/assignments', [assignmentGenerateCntrlr::class, 'assignmentfetch']);


Route::get('/claimants', [claimentCntrlr::class, 'claimentfetch']);
Route::get('/fliter_claimentents', [claimentCntrlr::class, 'filter_claiment']);
Route::get('/fliter_company_dtl', [claimentCntrlr::class, 'fliterCompanyDtl']);


Route::get('/llp_master_data', [llpmaster_DtlCntrlr::class, 'index']);
Route::post('/submit_llp_form', [llpmaster_DtlCntrlr::class, 'postform']);
Route::get('/view_llp_master_data', [llpmaster_DtlCntrlr::class, 'fetch_llp_master']);
Route::get('/edit_llp/{id}', [llpmaster_DtlCntrlr::class, 'edit_llp_form']);
Route::post('/update_llp_form/{id}', [llpmaster_DtlCntrlr::class, 'update_llp_form']);
Route::get('/delete_llp/{id}', [llpmaster_DtlCntrlr::class, 'delete_llp_form']);

Route::get('dashboard-user/{id}',[case_cntrlr::class,'case']);
Route::get('company-todo-details/fetch-data', [case_cntrlr::class, 'companyWisefilterTodo']);
Route::get('company-details/{id}', [case_cntrlr::class, 'companyDetails']);
Route::get('ips-manager', [case_cntrlr::class, 'ipsDetails']);

Route::get('/cirp/{id}/add-company', [case_cntrlr::class, 'cirpAddCompany']);
Route::get('/cirp/{cid}/edit-company/{id}', [case_cntrlr::class, 'cirpEditCompany']);

//my case controller start
Route::get('reports/{id}',[case_cntrlr::class,'reportPdf']);
Route::get('forms-report/{id}',[case_cntrlr::class,'formReport']);
Route::get('forms-generate-report/{id}',[case_cntrlr::class,'formGenerateReport']);
Route::get('forms-annexure-report/{id}',[case_cntrlr::class,'formAnnexureReport']);

Route::get('nclt_pdf',[case_cntrlr::class,'ncltf']);
Route::get('/add_nclt/{id}',[case_cntrlr::class,'add_nclt']);
Route::get('nclt/{id?}',[case_cntrlr::class,'ncltf']);
Route::post('/submit_nclt', [case_cntrlr::class, 'submit_nclt'])->name('submit_nclt');
Route::get('edit-nclt/{id}',[case_cntrlr::class,'editNcltf']);
Route::post('/update-nclt/{id}', [case_cntrlr::class, 'updateNclt']);
Route::get('/delete_report_pdf/{id}', [case_cntrlr::class, 'delete_report_pdf'])->name('delete_report_pdf');


Route::get('coc-meeting/{id}',[case_cntrlr::class,'coc_meeting_pdf']);
Route::post('/submit_coc', [case_cntrlr::class, 'submitCoc']);
Route::get('edit-coc-meeting/{id}',[case_cntrlr::class,'editCoc']);
Route::post('/update-coc-meeting/{id}', [case_cntrlr::class, 'updateCoc']);
Route::get('/delete-coc-meeting/{id}', [case_cntrlr::class, 'deleteCoc'])->name('delete_report_pdf');


Route::post('/submit_nclt_pdf', [case_cntrlr::class, 'submit_nclt_pdf'])->name('submit_nclt_pdf');



Route::get('/delete_nclt_pdf/{id}', [case_cntrlr::class, 'delete_nclt_pdf'])->name('delete_nclt_pdf');



Route::post('/submit_coc_pdf', [case_cntrlr::class, 'submit_coc_pdf'])->name('submit_coc_pdf');

Route::get('/delete_coc_pdf/{id}', [case_cntrlr::class, 'delete_coc_pdf'])->name('delete_coc_pdf');


Route::get('notes/{id}',[case_cntrlr::class,'notes']);
Route::post('/submit_notes', [case_cntrlr::class, 'submit_notes'])->name('submit_notes');
Route::get('/delete_notes/{id}', [case_cntrlr::class, 'delete_notes'])->name('delete_notes');

Route::get('ip_forms/{id}',[case_cntrlr::class,'ip_forms']);
Route::get('formb/{id}',[case_cntrlr::class,'formb_list']);
Route::get('formc/{id}',[case_cntrlr::class,'formc_list']);
Route::get('formd/{id}',[case_cntrlr::class,'formd_list']);
Route::get('forme/{id}',[case_cntrlr::class,'forme_list']);
Route::get('formf/{id}',[case_cntrlr::class,'formf_list']);
Route::get('formca/{id}',[case_cntrlr::class,'formca']);

Route::get('edit_notes/{id}',[case_cntrlr::class,'edit_notes']);
Route::post('/submit_edit_notes', [case_cntrlr::class, 'submit_edit_notes'])->name('submit_edit_notes');


Route::get('/publication', [publishCntrlr::class, 'publications'])->name('publication');
Route::get('/publication/{id}', [publishCntrlr::class, 'publicationShow']);

Route::get('/create_publication_category', [publishCntrlr::class, 'create_publication_category'])->name('create_publication_category');
Route::post('/submit_publication', [publishCntrlr::class, 'subit_publication'])->name('submit_publication');


Route::get('/create_category_document/{cmid}/{ctid}', [publishCntrlr::class, 'create_category_document'])->name('create_category_document');
Route::post('/submit_category_document', [publishCntrlr::class, 'submit_category_document'])->name('submit_category_document');

Route::post('/update_publication_category', [publishCntrlr::class, 'update_publication_category'])->name('update_publication_category');


Route::get('/delete_category/{id}', [publishCntrlr::class, 'delete_publication_category'])->name('delete_category');

Route::get('/blank_formats', [publishCntrlr::class, 'blank_formats'])->name('blank_formats');
Route::post('/submit_blank_format', [publishCntrlr::class, 'submit_blank_format'])->name('submit_blank_format');


Route::get('/delete_blank_format/{id}', [publishCntrlr::class, 'delete_blank_format'])->name('delete_blank_format');

Route::get('/saved_publications/{id?}', [publishCntrlr::class, 'saved_publications'])->name('saved_publications');
Route::get('/edit-publication/{id}', [publishCntrlr::class, 'editPublications']);
Route::get('/update-publication/{id}', [publishCntrlr::class, 'updatePublications']);

Route::post('/update_publication_submit',[publishCntrlr::class,'update_publication_submit'])->name('update_blank_format');


Route::post('/submit_saved_publication/{id?}', [publishCntrlr::class, 'submit_saved_publication']);

Route::get('/delete_saved_publication/{id}', [publishCntrlr::class, 'delete_saved_publication'])->name('delete_saved_publication');




});




// user Dashboard starts


Route::get('/', [front::class, 'index'])->name('home')->middleware('userAuthCheck');

Route::post('/sign-up', [front::class, 'userSignUp']);
Route::post('/sign-up-otp', [front::class, 'userSignUpOtp']);
Route::post('/sign-in', [front::class, 'userSignIn']);

Route::get('/resend-sign-up', [front::class, 'signUpResend']);
Route::get('/resend-sign-in', [front::class, 'signInResend']);

Route::post('/forgot-password', [front::class, 'forgotPassword']);
Route::get('/change-password/{val}', [front::class, 'changePassword'])->name('changePassword');
Route::post('/change-password', [front::class, 'userChangePassword']);

Route::get('/sign-out', [front::class, 'logOut'])->name('signOut');

Route::get('form-g/{id}', [formGCntrlr::class, 'formGView']);
Route::get('/form-a/{id}', [front::class, 'formAView']);
Route::get('/form-aa/{id}', [front::class, 'formAAView']);
Route::get('/form-2/{id}', [front::class, 'form2View']);

Route::group(['middleware'=>['userLoginCheck']],function(){
Route::get('/form-apply', [front::class, 'formApply']);


Route::get('/dashboard', [User::class, 'index'])->name('userDashboard');
Route::get('/view-profile', [User::class, 'profile']);
Route::post('/user-profile', [User::class, 'updateProfile']);

Route::get('/user-change-password', [User::class, 'changePassword']);
Route::post('/user-change-password', [User::class, 'userchangePassword']);

Route::get('/form-b', [User::class, 'userFormB']);
Route::get('/send-formB-modification-request', [User::class, 'userFormBUpdateRequest']);
Route::get('/user-form-b-details/{id}', [User::class, 'userFormBDetails']);
Route::get('/get-form-b-pdf-report/{main_id}/{other_id}', [User::class, 'getFormBPdfReportUser']);

Route::get('/form-c', [User::class, 'userFormC']);
Route::get('/send-formC-modification-request', [User::class, 'userFormCUpdateRequest']);
Route::get('/user-form-c-details/{id}', [User::class, 'userFormCDetails']);
Route::get('/get-form-c-pdf-report/{main_id}/{other_id}', [User::class, 'getFormCPdfReportUser']);


Route::get('/form-d', [User::class, 'userFormD']);
Route::get('/user-form-d-details/{id}', [User::class, 'userFormDDetails']);
Route::get('/get-form-d-pdf-report/{main_id}/{other_id}', [User::class, 'getFormDPdfReportUser']);

Route::get('/form-e', [User::class, 'userFormE']);
Route::get('/user-form-e-details', [User::class, 'userFormEDetails']);
Route::get('/user-form-e-details/{id}', [User::class, 'userFormEDetails']);
Route::get('/get-form-e-pdf-report/{main_id}/{other_id}', [User::class, 'getFormEPdfReportUser']);

Route::get('/form-f', [User::class, 'userFormF']);
Route::get('/user-form-f-details', [User::class, 'userFormFDetails']);
Route::get('/user-form-f-details/{id}', [User::class, 'userFormFDetails']);
Route::get('/get-form-f-pdf-report/{main_id}/{other_id}', [User::class, 'getFormFPdfReportUser']);

Route::get('/form-ca', [User::class, 'userFormCA']);
Route::get('/send-formCA-modification-request', [User::class, 'userFormCaUpdateRequest']);
Route::get('/user-form-ca-details/{id}', [User::class, 'userFormCADetails']);
Route::get('/get-form-ca-pdf-report/{main_id}/{other_id}', [User::class, 'getFormCAPdfReportUser']);

Route::get('/send-form-modification-request', [User::class, 'userFormUpdateRequest']);

Route::get('/get-ip-details/{comp}', [front::class, 'getIpDtl']);


Route::get('/form', [front::class, 'registerForm']);

Route::post('/form/operational-creditor-form-b', [formBCntrlr::class, 'formBregistration']);
Route::get('/form/get-formb-updated-table', [formBCntrlr::class, 'getFormBUpdatedTable']);
Route::get('/remove-formb-data/{id}', [formBCntrlr::class, 'removeFormBData']);
Route::get('/get-formb-preview', [formBCntrlr::class, 'getFormBPreview']);
Route::get('/get-formb-preview-data', [formBCntrlr::class, 'getFormBPreviewData']);

Route::get('/remove-senction-data/{id}', [formBCntrlr::class, 'removeSenctionData']);

Route::post('/form/operational-creditor-form-b-submit', [formBCntrlr::class, 'formBregistrationSave']);
Route::post('/form/operational-creditor-form-b-save', [formBCntrlr::class, 'formBregistrationSubmit']);
Route::get('/get-formB-declaration', [formBCntrlr::class, 'formBDeclaration']);
Route::get('/get-formB-declaration-reg', [formBCntrlr::class, 'formBDeclarationReg']);
Route::post('/update-formb-file/{id}', [formBCntrlr::class, 'updateFile']);
Route::get('/form/get-formb-updated-fileData', [formBCntrlr::class, 'getFormBUpdatedFileData']);
Route::get('/get-formB-signature', [formBCntrlr::class, 'formBSignature']);

// form c financial_creditor_form_c

Route::post('/form/financial-creditor-form-c', [formCCntrlr::class, 'formCregistration']);
Route::post('/form/financial-creditor-form-c-save', [formCCntrlr::class, 'formCregistrationSave']);
Route::get('/get-formc-declaration', [formCCntrlr::class, 'formCDeclaration']);
Route::get('/get-formc-declaration-reg', [formCCntrlr::class, 'formCDeclarationReg']);

Route::get('/remove-formc-data/{id}', [formCCntrlr::class, 'removeFormCData']);
Route::get('/form/get-formc-updated-table', [formCCntrlr::class, 'getFormCUpdatedTable']);
Route::get('/get-formc-preview', [formCCntrlr::class, 'getFormCPreview']);
Route::post('/update-formc-file/{id}', [formCCntrlr::class, 'updateFile']);
Route::post('/form/financial-creditor-form-c-submit', [formCCntrlr::class, 'formCregistrationSubmit']);
Route::get('/form/get-formc-updated-fileData', [formCCntrlr::class, 'getFormCUpdatedFileData']);
Route::get('/get-formC-signature', [formCCntrlr::class, 'formCSignature']);
// form financial-creditor-form-ca

Route::post('/form/financial-creditor-form-ca', [formCaCntrlr::class, 'formCaRegistration']);
Route::post('/form/financial-creditor-form-ca-save', [formCaCntrlr::class, 'formCaregistrationSave']);
Route::get('/get-formca-declaration', [formCaCntrlr::class, 'formCaDeclaration']);
Route::get('/remove-formca-data/{id}', [formCaCntrlr::class, 'removeFormCaData']);
Route::get('/form/get-formca-updated-table', [formCaCntrlr::class, 'getFormCaUpdatedTable']);
Route::get('/form/get-formca-updated-fileData', [formCaCntrlr::class, 'getFormCaUpdatedFileData']);
Route::get('/get-formca-preview', [formCaCntrlr::class, 'getFormCaPreview']);
Route::post('/update-formca-file/{id}', [formCaCntrlr::class, 'updateFile']);
Route::post('/form/financial-creditor-form-ca-submit', [formCaCntrlr::class, 'formCaRegistrationSubmit']);
Route::get('/get-formCA-signature', [formCaCntrlr::class, 'formCASignature']);

// form D

Route::post('/form/financial-creditor-form-d', [formDCntrlr::class, 'formDRegistration']);
Route::post('/form/financial-creditor-form-d-save', [formDCntrlr::class, 'formDregistrationSave']);
Route::get('/get-formD-declaration', [formDCntrlr::class, 'formDDeclaration']);
Route::get('/remove-formD-data/{id}', [formDCntrlr::class, 'removeFormDData']);
Route::get('/form/get-formD-updated-table', [formDCntrlr::class, 'getFormDUpdatedTable']);
Route::get('/form/get-formd-updated-fileData', [formDCntrlr::class, 'getFormDUpdatedFileData']);
Route::get('/get-formD-preview', [formDCntrlr::class, 'getFormDPreview']);
Route::post('/update-formD-file/{id}', [formDCntrlr::class, 'updateFile']);
Route::post('/form/financial-creditor-form-d-submit', [formDCntrlr::class, 'formDRegistrationSubmit']);
Route::get('/get-formD-signature', [formDCntrlr::class, 'formDSignature']);

// form E

Route::post('/form/financial-creditor-form-e', [formECntrlr::class, 'formERegistration']);
Route::post('/form/financial-creditor-form-e-save', [formECntrlr::class, 'formEregistrationSave']);
Route::get('/get-formE-declaration', [formECntrlr::class, 'formEDeclaration']);
Route::get('/remove-formE-data/{id}', [formECntrlr::class, 'removeFormEData']);
Route::get('/form/get-formE-updated-table', [formECntrlr::class, 'getFormEUpdatedTable']);
Route::get('/form/get-forme-updated-fileData', [formECntrlr::class, 'getFormEUpdatedFileData']);
Route::get('/get-formE-preview', [formECntrlr::class, 'getFormEPreview']);
Route::post('/update-formE-file/{id}', [formECntrlr::class, 'updateFile']);
Route::post('/form/financial-creditor-form-e-submit', [formECntrlr::class, 'formERegistrationSubmit']);
Route::get('/get-formE-signature', [formECntrlr::class, 'formESignature']);

// form other_creditor_form_f


Route::post('/form/financial-creditor-form-f', [formFCntrlr::class, 'formFRegistration']);
Route::post('/form/financial-creditor-form-f-save', [formFCntrlr::class, 'formFregistrationSave']);
Route::get('/get-formf-declaration', [formFCntrlr::class, 'formFDeclaration']);
Route::get('/remove-formf-data/{id}', [formFCntrlr::class, 'removeFormFData']);
Route::get('/form/get-formf-updated-table', [formFCntrlr::class, 'getFormFUpdatedTable']);
Route::get('/get-formf-preview', [formFCntrlr::class, 'getFormFPreview']);
Route::post('/update-formf-file/{id}', [formFCntrlr::class, 'updateFile']);
Route::post('/form/financial-creditor-form-f-submit', [formFCntrlr::class, 'formFRegistrationSubmit']);
Route::get('/form/get-formf-updated-fileData', [formFCntrlr::class, 'getFormFUpdatedFileData']);
Route::get('/get-formF-signature', [formFCntrlr::class, 'formFSignature']);








// Route::post('/submit_workmen_and_employee', [Work_employee::class, 'submit_workmen_and_employee']);
// Route::post('submit_workmen_and_employee_doc', [Work_employee::class, 'submit_workmen_and_employee_do']);
// Route::get('/delete_multi_docs', [Work_employee::class, 'submit_workmen_and_employee_delete_multi_docs']);


Route::post('/submit_workmen_and_employee', [Work_employee::class, 'submit_workmen_and_employee']);
Route::post('submit_workmen_and_employee_doc', [Work_employee::class, 'submit_workmen_and_employee_do']);
Route::get('/delete_multi_docs', [Work_employee::class, 'submit_workmen_and_employee_delete_multi_docs']);
Route::get('form_final_submit_',[Work_employee::class, 'form_final_submit_']);
Route::get('get_multidocs_delete_append',[Work_employee::class, 'mutidocs_detete_btn']);

});
















