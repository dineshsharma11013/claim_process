<?php 

return [


    'no_data' => "There is no data.",
    'no_submit'=> 'There is no submittion.',
    'mail_from' => 'dineshkumar@jigsaw.edu.in',//'mail@ipsupport.in',
    'creditor_types' => [
        '' => 'Type Of Creditors',
        'operational-creditor' => 'Operational creditor',
        'financial-creditor' => 'Financial Creditor',
        'financial-creditor-in-a-class' => 'Financial Creditor in a Class',
        'workmen-and-employee' => 'Workmen and employee',
        'authorised-representative-of-workmen-and-employee' => 'Authorised Representative of Workmen and Employee',
        'other-creditor' => 'Other Creditors',
    ],  
    
    'form_creditor_type' => [
        '' => 'Please Select',
        'individual' => 'Individual',
        'company' => 'company',
        'llp' => 'LLP',
        'others' => 'Others',
    ],

     'cases' => [
        '' => 'Select Assignment',
        'Upcomming' => 'Upcomming',
        'Live' => 'Live'
    ],   
    'claimant_type'=>[
        'claimant'=>'Claimant',
        'coc'=>'COC Member'
    ],

    'task_status' => [
        'pending' => 'Pending',
        'completed' => 'Completed',
        'in_process'=>'In Process',
        'submitted'=>'Submit',
        'new' => 'New'
    ],

    'task_status_team' => [
        'pending' => 'Pending',
        'submitted' => 'Submit'
    ],

    'task_status_ip' => [
        'completed' => 'Completed',
        'in_process'=>'In Process',
        'on_hold' => 'On Hold',
    ],

    'teamCase' => [
        'formPublication'=>'Forms & Publications',
        'claimProcess' => 'Claim Process',
        'nclt' => 'NCLT',
        'cocMeeting' => 'CoC Meeting',
        'authentication' => 'Authentication',
        'professional_emp' => 'Professional Empanelment',
        'forms' => 'Forms',
        'todoList' => 'To-Do List',
        'notes' => 'Notes'
    ],

        'fpl'=>'formPublication',
        'cPr' => 'claimProcess',
        'nclt' => 'nclt',
        'cocM' => 'cocMeeting',
        'ath' => 'authentication',
        'pemp' => 'professional_emp',
        'frms' => 'forms',
        'todoList' => 'todoList',
        'notes' => 'notes',


    'priority'=>[
        'high'=>'High',
        'medium'=>'Medium',
        'low'=>'Low'
    ],

    'status' => [
        '' => 'Please Select',
        '1' => 'Active',
        '2' => 'De-active',
    ],
    'status_2' => [
        '1' => 'Active',
        '2' => 'De-active',
    ], 
    'form_aa_section'=>[
        ''=>'',
        'DMRC'=>'DMRC',
        '22(3)(a)'=>'22(3)(a)',
        '27(2)'=>'27(2)'
    ],

    'form2_section' =>[
        ''=>'Choose Section',
        'sec-7'=>'Sec-7',
        'sec-8'=>'Sec-8',
        'sec-9'=>'Sec-9',
        'sec-34'=>'Sec-34',
    ],

    'admin_type'=>[
        '1'=>'admin',
        '2'=>'ip',
        '3'=>'ipe',
        '4'=>'team'
    ],

    'emp_type'=>[
        'sb'=>'SB',
        'jg'=>'JG'
    ],

    'allFormList'=>[
 
        'Form B'=>'Form B',
        'Form C'=>'Form C',
        'Form D'=>'Form D',
        'Form CA'=>'Form CA',
        'Form E'=>'Form E',
        'Form F'=>'Form F',
        
        ],

        'budget'=>[
       
        'Equal'=>'Equal',
        'Not Equal'=>'Not Equal',
        'Less'=>'Less',
        'Less or Equal'=>'Less or Equal',
        'Greater'=>'Greater',
        'Greater or Equal'=>'Greater or Equal',
        'Between'=>'Between'
        ],

    'rp_status' => [
        '' =>'Please Select',
        '1' => 'Active',
        '2' => 'De-active',
        '3' => 'Block',
    ],     
    

    'user_type' => [
        '' => 'Select Type',
        '1' => 'Admin',
        '2' => 'Irp',
    ], 

    'auth_type' => [
        'sms' => 'Sms',
        'email' => 'Email',
        'both' => 'Both',
        'none' => 'None',
    ], 

    'formNameanaxuee' => [
        'form-ca-secured' => 'Secured financial creditor belonging to any class of creditor FORM-CA',
        'form-ca-unsecured' => 'Unsecured financial creditor belonging to any class of creditor FORM-CA',
        'form-c-secured' => 'secured financial creditor (other than financial belonging to any class of creditor) FORM-C',
        'form-c-unsecured' => 'Unsecured financial creditor (other than financial belonging to any class of creditor) FORM-C',
        'form-d-workmen' => 'Operational creditor (Workmen) form D',
        'form-d-employee' => 'Operational creditor (Employee) form D',
        'form-b-government-dues' => 'Operational creditor (government dues)',
        'form-b-other-than-government-dues' => 'Operational creditor (other than workmen and Employee and government dues) ',
        'form-f-other-than-financial-creditor' => 'Other creditor, if any , (other than financial creditor and operational creditor)',
    ],

    'formEmailAuth'=>[
        'email'=>'Email',
        'none'=>'None'
    ],

    'comp' => '*',
    
    'total_rc'=>'10',     
    'total_records' => [
        '10' => '10',
        '20' => '20',
        '50' => '50',
        '100' => '100',
        '200' => '200',
        '500' => '500',
    ],

    'identification_type' => [
        '1' => 'Pan card',
        '2' => 'Passport',
        '3' => 'Aadhar card',
    ],

    'approval_status' => [
        '1' => 'Approved',
        '2' => 'Pending',
        '3' => 'Rejected',
    ],

    'designation'=>[
        ''=>'Please Select',
        'AR'=>'AR',
        'IRP'=>'IRP',
        'RP'=>'RP',
    ],

    'formTypesFilter' => [
        'all' => 'All',
        'form-b' => 'Form B',
        'form-c' => 'Form C',
        'form-d' => 'Form D',
        'form-e' => 'Form E',
        'form-f' => 'Form F',
        'form-ca' => 'Form CA',
    ],

    'formNames' => [
        'form-b' => 'Form B',
        'form-c' => 'Form C',
        'form-d' => 'Form D',
        'form-e' => 'Form E',
        'form-f' => 'Form F',
        'form-ca' => 'Form CA',
    ],

    'formTypes' =>[
        'basic' => 'Basic Info',
        'claimed' => 'Claimed Amount',
        'covered' => 'Covered Amount',
    ],

    'empType'=>[
        'employee'=>'Employee',
        'workman'=>'Workman',
    ],

    'unauthourised'=>'Unauthourised User',

    // js validation
    'formAMethod' => 'formA',
    'formGMethod' => 'formG',
    'formBMethod' => 'formB',
    'adminGeneral' => 'adminGeneral',
    'reportPdf' => 'reportPdf',
    'ipGeneral' => 'ipGeneral',
    'adminChangePassword' => 'adminChangePassword',
    'caseAssign' => 'caseAssign',
   
    'companyVal'  => 'companyVal',
    'todoVal' => 'todoValidation',
    'todoValSub' => 'todoValidationSub',
    'arValidation' => 'arValidation',
    'authenticate' => 'authenticate',
    'UserFormSubmission' => 'UserFormSubmission',
    'irpValidate'  => 'irpValidate',
    'irpValidate2'  => 'irpValidate2',
    'irpUserValidate'  => 'irpUserValidate',
    'UserValidate'   => 'UserValidate',
    'sabredgeValidate' => 'sabredgeValidate',
    'employeeValidate' => 'employeeValidate',
    'formBApprovalValidate' => 'formBApprovalValidate',
    'formCApprovalValidate' => 'formCApprovalValidate',
    'formDApprovalValidate' => 'formDApprovalValidate',
    'assignValidation' => 'assignValidation',
    'form2V' => 'form2',
    'formAA' => 'formAA',
    'llpData' =>'llpData',
    
    // end js validation

    // js file admin

    'login' => 'public/access/js/login',
    'general' => 'public/access/js/general',
    'formA' => 'public/access/js/formA',
    'userPaginate' => 'public/access/js/userPaginate',
    'formBApproval' => 'public/access/js/admin/formB',
    'mailRP' => 'public/access/js/admin/mailRP',

    // end js file

    'claimantFilter' => 'public/access/js/claimantFilter',

    // admin pdf report

    'formBReport' => 'public/access/js/admin/report/formB',   
    'formCReport' => 'public/access/js/admin/report/formC',   

    // end admin pdf report

    'formBReportUser' => 'public/access/js/admin/report/formBUser',

    // js file front validation

    'authF' => 'public/access/js/front/validation/auth',
    'formB' => 'public/access/js/front/validation/formB',
    'formC' => 'public/access/js/front/validation/formC',
    'formD' => 'public/access/js/front/validation/formD',
    'formCa' => 'public/access/js/front/validation/formCa',
    'formF' => 'public/access/js/front/validation/formF',
    'formE' => 'public/access/js/front/validation/formE',

    'userChangePassword' => 'public/access/js/user/validation/userChangePassword',
    'userChangeProfile' => 'public/access/js/user/validation/userChangeProfile',

    // end js file front validation

    // js file front

    'changePassword' => 'public/access/js/user/changePassword',
    'userProfile' => 'public/access/js/user/userProfile',

    'formBRequestEdit' => 'public/access/js/user/formBRequestEdit',


    'auth' => 'public/access/js/front/auth',
    'operationalCreditor' => 'public/access/js/front/operational_creditor',
    'operationalCreditorV' => 'public/access/js/front/operational_creditorV',
    'financialCreditorFormC' => 'public/access/js/front/financial_creditor_form_c',
    'financialCreditorFormCV' => 'public/access/js/front/financial_creditor_form_cV',
    'financialCreditorFormD' => 'public/access/js/front/financial_creditor_form_d',
    'financialCreditorFormDV' => 'public/access/js/front/financial_creditor_form_dV',

    'formHandling' => 'public/access/js/front/formHandling',


    'financialCreditorFormCA' => 'public/access/js/front/financial_creditor_form_ca',
    'financialCreditorFormCAV' => 'public/access/js/front/financial_creditor_form_caV',
    'financialCreditorFormF' => 'public/access/js/front/financial_creditor_form_f',
    'financialCreditorFormFV' => 'public/access/js/front/financial_creditor_form_fV',
    'financialCreditorFormE' => 'public/access/js/front/financial_creditor_form_e',
    'financialCreditorFormEV' => 'public/access/js/front/financial_creditor_form_eV',
    
    // end js file front

    // bootstrap
        
    'addDataBtn' => 'btn bg-maroon btn-flat margin text-uppercase btn-sm',
    'addRvtDataBtn' => 'btn bg-danger margin text-uppercase btn-sm',
    'editDataBtn' => 'btn btn-primary btn-sm',
    'viewDataBtn' => 'btn btn-info btn-sm',
    'deleteDataBtn' => 'btn btn-danger btn-sm',
    'detailBtn' => 'btn bg-purple btn-sm',


    'signUpBtn' => 'btn btn-primary btn-flat m-b-30 m-t-30 mb-2',

    'btnPrimary' => 'btn-primary btn-sm',
    'btnSuccess' => 'btn-success btn-sm',

    'oneDiv' => 'col-md-1',
    'twoDiv' => 'col-md-2',
    'threeDiv' => 'col-md-3',
    'fourDiv' => 'col-md-4',
    'sixDiv' => 'col-md-6',
    'twelveDiv' => 'col-md-12',

    // end bootstrap
    'accMdl' => 'general_info_mdls',
    'userSubAuth' => 'user_form_submission_auth_mdls',

    'logMdl' => 'log_mdls',
    'formBMdl' => 'operational_creditor_mdls',
    'formBFile' => 'form_b_files_mdls',
    'formBOtherDoc' => 'form_b_other_documents_mdls',
    'formBSenctionMdl' => 'form_b_senction_mdls',
    'formBDecTblMdl'=>'form_b_declaration_table_mdls',

    'userMdl' => 'user_mdls',
    'formAMdl' => 'form_a_mdls',
    'mailSentMdl' => 'mail_sent_mdls',
    'authMdl' =>'authentication_mdls',
    
    'formCMdl' => 'finanicial_creditor_form_c_mdls',
    'formCFile' => 'form_c_files_mdls',
    'formCOtherDoc' => 'form_c_other_document_mdls',
    'formCSenctionMdl' => 'form_c_senction_mdls',
    'formCDecTblMdl'=>'form_c_declaration_table_mdls',
    
    'formCaMdl' => 'financial_creditor_form_ca_mdls',
    'formCaFile' => 'form_ca_files_mdls',
    'formCaOtherDoc' => 'form_ca_other_document_mdls',
    'formCASenctionMdl' => 'form_c_a_senction_mdls',
    'formCADecTblMdl'=>'form_c_a_declaration_table_mdls',

    'formFMdl' => 'other_creditor_form_f_mdls',
    'formFFile' => 'form_f_files_mdls',
    'formFOtherDoc' => 'form_f_other_document_mdls',
    'formFSenctionMdl' => 'form_f_senction_mdls',
    'formFDecTblMdl'=>'form_f_declaration_table_mdls',

    'formEMdl' => 'form_e_file_mdls',
    'formEOtherDoc' => 'form_e_other_document_mdls',
    'formEEmpDtl' => 'form_e_employee_detail_mdls',
    'formESenctionMdl' => 'form_e_senction_mdls',
    'formEDecTblMdl'=>'form_e_declaration_table_mdls',

    'formDMdl' => 'form_d_mdls',
    'formDFile' => 'form_d_files_mdls',
    'formDOtherDoc' => 'form_d_other_document_mdls',
    'formDSenctionMdl' => 'form_d_senction_mdls',
    'formDDecTblMdl'=>'form_d_declaration_table_mdls',

    'formModificationMdls' => 'form_modification_mdls',

    'userFormAuth' => 'user_form_submission_auth_mdls',


    'acceptFile' => 'image/*,.pdf,.doc,.docx,audio/*,video/*,text/plain,text/html,.xlsx, .xls, .csv',

    

    'userType' => 'User',
    'adminType' => 'Admin',

    'action_insert' => 'Insert',
    'action_update' => 'Update',
    'action_delete' => 'Delete',

    'action_success' => 'Success',
    'action_fail' =>  'Fail',

    'pages' => [
        'dashboard' => 'Dashboard',
        'general_info' => 'General Info',
        'sabredge_representative' => 'Sabredge Representative',
        'ar_details' => 'AR Details',
        'authentication' => 'Authentication',
        'ip_details' => 'IP Details',
        'ip_user_details' => 'IP User Details',
        'company_details' => 'Company Details',
        'assign_ip' => 'Assign IP',
        'form_a' => 'Form A',
        'user_types' => 'User Types',
        'user_details' => 'User Details',
        'form_b_registered' => 'Form B Registered',
        'form_b_unregistered' => 'Form B Unregistered',
        'form_c_registered' => 'Form C Registered',
        'form_c_unregistered' => 'Form C Unregistered',
        'form_d_registered' => 'Form D Registered',
        'form_d_unregistered' => 'Form D Unregistered',
        'form_e_registered' => 'Form E Registered',
        'form_e_unregistered' => 'Form E Unregistered',
        'form_f_registered' => 'Form F Registered',
        'form_f_unregistered' => 'Form F Unregistered',
        'form_ca_registered' => 'Form CA Registered',
        'form_ca_unregistered' => 'Form CA Unregistered',

    ], 



];

?>