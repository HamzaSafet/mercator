<?php

namespace App\Http\Controllers\Admin;

// ecosystem
// information system
// Applications
// Administration
use App\Http\Controllers\Controller;
// Logique
// Physique
use App\Subnetwork;
use App\Router;
use Illuminate\Support\Facades\DB;

class ExplorerController extends Controller
{
    public function explore()
    {
        $nodes = [];
        $edges = [];

        // ---------------------------------------------------
        // Physical view
        // ---------------------------------------------------
        // SITES
        $sites = DB::table('sites')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($sites as $site) {
            $this->addNode($nodes, $this->formatId('SITE_', $site->id), $site->name, '/images/site.png');
            // link to build
        }
        // BUILDINGS
        $buildings = DB::table('buildings')->select('id', 'name', 'site_id')->whereNull('deleted_at')->get();
        foreach ($buildings as $building) {
            $this->addNode($nodes, $this->formatId('BUILDING_', $building->id), $building->name, '/images/building.png');
            $this->addLinkEdge($edges, $this->formatId('BUILDING_', $building->id), $this->formatId('SITE_', $building->site_id));
        }
        // Bay
        $bays = DB::table('bays')->select('id', 'name', 'room_id')->whereNull('deleted_at')->get();
        foreach ($bays as $bay) {
            $this->addNode($nodes, $this->formatId('BAY_', $bay->id), $bay->name, '/images/bay.png');
            $this->addLinkEdge($edges, $this->formatId('BAY_', $bay->id), $this->formatId('BUILDING_', $bay->room_id));
        }
        // Physical Server
        $physicalServers = DB::table('physical_servers')->select('id', 'name', 'bay_id')->whereNull('deleted_at')->get();
        foreach ($physicalServers as $physicalServer) {
            $this->addNode($nodes, $this->formatId('PSERVER_', $physicalServer->id), $physicalServer->name, '/images/server.png');
            $this->addLinkEdge($edges, $this->formatId('PSERVER_', $physicalServer->id), $this->formatId('BAY_', $physicalServer->bay_id));
        }
        // Workstation
        $workstations = DB::table('workstations')->select('id', 'name', 'building_id')->whereNull('deleted_at')->get();
        foreach ($workstations as $workstation) {
            $this->addNode($nodes, $this->formatId('WORK_', $workstation->id), $workstation->name, '/images/workstation.png');
            $this->addLinkEdge($edges, $this->formatId('WORK_', $workstation->id), $this->formatId('BUILDING_', $workstation->building_id));
        }
        // physical_switches
        $switches = DB::table('physical_switches')->select('id', 'name', 'bay_id')->whereNull('deleted_at')->get();
        foreach ($switches as $switch) {
            $this->addNode($nodes, $this->formatId('SWITCH_', $switch->id), $switch->name, '/images/switch.png');
            $this->addLinkEdge($edges, $this->formatId('SWITCH_', $switch->id), $this->formatId('BAY_', $switch->bay_id));
        }

        // ---------------------------------------------------
        // Logical view
        // ---------------------------------------------------
        // networks
        $networks = DB::table('networks')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($networks as $network) {
            $this->addNode($nodes, $this->formatId('NETWORK_', $network->id), $network->name, '/images/cloud.png');
        }

        // vlans
        $vlans = DB::table('vlans')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($vlans as $vlan) {
            $this->addNode($nodes, $this->formatId('VLAN_', $vlan->id), $vlan->name, '/images/vlan.png');
        }

        // Subnetworks
        // $subnetworks = DB::table("subnetworks")->select("id","name","network_id","vlan_id")->whereNull('deleted_at')->get();
        $subnetworks = Subnetwork::all();
        foreach ($subnetworks as $subnetwork) {
            $this->addNode($nodes, $this->formatId('SUBNETWORK_', $subnetwork->id), $subnetwork->name, '/images/network.png', $subnetwork->address);
            $this->addLinkEdge($edges, $this->formatId('SUBNETWORK_', $subnetwork->id), $this->formatId('NETWORK_', $subnetwork->network_id));
            $this->addLinkEdge($edges, $this->formatId('SUBNETWORK_', $subnetwork->id), $this->formatId('VLAN_', $subnetwork->vlan_id));
        }

        // Logical Routers
        $logicalRouters = Router::All();
        foreach ($logicalRouters as $logicalRouter) {
            if ($logicalRouter->getAttribute('ip_addresses') !== null) {
                foreach ($subnetworks as $subnetwork) {
                    foreach (explode(',', $logicalRouter->getAttribute('ip_addresses')) as $address) {
                        if ($subnetwork->contains($address)) {
                            $this->addLinkEdge($edges, $this->formatId('SUBNETWORK_', $subnetwork->id), $this->formatId('ROUTER_', $logicalRouter->id));
                            break;
                        }
                    }
                }
            }
        }

        // Logical Servers
        $logicalServers = DB::table('logical_servers')->select('id', 'name', 'address_ip')->get();
        foreach ($logicalServers as $logicalServer) {
            $this->addNode($nodes, $this->formatId('LSERVER_', $logicalServer->id), $logicalServer->name, '/images/lserver.png');

            if ($logicalServer->address_ip !== null) {
                foreach ($subnetworks as $subnetwork) {
                    foreach (explode(',', $logicalServer->address_ip) as $address) {
                        if ($subnetwork->contains($address)) {
                            $this->addLinkEdge($edges, $this->formatId('SUBNETWORK_', $subnetwork->id), $this->formatId('LSERVER_', $logicalServer->id));
                            break;
                        }
                    }
                }
            }
        }

        // Logical Servers - Physical Servers
        $joins = DB::table('logical_server_physical_server')->select('physical_server_id', 'logical_server_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('PSERVER_', $join->physical_server_id), $this->formatId('LSERVER_', $join->logical_server_id));
        }
        // Certificates
        $certificates = DB::table('certificates')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($certificates as $certificate) {
            $this->addNode($nodes, $this->formatId('CERT_', $certificate->id), $certificate->name, '/images/certificate.png');
        }
        // certificate_logical_server
        $joins = DB::table('certificate_logical_server')->select('certificate_id', 'logical_server_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('CERT_', $join->certificate_id), $this->formatId('LSERVER_', $join->logical_server_id));
        }

        // ---------------------------------------------------
        // Administration view
        // ---------------------------------------------------
        // Zones
        $zoneAdmins = DB::table('zone_admins')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($zoneAdmins as $zone) {
            $this->addNode($nodes, $this->formatId('ZONE_', $zone->id), $zone->name, '/images/zoneadmin.png');
        }
        // Annuaires
        $annuaires = DB::table('annuaires')->select('id', 'name', 'zone_admin_id')->whereNull('deleted_at')->get();
        foreach ($annuaires as $annuaire) {
            $this->addNode($nodes, $this->formatId('ANNUAIRE_', $annuaire->id), $annuaire->name, '/images/annuaire.png');
            $this->addLinkEdge($edges, $this->formatId('ANNUAIRE_', $annuaire->id), $this->formatId('ZONE_', $annuaire->zone_admin_id));
        }
        // Forest
        $forests = DB::table('forest_ads')->select('id', 'name', 'zone_admin_id')->whereNull('deleted_at')->get();
        foreach ($forests as $forest) {
            $this->addNode($nodes, $this->formatId('FOREST_', $forest->id), $forest->name, '/images/ldap.png');
            $this->addLinkEdge($edges, $this->formatId('FOREST_', $forest->id), $this->formatId('ZONE_', $forest->zone_admin_id));
        }
        // Domain
        $domains = DB::table('domaine_ads')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($domains as $domain) {
            $this->addNode($nodes, $this->formatId('DOMAIN_', $domain->id), $domain->name, '/images/domain.png');
        }
        // domaine_ad_forest_ad
        $joins = DB::table('domaine_ad_forest_ad')->select('forest_ad_id', 'domaine_ad_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('FOREST_', $join->forest_ad_id), $this->formatId('DOMAIN_', $join->domaine_ad_id));
        }

        // ---------------------------------------------------
        // Application view
        // ---------------------------------------------------
        // Application Blocks
        $applicationBlocks = DB::table('application_blocks')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($applicationBlocks as $applicationBlock) {
            $this->addNode($nodes, $this->formatId('BLOCK_', $applicationBlock->id), $applicationBlock->name, '/images/applicationblock.png');
        }
        // Applications
        $applications = DB::table('m_applications')->select('id', 'name', 'application_block_id')->whereNull('deleted_at')->get();
        foreach ($applications as $application) {
            $this->addNode($nodes, $this->formatId('APP_', $application->id), $application->name, '/images/application.png');
            $this->addLinkEdge($edges, $this->formatId('BLOCK_', $application->application_block_id), $this->formatId('APP_', $application->id));
        }
        // logical_server_m_application
        $joins = DB::table('logical_server_m_application')->select('m_application_id', 'logical_server_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('APP_', $join->m_application_id), $this->formatId('LSERVER_', $join->logical_server_id));
        }
        // Application Services
        $services = DB::table('application_services')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($services as $service) {
            $this->addNode($nodes, $this->formatId('SERV_', $service->id), $service->name, '/images/service.png');
        }
        // application_service_m_application
        $joins = DB::table('application_service_m_application')->select('m_application_id', 'application_service_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('APP_', $join->m_application_id), $this->formatId('SERV_', $join->application_service_id));
        }
        // Application Modules
        $modules = DB::table('application_modules')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($modules as $module) {
            $this->addNode($nodes, $this->formatId('MOD_', $module->id), $module->name, '/images/applicationmodule.png');
        }
        // application_module_application_service
        $joins = DB::table('application_module_application_service')->select('application_module_id', 'application_service_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('MOD_', $join->application_module_id), $this->formatId('SERV_', $join->application_service_id));
        }

        // certificate_m_application
        $joins = DB::table('certificate_m_application')->select('m_application_id', 'certificate_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('APP_', $join->m_application_id), $this->formatId('CERT_', $join->certificate_id));
        }
        // Databases
        $databases = DB::table('databases')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($databases as $database) {
            $this->addNode($nodes, $this->formatId('DATABASE_', $database->id), $database->name, '/images/database.png');
        }
        // database_m_application
        $joins = DB::table('database_m_application')->select('m_application_id', 'database_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('APP_', $join->m_application_id), $this->formatId('DATABASE_', $join->database_id));
        }

        // Fluxes
        $fluxes = DB::table('fluxes')->select('id', 'name', 'application_source_id', 'service_source_id', 'module_source_id', 'database_source_id', 'application_dest_id', 'service_dest_id', 'module_dest_id', 'database_dest_id' )->whereNull('deleted_at')->get();
        foreach ($fluxes as $flux) {
            $this->addFluxEdge($edges, $this->formatId('APP_', $flux->application_source_id), $this->formatId('APP_', $flux->application_dest_id));
            $this->addFluxEdge($edges, $this->formatId('APP_', $flux->application_source_id), $this->formatId('SERV_', $flux->service_dest_id));
            $this->addFluxEdge($edges, $this->formatId('APP_', $flux->application_source_id), $this->formatId('MOD_', $flux->module_dest_id));
            $this->addFluxEdge($edges, $this->formatId('APP_', $flux->application_source_id), $this->formatId('DATABASE_', $flux->database_dest_id));
    
            $this->addFluxEdge($edges, $this->formatId('SERV_', $flux->service_source_id), $this->formatId('APP_', $flux->application_dest_id));
            $this->addFluxEdge($edges, $this->formatId('SERV_', $flux->service_source_id), $this->formatId('SERV_', $flux->service_dest_id));
            $this->addFluxEdge($edges, $this->formatId('SERV_', $flux->service_source_id), $this->formatId('MOD_', $flux->module_dest_id));
            $this->addFluxEdge($edges, $this->formatId('SERV_', $flux->service_source_id), $this->formatId('DATABASE_', $flux->database_dest_id));                

            $this->addFluxEdge($edges, $this->formatId('MOD_', $flux->module_source_id), $this->formatId('APP_', $flux->application_dest_id));
            $this->addFluxEdge($edges, $this->formatId('MOD_', $flux->module_source_id), $this->formatId('SERV_', $flux->service_dest_id));
            $this->addFluxEdge($edges, $this->formatId('MOD_', $flux->module_source_id), $this->formatId('MOD_', $flux->module_dest_id));
            $this->addFluxEdge($edges, $this->formatId('MOD_', $flux->module_source_id), $this->formatId('DATABASE_', $flux->database_dest_id));

            $this->addFluxEdge($edges, $this->formatId('DATABASE_', $flux->database_source_id), $this->formatId('APP_', $flux->application_dest_id));
            $this->addFluxEdge($edges, $this->formatId('DATABASE_', $flux->database_source_id), $this->formatId('SERV_', $flux->service_dest_id));
            $this->addFluxEdge($edges, $this->formatId('DATABASE_', $flux->database_source_id), $this->formatId('MOD_', $flux->module_dest_id));
            $this->addFluxEdge($edges, $this->formatId('DATABASE_', $flux->database_source_id), $this->formatId('DATABASE_', $flux->database_dest_id));
        }

        // ---------------------------------------------------
        // Information System
        // ---------------------------------------------------
        // Information
        $informations = DB::table('information')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($informations as $information) {
            $this->addNode($nodes, $this->formatId('INFO_', $information->id), $information->name, '/images/information.png');
        }
        // database_information
        $joins = DB::table('database_information')->select('information_id', 'database_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('INFO_', $join->information_id), $this->formatId('DATABASE_', $join->database_id));
        }
        // process
        $processes = DB::table('processes')->select('id', 'identifiant', 'macroprocess_id')->whereNull('deleted_at')->get();
        foreach ($processes as $process) {
            $this->addNode($nodes, $this->formatId('PROCESS_', $process->id), $process->identifiant, '/images/process.png');
            $this->addLinkEdge($edges, $this->formatId('PROCESS_', $process->id), $this->formatId('MACROPROCESS_', $process->macroprocess_id));
        }
        // information_process
        $joins = DB::table('information_process')->select('information_id', 'process_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('INFO_', $join->information_id), $this->formatId('PROCESS_', $join->process_id));
        }
        // macro_processuses
        $macro_processuses = DB::table('macro_processuses')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($macro_processuses as $macro_process) {
            $this->addNode($nodes, $this->formatId('MACROPROCESS_', $macro_process->id), $macro_process->name, '/images/macroprocess.png');
        }

        // Activities
        $activities = DB::table('activities')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($activities as $activity) {
            $this->addNode($nodes, $this->formatId('ACTIVITY_', $activity->id), $activity->name, '/images/activity.png');
        }
        // activity_process
        $joins = DB::table('activity_process')->select('activity_id', 'process_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('ACTIVITY_', $join->activity_id), $this->formatId('PROCESS_', $join->process_id));
        }

        // Operations
        $operations = DB::table('operations')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($operations as $operation) {
            $this->addNode($nodes, $this->formatId('OPERATION_', $operation->id), $operation->name, '/images/operation.png');
        }

        // activity_operation
        $joins = DB::table('activity_operation')->select('activity_id', 'operation_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('ACTIVITY_', $join->activity_id), $this->formatId('OPERATION_', $join->operation_id));
        }

        // Tasks
        $operations = DB::table('operations')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($operations as $operation) {
            $this->addNode($nodes, $this->formatId('OPERATION_', $operation->id), $operation->name, '/images/operation.png');
        }

        // Actors
        $actors = DB::table('actors')->select('id', 'name')->whereNull('deleted_at')->whereNull('deleted_at')->get();
        foreach ($actors as $actor) {
            $this->addNode($nodes, $this->formatId('ACTOR_', $actor->id), $actor->name, '/images/actor.png');
        }

        // actor_operation
        $joins = DB::table('actor_operation')->select('actor_id', 'operation_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('ACTOR_', $join->actor_id), $this->formatId('OPERATION_', $join->operation_id));
        }
        // ---------------------------------------------------
        // Ecosystem
        // ---------------------------------------------------
        // Entities
        $entities = DB::table('entities')->select('id', 'name')->whereNull('deleted_at')->get();
        foreach ($entities as $entity) {
            $this->addNode($nodes, $this->formatId('ENTITY_', $entity->id), $entity->name, '/images/entity.png');
        }

        // Relations
        $relations = DB::table('relations')->select('id', 'name', 'source_id', 'destination_id')->whereNull('deleted_at')->get();
        foreach ($relations as $relation) {
            $this->addNode($nodes, $this->formatId('REL_', $relation->id), $relation->name, '/images/relation.png');
            $this->addLinkEdge($edges, $this->formatId('REL_', $relation->id), $this->formatId('ENTITY_', $relation->source_id));
            $this->addLinkEdge($edges, $this->formatId('REL_', $relation->id), $this->formatId('ENTITY_', $relation->destination_id));
        }
        // entity_process
        $joins = DB::table('entity_process')->select('entity_id', 'process_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('ENTITY_', $join->entity_id), $this->formatId('PROCESS_', $join->process_id));
        }
        // entity_m_application
        $joins = DB::table('entity_m_application')->select('entity_id', 'm_application_id')->get();
        foreach ($joins as $join) {
            $this->addLinkEdge($edges, $this->formatId('ENTITY_', $join->entity_id), $this->formatId('APP_', $join->m_application_id));
        }

        return view('admin/reports/explore', compact('nodes', 'edges'));
    }

    private function addNode(&$nodes, $id, $label, $image, $title = null)
    {
        $data = [ 'id' => $id, 'label' => $label, 'image' => $image ];
        if($title !== null) {
            $data['title'] = $title;
        }
        array_push($nodes, $data);
    }

    private function addLinkEdge(&$edges, $from, $to)
    {
        $this->addEdge($edges, $from, $to, 'LINK');
    }

    private function addFluxEdge(&$edges, $from, $to)
    {
        $this->addEdge($edges, $from, $to, 'FLUX');
    }

    private function addEdge(&$edges, $from, $to, $type)
    {
        if($from !== null && $to !== null) {
            array_push($edges, [ 'from' => $from, 'to' => $to, 'type' => $type ]);
        }
    }
    
    private function formatId($prefix, $id)
    {
        if($id !== null) {
            return $prefix . $id;
        } else {
            return null;
        }
    }
}
