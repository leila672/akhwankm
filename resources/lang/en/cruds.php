<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'user_type'                => 'User Type',
            'user_type_helper'         => ' ',
            'cv'                       => 'Cv',
            'cv_helper'                => ' ',
            'identity_number'          => 'Identity Number',
            'identity_number_helper'   => ' ',
            'identity_date'            => 'Identity Date',
            'identity_date_helper'     => ' ',
            'dbo'                      => 'Date Of Birth',
            'dbo_helper'               => ' ',
            'country'                  => 'Country',
            'country_helper'           => ' ',
            'city'                     => 'City',
            'city_helper'              => ' ',
            'phone'                    => 'Phone',
            'phone_helper'             => ' ',
            'address'                  => 'Address',
            'address_helper'           => ' ',
            'gender'                   => 'Gender',
            'gender_helper'            => ' ',
            'marital_status'           => 'Marital Status',
            'marital_status_helper'    => ' ',
            'degree'                   => 'Degree',
            'degree_helper'            => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'smallBrother' => [
        'title'          => 'Small Brother',
        'title_singular' => 'Small Brother',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'user'                   => 'user',
            'user_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'skills'                 => 'Skills',
            'skills_helper'          => ' ',
            'big_brother'            => 'Big Brother',
            'big_brother_helper'     => ' ',
            'charactaristics'        => 'Charactaristics',
            'charactaristics_helper' => ' ',
            'temp'                   => 'Temp',
            'temp_helper'            => ' ',
        ],
    ],
    'bigBrother' => [
        'title'          => 'Big Brother',
        'title_singular' => 'Big Brother',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'user'                      => 'email',
            'user_helper'               => ' ',
            'job'                       => 'Job',
            'job_helper'                => ' ',
            'job_place'                 => 'Job Place',
            'job_place_helper'          => ' ',
            'salary'                    => 'Salary',
            'salary_helper'             => ' ',
            'family_male'               => 'male family members',
            'family_male_helper'        => ' ',
            'family_female'             => 'male family members',
            'family_female_helper'      => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'brotherhood_reason'        => 'Brotherhood Reason',
            'brotherhood_reason_helper' => ' ',
            'charactarstics'            => 'Charactarstics',
            'charactarstics_helper'     => ' ',
            'skills'                    => 'Skills',
            'skills_helper'             => ' ',
        ],
    ],
    'skill' => [
        'title'          => 'Skills',
        'title_singular' => 'Skill',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_ar'           => 'Name Ar',
            'name_ar_helper'    => ' ',
            'name_en'           => 'Name En',
            'name_en_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'characteristic' => [
        'title'          => 'Characteristics',
        'title_singular' => 'Characteristic',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_ar'           => 'Name Ar',
            'name_ar_helper'    => ' ',
            'name_en'           => 'Name En',
            'name_en_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'outingType' => [
        'title'          => 'Outing Type',
        'title_singular' => 'Outing Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_ar'           => 'Name Ar',
            'name_ar_helper'    => ' ',
            'name_en'           => 'Name En',
            'name_en_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'brothersDealForm' => [
        'title'          => 'Brothers Deal Form',
        'title_singular' => 'Brothers Deal Form',
        'fields'         => [
            'id'                                  => 'ID',
            'id_helper'                           => ' ',
            'day'                                 => 'Day',
            'day_helper'                          => ' ',
            'department_of_social_service'        => 'Department Of Social Service',
            'department_of_social_service_helper' => ' ',
            'executive_committee'                 => 'Executive Committee',
            'executive_committee_helper'          => ' ',
            'social_worker'                       => 'Social Worker',
            'social_worker_helper'                => ' ',
            'executive_director'                  => 'Executive Director',
            'executive_director_helper'           => ' ',
            'big_brother'                         => 'Big Brother',
            'big_brother_helper'                  => ' ',
            'small_brother'                       => 'Small Brother',
            'small_brother_helper'                => ' ',
            'approvement_form'                    => 'Approvement Form',
            'approvement_form_helper'             => ' ',
            'created_at'                          => 'Created at',
            'created_at_helper'                   => ' ',
            'updated_at'                          => 'Updated at',
            'updated_at_helper'                   => ' ',
            'deleted_at'                          => 'Deleted at',
            'deleted_at_helper'                   => ' ',
        ],
    ],
    'outingRequest' => [
        'title'          => 'Outing Request',
        'title_singular' => 'Outing Request',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'outing_type'          => 'Outing Type',
            'outing_type_helper'   => ' ',
            'start_date'           => 'Start Date',
            'start_date_helper'    => ' ',
            'end_date'             => 'End Date',
            'end_date_helper'      => ' ',
            'place'                => 'Place',
            'place_helper'         => ' ',
            'reason'               => 'Reason',
            'reason_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'late'                 => 'Late',
            'late_helper'          => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'outing_date'          => 'Outing Date',
            'outing_date_helper'   => ' ',
            'done_time'            => 'Done Time',
            'done_time_helper'     => ' ',
            'big_brother'          => 'Big Brother',
            'big_brother_helper'   => ' ',
            'small_brother'        => 'Small Brother',
            'small_brother_helper' => ' ',
        ],
    ],
    'approvementForm' => [
        'title'          => 'Approvement Form',
        'title_singular' => 'Approvement Form',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'specialist'                => 'Specialist',
            'specialist_helper'         => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'brothers_deal_form'        => 'Brothers Deal Form',
            'brothers_deal_form_helper' => ' ',
            'reason'                    => 'Reason',
            'reason_helper'             => ' ',
            'description'               => 'Description',
            'description_helper'        => ' ',
            'descision'                 => 'Descision',
            'descision_helper'          => ' ',
        ],
    ],
];
