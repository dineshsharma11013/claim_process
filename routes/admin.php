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

use App\Http\Controllers\admin\formCDtlCntrlr;
use App\Http\Controllers\admin\formDDtlCntrlr;
use App\Http\Controllers\admin\formCADtlCntrlr;
use App\Http\Controllers\admin\formEDtlCntrlr;
use App\Http\Controllers\admin\formFDtlCntrlr;


Route::get('/login', [generalInfoCntrlr::class, 'login'])->middleware('adminLoginCheck');
Route::post('/login', [generalInfoCntrlr::class, 'loginUser'])->middleware('adminLoginCheck');

Route::group(['middleware'=>'AdminCheck'],function(){
Route::get('/', [generalInfoCntrlr::class, 'index'])->name('adminDashboard');

Route::get('sign-out', [generalInfoCntrlr::class, 'logout']);

Route::get('/general-info', [generalInfoCntrlr::class, 'generalInfo'])->name('generalInfo');
Route::post('/save-general-info', [generalInfoCntrlr::class, 'saveData'])->name('saveData');

Route::post('update-general-info/{id}', [generalInfoCntrlr::class, 'updateData']);
Route::post('remove-banner/{id}/{banner}', [generalInfoCntrlr::class, 'removeBanner']);

Route::get('form-a-details', [formACntrlr::class, 'index']);
Route::get('form-a', [formACntrlr::class, 'addData']);
Route::post('form-a', [formACntrlr::class, 'saveData']);
Route::get('edit-form-a/{id}', [formACntrlr::class, 'editData']);
Route::post('update-form-a', [formACntrlr::class, 'updateData']);
Route::get('delete-form-a/{id}', [formACntrlr::class, 'deleteData']);

Route::get('sabredge-representative', [sabredgerepCntrlr::class, 'index']);
Route::get('add-sabredge-representative', [sabredgerepCntrlr::class, 'addData']);
Route::post('save-sabredge-representative', [sabredgerepCntrlr::class, 'saveData']);
Route::get('sabredge-representative-delete-record/{id}', [sabredgerepCntrlr::class, 'deleteData']);
Route::get('edit-sabredge-representative/{id}', [sabredgerepCntrlr::class, 'editData']);
Route::post('update-sabredge-representative/{id}', [sabredgerepCntrlr::class, 'updateData']);

Route::get('/ip-details', [irpCntrlr::class, 'irpDetails'])->name('irpDetails');
Route::get('/add-ip', [irpCntrlr::class, 'addIrp'])->name('addIrp');
Route::post('/add-ip', [irpCntrlr::class, 'saveIrp'])->name('saveIrp');
Route::get('/edit-ip/{id}', [irpCntrlr::class, 'editIrp'])->name('editIrp');
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
Route::get('/assign-ip', [assignCompanyCntrlr::class, 'addAssignIp'])->name('addAssignIp');
Route::post('/assign-ip', [assignCompanyCntrlr::class, 'saveAssignIp'])->name('saveAssignIp');
Route::get('/edit-assign-ip/{id}', [assignCompanyCntrlr::class, 'editAssignIp'])->name('editAssignIp');
Route::post('/edit-assign-ip/{id}', [assignCompanyCntrlr::class, 'updateAssignIp'])->name('updateAssignIp');
Route::get('/delete-assign-ip/{id}', [assignCompanyCntrlr::class, 'deleteAssignIp'])->name('deleteAssignIp');

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


Route::get('/user-types', [userTypeCntrlr::class, 'userTypeDetails'])->name('userTypeDetails');
Route::get('/add-user-type', [userTypeCntrlr::class, 'addUserType'])->name('addUserType');
Route::post('/add-user-type', [userTypeCntrlr::class, 'saveUserType'])->name('saveUserType');
Route::get('/edit-user-type/{id}', [userTypeCntrlr::class, 'editUserType'])->name('editUserType');
Route::post('/edit-user-type/{id}', [userTypeCntrlr::class, 'updateUserType'])->name('updateUserType');
Route::get('/delete-user-type/{id}', [userTypeCntrlr::class, 'deleteUserType'])->name('deleteUserType');

Route::get('authentication', [authenticationCntrlr::class, 'index']);
Route::post('save-authentication', [authenticationCntrlr::class, 'saveData']);
Route::post('save-authentication/{id}', [authenticationCntrlr::class, 'saveData']);

Route::get('/user-details', [UserCntrlr::class, 'userDetails'])->name('userDetails');
Route::get('/add-user', [UserCntrlr::class, 'addUser'])->name('addUser');
Route::post('/add-user', [UserCntrlr::class, 'saveUser'])->name('saveUser');
Route::get('/edit-user/{id}', [UserCntrlr::class, 'editUser'])->name('editUser');
Route::post('/edit-user/{id}', [UserCntrlr::class, 'updateUser'])->name('updateUser');
Route::get('/delete-user/{id}', [UserCntrlr::class, 'deleteUser'])->name('deleteUser');
Route::get('user-info-pagination/fetch_data', [UserCntrlr::class, 'userDetailsByData']);
Route::get('user-details/fetch-data', [UserCntrlr::class, 'filterDetails']);
Route::get('delete-selected-users/{id}', [UserCntrlr::class, 'deleteSelectedUsers']);
Route::get('update-users-status/{st}/{id}', [userCntrlr::class, 'updateSelectedUsers']);
Route::get('edit-user-info/{id}', [userCntrlr::class, 'editUserInfo']);
Route::get('search-user-data/{nm}', [userCntrlr::class, 'searchUserInfo']);

// Form details


Route::get('/form-b', [formBDtlCntrlr::class, 'formBDetails'])->name('formBDetails');
Route::post('/form-b-approval', [formBDtlCntrlr::class, 'formBDetailsApproval']);



Route::get('/form-b-registered', [formBDtlCntrlr::class, 'formBDetails'])->name('formBRegDetails');
Route::get('/form-b-registered-details/{id}', [formBDtlCntrlr::class, 'viewFormBDetails']);
Route::get('/form-b-mail-rp/{id}', [formBDtlCntrlr::class, 'rpMailInfo']);
Route::post('/send-formB-user-report', [formBDtlCntrlr::class, 'rpMailSend']);
Route::get('/delete-form-b/{id}', [formBDtlCntrlr::class, 'removeFormBDetails']);
Route::get('/form-b-unregistered', [formBDtlCntrlr::class, 'formBUnRegDetails'])->name('formBUnRegDetails');
Route::get('/get-form-b-pdf-report/{main_id}/{other_id}', [formBDtlCntrlr::class, 'getFormBPdfReport']);


Route::get('/form-c-registered', [formCDtlCntrlr::class, 'formCDetails'])->name('formCRegDetails');
Route::get('/form-c-registered-details/{id}', [formCDtlCntrlr::class, 'viewFormCDetails']);
Route::post('/form-c-approval', [formCDtlCntrlr::class, 'formCDetailsApproval']);
Route::get('/delete-form-c/{id}', [formCDtlCntrlr::class, 'removeFormCDetails']);
Route::get('/form-c-unregistered', [formCDtlCntrlr::class, 'formCUnRegDetails'])->name('formCUnRegDetails');
Route::get('/get-form-c-pdf-report/{main_id}/{other_id}', [formCDtlCntrlr::class, 'getFormCPdfReport']);

Route::get('/form-d-registered', [formDDtlCntrlr::class, 'formDDetails'])->name('formDRegDetails');
Route::get('/form-d-registered-details/{id}', [formDDtlCntrlr::class, 'viewFormDDetails']);
Route::post('/form-d-approval', [formDDtlCntrlr::class, 'formDDetailsApproval']);
Route::get('/delete-form-d/{id}', [formDDtlCntrlr::class, 'removeFormDDetails']);
Route::get('/form-d-unregistered', [formDDtlCntrlr::class, 'formDUnRegDetails'])->name('formDUnRegDetails');
Route::get('/get-form-d-pdf-report/{main_id}/{other_id}', [formDDtlCntrlr::class, 'getFormDPdfReport']);

Route::get('/form-ca-registered', [formCADtlCntrlr::class, 'formCaDetails'])->name('formCaRegDetails');
Route::get('/form-ca-registered-details/{id}', [formCADtlCntrlr::class, 'viewFormCADetails']);
Route::post('/form-ca-approval', [formCADtlCntrlr::class, 'formCADetailsApproval']);
Route::get('/delete-form-ca/{id}', [formCADtlCntrlr::class, 'removeFormCaDetails']);
Route::get('/form-ca-unregistered', [formCADtlCntrlr::class, 'formCaUnRegDetails'])->name('formCaUnRegDetails');
Route::get('/get-form-ca-pdf-report/{main_id}/{other_id}', [formCADtlCntrlr::class, 'getFormCAPdfReport']);

Route::get('/form-e-registered', [formEDtlCntrlr::class, 'formEDetails'])->name('formERegDetails');
Route::get('/form-e-registered-details/{id}', [formEDtlCntrlr::class, 'viewFormEDetails']);
Route::post('/form-e-approval', [formEDtlCntrlr::class, 'formEDetailsApproval']);
Route::get('/delete-form-e/{id}', [formEDtlCntrlr::class, 'removeFormEDetails']);
Route::get('/form-e-unregistered', [formEDtlCntrlr::class, 'formEUnRegDetails'])->name('formEUnRegDetails');
Route::get('/get-form-e-pdf-report/{main_id}/{other_id}', [formEDtlCntrlr::class, 'getFormEPdfReport']);

Route::get('/form-f-registered', [formFDtlCntrlr::class, 'formFRegDetails'])->name('formFRegDetails');
Route::get('/form-f-registered-details/{id}', [formFDtlCntrlr::class, 'viewFormFDetails']);
Route::post('/form-f-approval', [formFDtlCntrlr::class, 'formFDetailsApproval']);
Route::get('/delete-form-f/{id}', [formFDtlCntrlr::class, 'removeFormFDetails']);
Route::get('/form-f-unregistered', [formFDtlCntrlr::class, 'formFUnRegDetails'])->name('formFUnRegDetails');
Route::get('/get-form-f-pdf-report/{main_id}/{other_id}', [formFDtlCntrlr::class, 'getFormFPdfReport']);











});



