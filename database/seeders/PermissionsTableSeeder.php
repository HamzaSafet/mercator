<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'entity_create',
            ],
            [
                'id'    => '18',
                'title' => 'entity_edit',
            ],
            [
                'id'    => '19',
                'title' => 'entity_show',
            ],
            [
                'id'    => '20',
                'title' => 'entity_delete',
            ],
            [
                'id'    => '21',
                'title' => 'entity_access',
            ],
            [
                'id'    => '22',
                'title' => 'ecosystem_access',
            ],
            [
                'id'    => '23',
                'title' => 'relation_create',
            ],
            [
                'id'    => '24',
                'title' => 'relation_edit',
            ],
            [
                'id'    => '25',
                'title' => 'relation_show',
            ],
            [
                'id'    => '26',
                'title' => 'relation_delete',
            ],
            [
                'id'    => '27',
                'title' => 'relation_access',
            ],
            [
                'id'    => '28',
                'title' => 'process_create',
            ],
            [
                'id'    => '29',
                'title' => 'process_edit',
            ],
            [
                'id'    => '30',
                'title' => 'process_show',
            ],
            [
                'id'    => '31',
                'title' => 'process_delete',
            ],
            [
                'id'    => '32',
                'title' => 'process_access',
            ],
            [
                'id'    => '33',
                'title' => 'metier_access',
            ],
            [
                'id'    => '34',
                'title' => 'operation_create',
            ],
            [
                'id'    => '35',
                'title' => 'operation_edit',
            ],
            [
                'id'    => '36',
                'title' => 'operation_show',
            ],
            [
                'id'    => '37',
                'title' => 'operation_delete',
            ],
            [
                'id'    => '38',
                'title' => 'operation_access',
            ],
            [
                'id'    => '39',
                'title' => 'actor_create',
            ],
            [
                'id'    => '40',
                'title' => 'actor_edit',
            ],
            [
                'id'    => '41',
                'title' => 'actor_show',
            ],
            [
                'id'    => '42',
                'title' => 'actor_delete',
            ],
            [
                'id'    => '43',
                'title' => 'actor_access',
            ],
            [
                'id'    => '44',
                'title' => 'activity_create',
            ],
            [
                'id'    => '45',
                'title' => 'activity_edit',
            ],
            [
                'id'    => '46',
                'title' => 'activity_show',
            ],
            [
                'id'    => '47',
                'title' => 'activity_delete',
            ],
            [
                'id'    => '48',
                'title' => 'activity_access',
            ],
            [
                'id'    => '49',
                'title' => 'task_create',
            ],
            [
                'id'    => '50',
                'title' => 'task_edit',
            ],
            [
                'id'    => '51',
                'title' => 'task_show',
            ],
            [
                'id'    => '52',
                'title' => 'task_delete',
            ],
            [
                'id'    => '53',
                'title' => 'task_access',
            ],
            [
                'id'    => '54',
                'title' => 'information_create',
            ],
            [
                'id'    => '55',
                'title' => 'information_edit',
            ],
            [
                'id'    => '56',
                'title' => 'information_show',
            ],
            [
                'id'    => '57',
                'title' => 'information_delete',
            ],
            [
                'id'    => '58',
                'title' => 'information_access',
            ],
            [
                'id'    => '59',
                'title' => 'application_block_create',
            ],
            [
                'id'    => '60',
                'title' => 'application_block_edit',
            ],
            [
                'id'    => '61',
                'title' => 'application_block_show',
            ],
            [
                'id'    => '62',
                'title' => 'application_block_delete',
            ],
            [
                'id'    => '63',
                'title' => 'application_block_access',
            ],
            [
                'id'    => '64',
                'title' => 'application_create',
            ],
            [
                'id'    => '65',
                'title' => 'application_edit',
            ],
            [
                'id'    => '66',
                'title' => 'application_show',
            ],
            [
                'id'    => '67',
                'title' => 'application_delete',
            ],
            [
                'id'    => '68',
                'title' => 'application_access',
            ],
            [
                'id'    => '69',
                'title' => 'papplication_access',
            ],
            [
                'id'    => '70',
                'title' => 'm_application_create',
            ],
            [
                'id'    => '71',
                'title' => 'm_application_edit',
            ],
            [
                'id'    => '72',
                'title' => 'm_application_show',
            ],
            [
                'id'    => '73',
                'title' => 'm_application_delete',
            ],
            [
                'id'    => '74',
                'title' => 'm_application_access',
            ],
            [
                'id'    => '75',
                'title' => 'application_service_create',
            ],
            [
                'id'    => '76',
                'title' => 'application_service_edit',
            ],
            [
                'id'    => '77',
                'title' => 'application_service_show',
            ],
            [
                'id'    => '78',
                'title' => 'application_service_delete',
            ],
            [
                'id'    => '79',
                'title' => 'application_service_access',
            ],
            [
                'id'    => '80',
                'title' => 'database_create',
            ],
            [
                'id'    => '81',
                'title' => 'database_edit',
            ],
            [
                'id'    => '82',
                'title' => 'database_show',
            ],
            [
                'id'    => '83',
                'title' => 'database_delete',
            ],
            [
                'id'    => '84',
                'title' => 'database_access',
            ],
            [
                'id'    => '85',
                'title' => 'flux_create',
            ],
            [
                'id'    => '86',
                'title' => 'flux_edit',
            ],
            [
                'id'    => '87',
                'title' => 'flux_show',
            ],
            [
                'id'    => '88',
                'title' => 'flux_delete',
            ],
            [
                'id'    => '89',
                'title' => 'flux_access',
            ],
            [
                'id'    => '90',
                'title' => 'zone_admin_create',
            ],
            [
                'id'    => '91',
                'title' => 'zone_admin_edit',
            ],
            [
                'id'    => '92',
                'title' => 'zone_admin_show',
            ],
            [
                'id'    => '93',
                'title' => 'zone_admin_delete',
            ],
            [
                'id'    => '94',
                'title' => 'zone_admin_access',
            ],
            [
                'id'    => '95',
                'title' => 'administration_access',
            ],
            [
                'id'    => '96',
                'title' => 'annuaire_create',
            ],
            [
                'id'    => '97',
                'title' => 'annuaire_edit',
            ],
            [
                'id'    => '98',
                'title' => 'annuaire_show',
            ],
            [
                'id'    => '99',
                'title' => 'annuaire_delete',
            ],
            [
                'id'    => '100',
                'title' => 'annuaire_access',
            ],
            [
                'id'    => '101',
                'title' => 'forest_ad_create',
            ],
            [
                'id'    => '102',
                'title' => 'forest_ad_edit',
            ],
            [
                'id'    => '103',
                'title' => 'forest_ad_show',
            ],
            [
                'id'    => '104',
                'title' => 'forest_ad_delete',
            ],
            [
                'id'    => '105',
                'title' => 'forest_ad_access',
            ],
            [
                'id'    => '106',
                'title' => 'domaine_ad_create',
            ],
            [
                'id'    => '107',
                'title' => 'domaine_ad_edit',
            ],
            [
                'id'    => '108',
                'title' => 'domaine_ad_show',
            ],
            [
                'id'    => '109',
                'title' => 'domaine_ad_delete',
            ],
            [
                'id'    => '110',
                'title' => 'domaine_ad_access',
            ],
            [
                'id'    => '111',
                'title' => 'infrastructure_access',
            ],
            [
                'id'    => '112',
                'title' => 'network_create',
            ],
            [
                'id'    => '113',
                'title' => 'network_edit',
            ],
            [
                'id'    => '114',
                'title' => 'network_show',
            ],
            [
                'id'    => '115',
                'title' => 'network_delete',
            ],
            [
                'id'    => '116',
                'title' => 'network_access',
            ],
            [
                'id'    => '117',
                'title' => 'subnetwork_create',
            ],
            [
                'id'    => '118',
                'title' => 'subnetwork_edit',
            ],
            [
                'id'    => '119',
                'title' => 'subnetwork_show',
            ],
            [
                'id'    => '120',
                'title' => 'subnetwork_delete',
            ],
            [
                'id'    => '121',
                'title' => 'subnetwork_access',
            ],
            [
                'id'    => '122',
                'title' => 'gateway_create',
            ],
            [
                'id'    => '123',
                'title' => 'gateway_edit',
            ],
            [
                'id'    => '124',
                'title' => 'gateway_show',
            ],
            [
                'id'    => '125',
                'title' => 'gateway_delete',
            ],
            [
                'id'    => '126',
                'title' => 'gateway_access',
            ],
            [
                'id'    => '127',
                'title' => 'external_connected_entity_create',
            ],
            [
                'id'    => '128',
                'title' => 'external_connected_entity_edit',
            ],
            [
                'id'    => '129',
                'title' => 'external_connected_entity_show',
            ],
            [
                'id'    => '130',
                'title' => 'external_connected_entity_delete',
            ],
            [
                'id'    => '131',
                'title' => 'external_connected_entity_access',
            ],
            [
                'id'    => '132',
                'title' => 'network_switch_create',
            ],
            [
                'id'    => '133',
                'title' => 'network_switch_edit',
            ],
            [
                'id'    => '134',
                'title' => 'network_switch_show',
            ],
            [
                'id'    => '135',
                'title' => 'network_switch_delete',
            ],
            [
                'id'    => '136',
                'title' => 'network_switch_access',
            ],
            [
                'id'    => '137',
                'title' => 'router_create',
            ],
            [
                'id'    => '138',
                'title' => 'router_edit',
            ],
            [
                'id'    => '139',
                'title' => 'router_show',
            ],
            [
                'id'    => '140',
                'title' => 'router_delete',
            ],
            [
                'id'    => '141',
                'title' => 'router_access',
            ],
            [
                'id'    => '142',
                'title' => 'security_device_create',
            ],
            [
                'id'    => '143',
                'title' => 'security_device_edit',
            ],
            [
                'id'    => '144',
                'title' => 'security_device_show',
            ],
            [
                'id'    => '145',
                'title' => 'security_device_delete',
            ],
            [
                'id'    => '146',
                'title' => 'security_device_access',
            ],
            [
                'id'    => '147',
                'title' => 'dhcp_server_create',
            ],
            [
                'id'    => '148',
                'title' => 'dhcp_server_edit',
            ],
            [
                'id'    => '149',
                'title' => 'dhcp_server_show',
            ],
            [
                'id'    => '150',
                'title' => 'dhcp_server_delete',
            ],
            [
                'id'    => '151',
                'title' => 'dhcp_server_access',
            ],
            [
                'id'    => '152',
                'title' => 'dnsserver_create',
            ],
            [
                'id'    => '153',
                'title' => 'dnsserver_edit',
            ],
            [
                'id'    => '154',
                'title' => 'dnsserver_show',
            ],
            [
                'id'    => '155',
                'title' => 'dnsserver_delete',
            ],
            [
                'id'    => '156',
                'title' => 'dnsserver_access',
            ],
            [
                'id'    => '157',
                'title' => 'logical_server_create',
            ],
            [
                'id'    => '158',
                'title' => 'logical_server_edit',
            ],
            [
                'id'    => '159',
                'title' => 'logical_server_show',
            ],
            [
                'id'    => '160',
                'title' => 'logical_server_delete',
            ],
            [
                'id'    => '161',
                'title' => 'logical_server_access',
            ],
            [
                'id'    => '162',
                'title' => 'physicalinfrastructure_access',
            ],
            [
                'id'    => '163',
                'title' => 'site_create',
            ],
            [
                'id'    => '164',
                'title' => 'site_edit',
            ],
            [
                'id'    => '165',
                'title' => 'site_show',
            ],
            [
                'id'    => '166',
                'title' => 'site_delete',
            ],
            [
                'id'    => '167',
                'title' => 'site_access',
            ],
            [
                'id'    => '168',
                'title' => 'building_create',
            ],
            [
                'id'    => '169',
                'title' => 'building_edit',
            ],
            [
                'id'    => '170',
                'title' => 'building_show',
            ],
            [
                'id'    => '171',
                'title' => 'building_delete',
            ],
            [
                'id'    => '172',
                'title' => 'building_access',
            ],
            [
                'id'    => '173',
                'title' => 'bay_create',
            ],
            [
                'id'    => '174',
                'title' => 'bay_edit',
            ],
            [
                'id'    => '175',
                'title' => 'bay_show',
            ],
            [
                'id'    => '176',
                'title' => 'bay_delete',
            ],
            [
                'id'    => '177',
                'title' => 'bay_access',
            ],
            [
                'id'    => '178',
                'title' => 'physical_server_create',
            ],
            [
                'id'    => '179',
                'title' => 'physical_server_edit',
            ],
            [
                'id'    => '180',
                'title' => 'physical_server_show',
            ],
            [
                'id'    => '181',
                'title' => 'physical_server_delete',
            ],
            [
                'id'    => '182',
                'title' => 'physical_server_access',
            ],
            [
                'id'    => '183',
                'title' => 'workstation_create',
            ],
            [
                'id'    => '184',
                'title' => 'workstation_edit',
            ],
            [
                'id'    => '185',
                'title' => 'workstation_show',
            ],
            [
                'id'    => '186',
                'title' => 'workstation_delete',
            ],
            [
                'id'    => '187',
                'title' => 'workstation_access',
            ],
            [
                'id'    => '188',
                'title' => 'storage_device_create',
            ],
            [
                'id'    => '189',
                'title' => 'storage_device_edit',
            ],
            [
                'id'    => '190',
                'title' => 'storage_device_show',
            ],
            [
                'id'    => '191',
                'title' => 'storage_device_delete',
            ],
            [
                'id'    => '192',
                'title' => 'storage_device_access',
            ],
            [
                'id'    => '193',
                'title' => 'peripheral_create',
            ],
            [
                'id'    => '194',
                'title' => 'peripheral_edit',
            ],
            [
                'id'    => '195',
                'title' => 'peripheral_show',
            ],
            [
                'id'    => '196',
                'title' => 'peripheral_delete',
            ],
            [
                'id'    => '197',
                'title' => 'peripheral_access',
            ],
            [
                'id'    => '198',
                'title' => 'phone_create',
            ],
            [
                'id'    => '199',
                'title' => 'phone_edit',
            ],
            [
                'id'    => '200',
                'title' => 'phone_show',
            ],
            [
                'id'    => '201',
                'title' => 'phone_delete',
            ],
            [
                'id'    => '202',
                'title' => 'phone_access',
            ],
            [
                'id'    => '203',
                'title' => 'physical_switch_create',
            ],
            [
                'id'    => '204',
                'title' => 'physical_switch_edit',
            ],
            [
                'id'    => '205',
                'title' => 'physical_switch_show',
            ],
            [
                'id'    => '206',
                'title' => 'physical_switch_delete',
            ],
            [
                'id'    => '207',
                'title' => 'physical_switch_access',
            ],
            [
                'id'    => '208',
                'title' => 'physical_router_create',
            ],
            [
                'id'    => '209',
                'title' => 'physical_router_edit',
            ],
            [
                'id'    => '210',
                'title' => 'physical_router_show',
            ],
            [
                'id'    => '211',
                'title' => 'physical_router_delete',
            ],
            [
                'id'    => '212',
                'title' => 'physical_router_access',
            ],
            [
                'id'    => '213',
                'title' => 'wifi_terminal_create',
            ],
            [
                'id'    => '214',
                'title' => 'wifi_terminal_edit',
            ],
            [
                'id'    => '215',
                'title' => 'wifi_terminal_show',
            ],
            [
                'id'    => '216',
                'title' => 'wifi_terminal_delete',
            ],
            [
                'id'    => '217',
                'title' => 'wifi_terminal_access',
            ],
            [
                'id'    => '218',
                'title' => 'physical_security_device_create',
            ],
            [
                'id'    => '219',
                'title' => 'physical_security_device_edit',
            ],
            [
                'id'    => '220',
                'title' => 'physical_security_device_show',
            ],
            [
                'id'    => '221',
                'title' => 'physical_security_device_delete',
            ],
            [
                'id'    => '222',
                'title' => 'physical_security_device_access',
            ],
            [
                'id'    => '223',
                'title' => 'wan_create',
            ],
            [
                'id'    => '224',
                'title' => 'wan_edit',
            ],
            [
                'id'    => '225',
                'title' => 'wan_show',
            ],
            [
                'id'    => '226',
                'title' => 'wan_delete',
            ],
            [
                'id'    => '227',
                'title' => 'wan_access',
            ],
            [
                'id'    => '228',
                'title' => 'man_create',
            ],
            [
                'id'    => '229',
                'title' => 'man_edit',
            ],
            [
                'id'    => '230',
                'title' => 'man_show',
            ],
            [
                'id'    => '231',
                'title' => 'man_delete',
            ],
            [
                'id'    => '232',
                'title' => 'man_access',
            ],
            [
                'id'    => '233',
                'title' => 'lan_create',
            ],
            [
                'id'    => '234',
                'title' => 'lan_edit',
            ],
            [
                'id'    => '235',
                'title' => 'lan_show',
            ],
            [
                'id'    => '236',
                'title' => 'lan_delete',
            ],
            [
                'id'    => '237',
                'title' => 'lan_access',
            ],
            [
                'id'    => '238',
                'title' => 'vlan_create',
            ],
            [
                'id'    => '239',
                'title' => 'vlan_edit',
            ],
            [
                'id'    => '240',
                'title' => 'vlan_show',
            ],
            [
                'id'    => '241',
                'title' => 'vlan_delete',
            ],
            [
                'id'    => '242',
                'title' => 'vlan_access',
            ],
            [
                'id'    => '243',
                'title' => 'application_module_create',
            ],
            [
                'id'    => '244',
                'title' => 'application_module_edit',
            ],
            [
                'id'    => '245',
                'title' => 'application_module_show',
            ],
            [
                'id'    => '246',
                'title' => 'application_module_delete',
            ],
            [
                'id'    => '247',
                'title' => 'application_module_access',
            ],
            [
                'id'    => '248',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '249',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '250',
                'title' => 'macro_processus_create',
            ],
            [
                'id'    => '251',
                'title' => 'macro_processus_edit',
            ],
            [
                'id'    => '252',
                'title' => 'macro_processus_show',
            ],
            [
                'id'    => '253',
                'title' => 'macro_processus_delete',
            ],
            [
                'id'    => '254',
                'title' => 'macro_processus_access',
            ],
            [
                'id'    => '255',
                'title' => 'configuration_access',
            ],
            [
                'id'    => '256',
                'title' => 'profile_password_edit',
            ],

            // Certificates
            [
                'id'    => '257',
                'title' => 'certificate_create',
            ],
            [
                'id'    => '258',
                'title' => 'certificate_edit',
            ],
            [
                'id'    => '259',
                'title' => 'certificate_show',
            ],
            [
                'id'    => '260',
                'title' => 'certificate_delete',
            ],
            [
                'id'    => '261',
                'title' => 'certificate_access',
            ],

            // Configuration
            [
                'id'    => '262',
                'title' => 'configure',
            ],

            // Certificates
            [
                'id'    => '263',
                'title' => 'physical_link_create',
            ],
            [
                'id'    => '264',
                'title' => 'physical_link_edit',
            ],
            [
                'id'    => '265',
                'title' => 'physical_link_show',
            ],
            [
                'id'    => '266',
                'title' => 'physical_link_delete',
            ],
            [
                'id'    => '267',
                'title' => 'physical_link_access',
            ],

        ];

        Permission::insert($permissions);
    }
}
