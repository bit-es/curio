# ISA-95 / B2MML MOM — Laravel Package Model List
**Standard:** ISA-95 / IEC 62264 Parts 1–5 / B2MML V0700-oriented implementation  
**Purpose:** Manufacturing Operations Management — Modular Laravel Package Structure  
**Generated:** 2026-11-04  
**Table Prefix:** `isa95_`  
**Total Models:** **83**

---

## Overview — Package Strategy
The package-oriented presentation below preserves the original document format, while the model inventory is derived directly from `draft.yaml`. The YAML remains the source of truth. The 18 package-oriented groups map directly to the 18 logical sections of `draft.yaml` so that no model is omitted or invented. These package boundaries are an implementation organization and are not declared by the YAML schema itself.

| Package Name | Purpose | Model Count | Key Dependencies |
|---|---|---:|---|
| `isa95-hierarchy` | Enterprise / site / area / work-center / work-unit hierarchy and operational locations | 7 | — |
| `isa95-personnel` | Personnel classes, people, capabilities, availability and personnel information | 5 | `isa95-hierarchy` |
| `isa95-equipment` | Equipment classes, instances, capabilities, availability and equipment information | 5 | `isa95-hierarchy` |
| `isa95-assets` | Physical assets, equipment assignment and physical-asset capabilities | 4 | `isa95-hierarchy` |
| `isa95-material` | Material classes, definitions, lots, availability, capability and movements | 7 | `isa95-hierarchy` |
| `isa95-process-product` | Process segments and product-definition structures, BOMs and production rules | 8 | `isa95-hierarchy` |
| `isa95-operations-definition` | Common operations definitions, segments, dependencies and capabilities | 4 | Core resources / preceding operations stages |
| `isa95-operations-request` | Operations demand and requested segments | 2 | Core resources / preceding operations stages |
| `isa95-operations-scheduling` | Operations schedules, request linkage, segment schedules and resource assignments | 4 | Core resources / preceding operations stages |
| `isa95-operations-performance` | Execution performance and personnel/equipment/material/asset actuals | 6 | Core resources / preceding operations stages |
| `isa95-operations-response` | Operations responses and exchanged operations information | 3 | Core resources / preceding operations stages |
| `isa95-production` | Production orders, production lots and genealogy | 3 | `isa95-operations-*`, relevant resources |
| `isa95-maintenance` | Maintenance work orders, tasks and measurements | 3 | `isa95-operations-*`, relevant resources |
| `isa95-quality` | Quality test specifications, results and nonconformance | 5 | `isa95-operations-*`, relevant resources |
| `isa95-inventory` | Inventory counts, count lines and material reservations | 3 | `isa95-operations-*`, relevant resources |
| `isa95-calendar` | Work calendars, exceptions, shifts and assignments | 4 | `isa95-hierarchy` |
| `isa95-integration` | B2MML-oriented integration endpoints, transactions, messages and external references | 6 | Operations and resource domains |
| `isa95-traceability` | Common operational status history, events, measurements and document traceability | 4 | Cross-domain |
| **TOTAL** | | **83** | — |

---

## Full Model List by Package

---

## 📦 1. isa95-hierarchy
**Enterprise / site / area / work-center / work-unit hierarchy and operational locations**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `Enterprise` | `isa95_enterprises` | ISA-95 record for enterprise |
| 2 | `Site` | `isa95_sites` | ISA-95 record for site; linked to enterprise |
| 3 | `Area` | `isa95_areas` | ISA-95 record for area; linked to site |
| 4 | `WorkCenter` | `isa95_work_centers` | ISA-95 record for work center; linked to area |
| 5 | `WorkUnit` | `isa95_work_units` | ISA-95 record for work unit; linked to work center |
| 6 | `OperationalLocation` | `isa95_operational_locations` | ISA-95 record for operational location; linked to parent, enterprise, site |
| 7 | `EquipmentHierarchy` | `isa95_equipment_hierarchies` | Equipment hierarchy; linked to parent equipment, child equipment |

---

## 📦 2. isa95-personnel
**Personnel classes, people, capabilities, availability and personnel information**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `PersonnelClass` | `isa95_personnel_classes` | ISA-95 record for personnel class |
| 2 | `Person` | `isa95_people` | Person; linked to personnel class, operational location |
| 3 | `PersonnelCapability` | `isa95_personnel_capabilities` | ISA-95 record for personnel capability; linked to person |
| 4 | `PersonnelAvailability` | `isa95_personnel_availabilities` | Personnel availability; linked to person |
| 5 | `PersonnelInformation` | `isa95_personnel_informations` | Personnel information; linked to person |

---

## 📦 3. isa95-equipment
**Equipment classes, instances, capabilities, availability and equipment information**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `EquipmentClass` | `isa95_equipment_classes` | ISA-95 record for equipment class |
| 2 | `Equipment` | `isa95_equipments` | ISA-95 record for equipment; linked to equipment class, operational location, work unit |
| 3 | `EquipmentCapability` | `isa95_equipment_capabilities` | ISA-95 record for equipment capability; linked to equipment, material definition, process segment |
| 4 | `EquipmentAvailability` | `isa95_equipment_availabilities` | Equipment availability; linked to equipment |
| 5 | `EquipmentInformation` | `isa95_equipment_informations` | Equipment information; linked to equipment |

---

## 📦 4. isa95-assets
**Physical assets, equipment assignment and physical-asset capabilities**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `PhysicalAssetClass` | `isa95_physical_asset_classes` | ISA-95 record for physical asset class |
| 2 | `PhysicalAsset` | `isa95_physical_assets` | ISA-95 record for physical asset; linked to physical asset class, operational location, parent |
| 3 | `EquipmentPhysicalAsset` | `isa95_equipment_physical_assets` | Equipment physical asset; linked to equipment, physical asset |
| 4 | `PhysicalAssetCapability` | `isa95_physical_asset_capabilities` | Physical asset capability; linked to physical asset |

---

## 📦 5. isa95-material
**Material classes, definitions, lots, availability, capability and movements**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `MaterialClass` | `isa95_material_classes` | ISA-95 record for material class |
| 2 | `MaterialDefinition` | `isa95_material_definitions` | ISA-95 record for material definition; linked to material class |
| 3 | `MaterialLot` | `isa95_material_lots` | Material lot; linked to material definition, operational location, parent lot |
| 4 | `MaterialSublot` | `isa95_material_sublots` | Material sublot; linked to material lot, operational location |
| 5 | `MaterialCapability` | `isa95_material_capabilities` | Material capability; linked to material definition |
| 6 | `MaterialAvailability` | `isa95_material_availabilities` | Material availability; linked to material definition, material lot, operational location |
| 7 | `MaterialMovement` | `isa95_material_movements` | Material movement; linked to material definition, material lot, material sublot |

---

## 📦 6. isa95-process-product
**Process segments and product-definition structures, BOMs and production rules**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProcessSegment` | `isa95_process_segments` | ISA-95 record for process segment |
| 2 | `ProcessSegmentCapability` | `isa95_process_segment_capabilities` | Process segment capability; linked to process segment |
| 3 | `ProcessSegmentParameter` | `isa95_process_segment_parameters` | Process segment parameter; linked to process segment |
| 4 | `ProductDefinition` | `isa95_product_definitions` | ISA-95 record for product definition; linked to material definition |
| 5 | `ProductSegment` | `isa95_product_segments` | ISA-95 record for product segment; linked to product definition, process segment |
| 6 | `BillOfMaterial` | `isa95_bill_of_materials` | Bill of material; linked to product definition, product segment, material definition |
| 7 | `ProductProductionRule` | `isa95_product_production_rules` | ISA-95 record for product production rule; linked to product definition |
| 8 | `ProductInformation` | `isa95_product_informations` | Product information; linked to product definition |

---

## 📦 7. isa95-operations-definition
**Common operations definitions, segments, dependencies and capabilities**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsDefinition` | `isa95_operations_definitions` | ISA-95 record for operations definition |
| 2 | `OperationsSegment` | `isa95_operations_segments` | ISA-95 record for operations segment; linked to operations definition, process segment |
| 3 | `OperationsSegmentDependency` | `isa95_operations_segment_dependencies` | Operations segment dependency; linked to operations segment, depends on segment |
| 4 | `OperationsCapability` | `isa95_operations_capabilities` | ISA-95 record for operations capability |

---

## 📦 8. isa95-operations-request
**Operations demand and requested segments**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsRequest` | `isa95_operations_requests` | Operations request; linked to operations definition, product definition, material definition |
| 2 | `OperationsRequestSegment` | `isa95_operations_request_segments` | Operations request segment; linked to operations request, operations segment |

---

## 📦 9. isa95-operations-scheduling
**Operations schedules, request linkage, segment schedules and resource assignments**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsSchedule` | `isa95_operations_schedules` | Operations schedule; linked to operations definition, operational location |
| 2 | `OperationsScheduleRequest` | `isa95_operations_schedule_requests` | Operations schedule request; linked to operations schedule, operations request |
| 3 | `OperationsSegmentSchedule` | `isa95_operations_segment_schedules` | Operations segment schedule; linked to operations schedule, operations segment, operations request segment |
| 4 | `OperationsResourceAssignment` | `isa95_operations_resource_assignments` | Operations resource assignment; linked to operations schedule, operations segment schedule, operations request |

---

## 📦 10. isa95-operations-performance
**Execution performance and personnel/equipment/material/asset actuals**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsPerformance` | `isa95_operations_performances` | Operations performance; linked to operations schedule, operations request, operations definition |
| 2 | `OperationsSegmentPerformance` | `isa95_operations_segment_performances` | Operations segment performance; linked to operations performance, operations segment, operations segment schedule |
| 3 | `OperationsMaterialActual` | `isa95_operations_material_actuals` | Operations material actual; linked to operations performance, operations segment performance, material definition |
| 4 | `OperationsPersonnelActual` | `isa95_operations_personnel_actuals` | Operations personnel actual; linked to operations performance, operations segment performance, person |
| 5 | `OperationsEquipmentActual` | `isa95_operations_equipment_actuals` | Operations equipment actual; linked to operations performance, operations segment performance, equipment |
| 6 | `OperationsPhysicalAssetActual` | `isa95_operations_physical_asset_actuals` | Operations physical asset actual; linked to operations performance, physical asset |

---

## 📦 11. isa95-operations-response
**Operations responses and exchanged operations information**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsResponse` | `isa95_operations_responses` | Operations response; linked to operations performance, operations request |
| 2 | `OperationsSegmentResponse` | `isa95_operations_segment_responses` | Operations segment response; linked to operations response, operations segment performance |
| 3 | `OperationsInformation` | `isa95_operations_informations` | Operations information; linked to operations performance, operations schedule |

---

## 📦 12. isa95-production
**Production orders, production lots and genealogy**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProductionOrder` | `isa95_production_orders` | Production order; linked to operations request, product definition |
| 2 | `ProductionLot` | `isa95_production_lots` | Production lot; linked to production order, product definition |
| 3 | `ProductionGenealogy` | `isa95_production_genealogies` | Production genealogy; linked to production lot, input material lot, output material lot |

---

## 📦 13. isa95-maintenance
**Maintenance work orders, tasks and measurements**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `MaintenanceWorkOrder` | `isa95_maintenance_work_orders` | ISA-95 record for maintenance work order; linked to operations request, equipment, physical asset |
| 2 | `MaintenanceWorkOrderTask` | `isa95_maintenance_work_order_tasks` | ISA-95 record for maintenance work order task; linked to maintenance work order, process segment |
| 3 | `MaintenanceMeasurement` | `isa95_maintenance_measurements` | Maintenance measurement; linked to maintenance work order, equipment, physical asset |

---

## 📦 14. isa95-quality
**Quality test specifications, results and nonconformance**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `TestSpecification` | `isa95_test_specifications` | ISA-95 record for test specification; linked to product definition, material definition, process segment |
| 2 | `TestSpecificationParameter` | `isa95_test_specification_parameters` | Test specification parameter; linked to test specification |
| 3 | `TestResult` | `isa95_test_results` | Test result; linked to test specification, operations performance, production lot |
| 4 | `TestResultValue` | `isa95_test_result_values` | Test result value; linked to test result |
| 5 | `NonconformanceRecord` | `isa95_nonconformance_records` | ISA-95 record for nonconformance record; linked to operations performance, production lot, material lot |

---

## 📦 15. isa95-inventory
**Inventory counts, count lines and material reservations**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `InventoryCount` | `isa95_inventory_counts` | Inventory count; linked to operational location |
| 2 | `InventoryCountLine` | `isa95_inventory_count_lines` | Inventory count line; linked to inventory count, material definition, material lot |
| 3 | `MaterialReservation` | `isa95_material_reservations` | Material reservation; linked to operations request, material definition, material lot |

---

## 📦 16. isa95-calendar
**Work calendars, exceptions, shifts and assignments**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `WorkCalendar` | `isa95_work_calendars` | ISA-95 record for work calendar; linked to operational location |
| 2 | `WorkCalendarException` | `isa95_work_calendar_exceptions` | ISA-95 record for work calendar exception; linked to work calendar |
| 3 | `WorkShift` | `isa95_work_shifts` | ISA-95 record for work shift |
| 4 | `WorkShiftAssignment` | `isa95_work_shift_assignments` | Work shift assignment; linked to work shift, work calendar, person |

---

## 📦 17. isa95-integration
**B2MML-oriented integration endpoints, transactions, messages and external references**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `IntegrationEndpoint` | `isa95_integration_endpoints` | Integration endpoint |
| 2 | `TransactionDefinition` | `isa95_transaction_definitions` | ISA-95 record for transaction definition |
| 3 | `IntegrationMessage` | `isa95_integration_messages` | Integration message; linked to integration endpoint, transaction definition |
| 4 | `TransactionRequest` | `isa95_transaction_requests` | Transaction request; linked to integration message, transaction definition, source endpoint |
| 5 | `TransactionResponse` | `isa95_transaction_responses` | Transaction response; linked to transaction request, integration message |
| 6 | `ExternalReference` | `isa95_external_references` | External reference; linked to integration endpoint |

---

## 📦 18. isa95-traceability
**Common operational status history, events, measurements and document traceability**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ResourceStatusHistory` | `isa95_resource_status_histories` | Resource status history |
| 2 | `OperationalEvent` | `isa95_operational_events` | ISA-95 record for operational event; linked to operational location |
| 3 | `Measurement` | `isa95_measurements` | Measurement; linked to operations performance |
| 4 | `DocumentReference` | `isa95_document_references` | ISA-95 record for document reference |

---

## High-Level Dependency Graph

```text
isa95-hierarchy
├─ isa95-personnel
├─ isa95-equipment ── isa95-assets
├─ isa95-material
├─ isa95-process-product
└─ operations chain
   ├─ isa95-operations-definition
   ├─ isa95-operations-request
   ├─ isa95-operations-scheduling
   ├─ isa95-operations-performance
   └─ isa95-operations-response
      ├─ isa95-production
      ├─ isa95-maintenance
      ├─ isa95-quality
      └─ isa95-inventory

isa95-calendar      → supports operational scheduling
isa95-integration   → B2MML / external-system exchange
isa95-traceability  → cross-domain status/event/measurement/document references
```

---

## Implementation Notes
- **Canonical Source:** `draft.yaml`; this Markdown is its human-readable model catalogue.
- **Model Count:** 83 top-level models under `models:`.
- **Domain Groups:** 18 YAML sections, represented above in the same package-list style as the original document.
- **Relationships:** The YAML contains 159 explicit `foreign:` fields. These are database foreign-key definitions, not a direct count of Eloquent relationship methods.
- **Generic References:** Nine models contain `*_type` + `*_id` UUID pairs suitable for deliberately configured polymorphic relations.
- **Table Naming:** All tables use the `isa95_` prefix. Review Laravel Blueprint pluralization in generated migrations.
- **Primary Keys:** The YAML defines UUID IDs throughout the model catalogue.
- **B2MML:** Treat this as a B2MML-oriented relational implementation, not automatic formal conformance. Explicit message mapping and validation against the official B2MML V0700 XSDs remain necessary.
- **Admin UI:** Filament or other management UI should consume the domain models rather than redefine the ISA-95 schema.

Below is the full draft.yaml blueprint
```yaml
# Rimba ISA-95 Master Data & Manufacturing Operations Management Schema
# Laravel Blueprint YAML
#
# Scope:
#   - ISA-95 / IEC 62264 concepts from Parts 1-5
#   - B2MML V0700-oriented information model and integration mappings
#   - Rimba implementation extensions for operational use
#
# IMPORTANT:
#   This is an implementation schema, not a claim of formal ISA-95 or B2MML
#   conformance. Validate exchanged XML against the official B2MML V0700 XSDs.
#   Map Rimba's relational model to the standard message structures explicitly.
#
# Namespace: App\Models\ISA95
# Prefix: isa95_
#
# Design notes:
#   - Standard concepts are represented with typed columns where practical.
#   - JSON is reserved for extensible properties, parameters and payloads.
#   - Equipment hierarchy and physical-asset hierarchy are separate.
#   - Enterprise hierarchy is separate from equipment hierarchy.
#   - Operations are separated into Definition, Request, Schedule,
#     Performance and Response information.
#   - The four MOM operation categories are Production, Maintenance,
#     Quality and Inventory.
#
# Review the generated migrations for your Laravel Blueprint version.
# Use explicit model/table mappings if your Blueprint version does not
# infer the intended table names from these model names.

namespace: App\Models\ISA95
prefix: isa95_

models:

  # =====================================================================
  # 01. ENTERPRISE / SITE / AREA / EQUIPMENT HIERARCHY
  # =====================================================================

  Enterprise:
    id: uuid
    enterprise_id: string unique
    name: string
    description: text nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  Site:
    id: uuid
    enterprise_id: foreign:isa95_enterprises
    site_id: string unique
    name: string
    description: text nullable
    address: jsonb nullable
    timezone: string nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  Area:
    id: uuid
    site_id: foreign:isa95_sites
    area_id: string unique
    name: string
    description: text nullable
    area_type: string nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  WorkCenter:
    id: uuid
    area_id: foreign:isa95_areas
    work_center_id: string unique
    name: string
    description: text nullable
    work_center_type: string nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  WorkUnit:
    id: uuid
    work_center_id: foreign:isa95_work_centers
    work_unit_id: string unique
    name: string
    description: text nullable
    work_unit_type: string nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  OperationalLocation:
    id: uuid
    location_id: string unique
    parent_id: foreign:isa95_operational_locations nullable
    enterprise_id: foreign:isa95_enterprises nullable
    site_id: foreign:isa95_sites nullable
    area_id: foreign:isa95_areas nullable
    work_center_id: foreign:isa95_work_centers nullable
    work_unit_id: foreign:isa95_work_units nullable
    name: string
    description: text nullable
    location_type: enum:enterprise,site,area,work_center,work_unit,storage,warehouse,other
    address: jsonb nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  EquipmentHierarchy:
    id: uuid
    parent_equipment_id: foreign:isa95_equipment nullable
    child_equipment_id: foreign:isa95_equipment
    hierarchy_type: string nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    timestamps: true
    indexes:
      - [parent_equipment_id, child_equipment_id] unique

  # =====================================================================
  # 02. PERSONNEL RESOURCES
  # =====================================================================

  PersonnelClass:
    id: uuid
    code: string unique
    name: string
    description: text nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  Person:
    id: uuid
    person_id: string unique
    personnel_class_id: foreign:isa95_personnel_classes nullable
    name: string
    given_name: string nullable
    family_name: string nullable
    middle_name: string nullable
    role: string nullable
    cost_center: string nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    status: enum:active,inactive,on_leave,retired default:active
    effective_from: date nullable
    effective_to: date nullable
    external_reference: string nullable
    properties: jsonb nullable
    timestamps: true

  PersonnelCapability:
    id: uuid
    person_id: foreign:isa95_people
    capability_type: enum:skill,certification,authorization,qualification,training
    code: string
    name: string
    description: text nullable
    proficiency_level: integer nullable
    rating: decimal:8,3 nullable
    certified_date: date nullable
    valid_from: date nullable
    valid_until: date nullable
    issuing_authority: string nullable
    status: enum:pending,valid,expired,suspended,revoked default:valid
    properties: jsonb nullable
    timestamps: true
    indexes:
      - [person_id, code, valid_from]

  PersonnelAvailability:
    id: uuid
    person_id: foreign:isa95_people
    availability_type: enum:available,unavailable,planned,leave,training
    start_at: datetime
    end_at: datetime
    reason: string nullable
    source_system: string nullable
    source_reference: string nullable
    properties: jsonb nullable
    timestamps: true

  PersonnelInformation:
    id: uuid
    person_id: foreign:isa95_people
    information_type: string
    information_code: string
    value: jsonb nullable
    uom: string nullable
    effective_from: datetime nullable
    effective_to: datetime nullable
    timestamps: true

  # =====================================================================
  # 03. EQUIPMENT RESOURCES
  # =====================================================================

  EquipmentClass:
    id: uuid
    code: string unique
    name: string
    description: text nullable
    category: string nullable
    model_number: string nullable
    manufacturer: string nullable
    property_definitions: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  Equipment:
    id: uuid
    equipment_id: string unique
    equipment_class_id: foreign:isa95_equipment_classes
    operational_location_id: foreign:isa95_operational_locations nullable
    work_unit_id: foreign:isa95_work_units nullable
    name: string
    description: text nullable
    serial_number: string nullable
    manufacturer: string nullable
    model_number: string nullable
    install_date: date nullable
    commission_date: date nullable
    status: enum:available,occupied,unavailable,maintenance,decommissioned default:available
    capacity: decimal:16,6 nullable
    capacity_uom: string nullable
    parent_id: foreign:isa95_equipment nullable
    external_reference: string nullable
    properties: jsonb nullable
    timestamps: true

  EquipmentCapability:
    id: uuid
    equipment_id: foreign:isa95_equipment
    capability_type: enum:production,maintenance,quality,inventory,storage,handling
    code: string
    name: string
    description: text nullable
    material_definition_id: foreign:isa95_material_definitions nullable
    process_segment_id: foreign:isa95_process_segments nullable
    rated_capacity: decimal:16,6 nullable
    capacity_uom: string nullable
    rated_speed: decimal:16,6 nullable
    speed_uom: string nullable
    efficiency: decimal:8,4 nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  EquipmentAvailability:
    id: uuid
    equipment_id: foreign:isa95_equipment
    availability_type: enum:available,unavailable,planned,maintenance,setup,breakdown
    start_at: datetime
    end_at: datetime
    reason: string nullable
    source_system: string nullable
    source_reference: string nullable
    properties: jsonb nullable
    timestamps: true

  EquipmentInformation:
    id: uuid
    equipment_id: foreign:isa95_equipment
    information_type: string
    property_code: string
    value: jsonb nullable
    uom: string nullable
    effective_from: datetime nullable
    effective_to: datetime nullable
    recorded_at: datetime nullable
    recorded_by: string nullable
    timestamps: true

  # =====================================================================
  # 04. PHYSICAL ASSET RESOURCES
  # =====================================================================

  PhysicalAssetClass:
    id: uuid
    code: string unique
    name: string
    description: text nullable
    category: enum:facility,system,component,tooling,instrument,other
    property_schema: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  PhysicalAsset:
    id: uuid
    asset_id: string unique
    physical_asset_class_id: foreign:isa95_physical_asset_classes
    operational_location_id: foreign:isa95_operational_locations nullable
    name: string
    description: text nullable
    serial_number: string nullable
    manufacturer: string nullable
    model_number: string nullable
    install_date: date nullable
    expected_life_months: integer nullable
    status: enum:commissioned,operational,degraded,down,decommissioned default:operational
    parent_id: foreign:isa95_physical_assets nullable
    properties: jsonb nullable
    timestamps: true

  EquipmentPhysicalAsset:
    id: uuid
    equipment_id: foreign:isa95_equipment
    physical_asset_id: foreign:isa95_physical_assets
    relationship_type: string nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    timestamps: true
    indexes:
      - [equipment_id, physical_asset_id, valid_from] unique

  PhysicalAssetCapability:
    id: uuid
    physical_asset_id: foreign:isa95_physical_assets
    capability_type: string
    code: string
    value: decimal:16,6 nullable
    uom: string nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 05. MATERIAL RESOURCES
  # =====================================================================

  MaterialClass:
    id: uuid
    code: string unique
    name: string
    description: text nullable
    category: enum:raw,intermediate,finished,packaging,waste,consumable,chemical
    lot_control_required: boolean default:false
    batch_control_required: boolean default:false
    hazard_class: string nullable
    storage_specification: jsonb nullable
    properties: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  MaterialDefinition:
    id: uuid
    material_code: string unique
    material_class_id: foreign:isa95_material_classes
    name: string
    description: text nullable
    version: string default:"1.0"
    base_uom: string
    lot_controlled: boolean default:true
    batch_controlled: boolean default:false
    shelf_life_days: integer nullable
    storage_condition: string nullable
    status: enum:draft,approved,obsolete,retired default:draft
    effective_from: datetime nullable
    effective_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  MaterialLot:
    id: uuid
    material_definition_id: foreign:isa95_material_definitions
    lot_number: string
    supplier_lot: string nullable
    quantity: decimal:20,6
    uom: string
    status: enum:available,allocated,quarantined,hold,scrap,consumed,expired default:available
    operational_location_id: foreign:isa95_operational_locations nullable
    received_at: datetime nullable
    manufactured_at: datetime nullable
    expiry_at: datetime nullable
    parent_lot_id: foreign:isa95_material_lots nullable
    supplier_reference: string nullable
    properties: jsonb nullable
    timestamps: true
    indexes:
      - [material_definition_id, lot_number] unique

  MaterialSublot:
    id: uuid
    material_lot_id: foreign:isa95_material_lots
    sublot_number: string
    quantity: decimal:20,6
    uom: string
    status: enum:available,allocated,quarantined,hold,scrap,consumed,expired default:available
    operational_location_id: foreign:isa95_operational_locations nullable
    properties: jsonb nullable
    timestamps: true
    indexes:
      - [material_lot_id, sublot_number] unique

  MaterialCapability:
    id: uuid
    material_definition_id: foreign:isa95_material_definitions
    capability_type: string
    code: string
    value: decimal:16,6 nullable
    uom: string nullable
    specification_reference: string nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  MaterialAvailability:
    id: uuid
    material_definition_id: foreign:isa95_material_definitions
    material_lot_id: foreign:isa95_material_lots nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    available_quantity: decimal:20,6
    reserved_quantity: decimal:20,6 default:0
    uom: string
    available_from: datetime nullable
    available_to: datetime nullable
    status: enum:available,reserved,blocked,quarantined default:available
    timestamps: true

  MaterialMovement:
    id: uuid
    movement_id: string unique
    material_definition_id: foreign:isa95_material_definitions
    material_lot_id: foreign:isa95_material_lots nullable
    material_sublot_id: foreign:isa95_material_sublots nullable
    from_location_id: foreign:isa95_operational_locations nullable
    to_location_id: foreign:isa95_operational_locations nullable
    quantity: decimal:20,6
    uom: string
    movement_type: enum:receipt,issue,transfer,return,adjustment,consume,produce,scrap
    moved_at: datetime
    reference_type: string nullable
    reference_id: uuid nullable
    performed_by: string nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 06. PROCESS SEGMENTS AND PRODUCT DEFINITIONS
  # =====================================================================

  ProcessSegment:
    id: uuid
    segment_id: string unique
    code: string
    name: string
    description: text nullable
    segment_type: string nullable
    estimated_duration: decimal:12,3 nullable
    duration_uom: string nullable
    status: enum:draft,released,obsolete default:draft
    version: string default:"1.0"
    parameter_definitions: jsonb nullable
    properties: jsonb nullable
    timestamps: true

  ProcessSegmentCapability:
    id: uuid
    process_segment_id: foreign:isa95_process_segments
    resource_type: enum:personnel,equipment,material,physical_asset
    resource_id: uuid nullable
    capability_type: string nullable
    capability_reference: string nullable
    minimum_level: decimal:12,4 nullable
    maximum_level: decimal:12,4 nullable
    properties: jsonb nullable
    timestamps: true

  ProcessSegmentParameter:
    id: uuid
    process_segment_id: foreign:isa95_process_segments
    parameter_code: string
    name: string
    data_type: string
    default_value: jsonb nullable
    minimum_value: decimal:20,8 nullable
    maximum_value: decimal:20,8 nullable
    uom: string nullable
    is_required: boolean default:false
    properties: jsonb nullable
    timestamps: true

  ProductDefinition:
    id: uuid
    product_id: string unique
    material_definition_id: foreign:isa95_material_definitions nullable
    name: string
    description: text nullable
    version: string default:"1.0"
    status: enum:draft,approved,obsolete,retired default:draft
    effective_from: datetime nullable
    effective_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  ProductSegment:
    id: uuid
    product_definition_id: foreign:isa95_product_definitions
    process_segment_id: foreign:isa95_process_segments
    sequence: integer
    name: string nullable
    description: text nullable
    planned_duration: decimal:12,3 nullable
    duration_uom: string nullable
    transition_logic: jsonb nullable
    properties: jsonb nullable
    timestamps: true
    indexes:
      - [product_definition_id, sequence] unique

  BillOfMaterial:
    id: uuid
    product_definition_id: foreign:isa95_product_definitions
    product_segment_id: foreign:isa95_product_segments nullable
    material_definition_id: foreign:isa95_material_definitions
    quantity: decimal:20,8
    uom: string
    consumption_type: enum:consumed,produced,recycled,waste default:consumed
    sequence: integer default:1
    scrap_factor: decimal:8,5 default:1.0
    effective_from: datetime nullable
    effective_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  ProductProductionRule:
    id: uuid
    product_definition_id: foreign:isa95_product_definitions
    rule_code: string
    name: string
    description: text nullable
    rule_type: string nullable
    rule_definition: jsonb
    effective_from: datetime nullable
    effective_to: datetime nullable
    timestamps: true

  ProductInformation:
    id: uuid
    product_definition_id: foreign:isa95_product_definitions
    information_type: string
    parameter_code: string
    value: jsonb nullable
    uom: string nullable
    version: string nullable
    effective_from: datetime nullable
    effective_to: datetime nullable
    timestamps: true

  # =====================================================================
  # 07. OPERATIONS DEFINITIONS (PRODUCTION / MAINTENANCE / QUALITY / INVENTORY)
  # =====================================================================

  OperationsDefinition:
    id: uuid
    definition_id: string unique
    operations_type: enum:production,maintenance,quality,inventory
    name: string
    description: text nullable
    version: string default:"1.0"
    status: enum:draft,approved,released,obsolete default:draft
    effective_from: datetime nullable
    effective_to: datetime nullable
    process_flow: jsonb nullable
    parameter_definitions: jsonb nullable
    properties: jsonb nullable
    timestamps: true

  OperationsSegment:
    id: uuid
    operations_definition_id: foreign:isa95_operations_definitions
    process_segment_id: foreign:isa95_process_segments nullable
    segment_id: string
    sequence: integer
    name: string
    description: text nullable
    segment_type: string nullable
    duration: decimal:12,3 nullable
    duration_uom: string nullable
    parameter_definitions: jsonb nullable
    properties: jsonb nullable
    timestamps: true
    indexes:
      - [operations_definition_id, sequence] unique

  OperationsSegmentDependency:
    id: uuid
    operations_segment_id: foreign:isa95_operations_segments
    depends_on_segment_id: foreign:isa95_operations_segments
    dependency_type: enum:finish_to_start,start_to_start,finish_to_finish,start_to_finish default:finish_to_start
    lag_duration: decimal:12,3 nullable
    lag_uom: string nullable
    timestamps: true

  OperationsCapability:
    id: uuid
    operations_type: enum:production,maintenance,quality,inventory
    capability_id: string
    name: string
    description: text nullable
    resource_type: enum:personnel,equipment,physical_asset,material,process_segment
    resource_id: uuid nullable
    capability_definition: jsonb nullable
    valid_from: datetime nullable
    valid_to: datetime nullable
    timestamps: true

  # =====================================================================
  # 08. OPERATIONS REQUESTS
  # =====================================================================

  OperationsRequest:
    id: uuid
    request_id: string unique
    operations_type: enum:production,maintenance,quality,inventory
    operations_definition_id: foreign:isa95_operations_definitions nullable
    product_definition_id: foreign:isa95_product_definitions nullable
    material_definition_id: foreign:isa95_material_definitions nullable
    requested_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    priority: integer default:5
    requested_start: datetime nullable
    requested_end: datetime nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    status: enum:draft,submitted,accepted,rejected,planned,released,in_progress,on_hold,completed,cancelled default:draft
    requester_reference: string nullable
    source_system: string nullable
    source_reference: string nullable
    request_data: jsonb nullable
    timestamps: true

  OperationsRequestSegment:
    id: uuid
    operations_request_id: foreign:isa95_operations_requests
    operations_segment_id: foreign:isa95_operations_segments nullable
    segment_id: string
    sequence: integer
    requested_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    requested_start: datetime nullable
    requested_end: datetime nullable
    parameters: jsonb nullable
    timestamps: true

  # =====================================================================
  # 09. OPERATIONS SCHEDULES AND RESOURCE ASSIGNMENTS
  # =====================================================================

  OperationsSchedule:
    id: uuid
    schedule_id: string unique
    operations_type: enum:production,maintenance,quality,inventory
    operations_definition_id: foreign:isa95_operations_definitions nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    planning_horizon_start: datetime
    planning_horizon_end: datetime
    scheduled_start: datetime nullable
    scheduled_end: datetime nullable
    priority: integer default:5
    status: enum:proposed,firm,approved,released,in_progress,closed,cancelled default:proposed
    source_system: string nullable
    source_reference: string nullable
    schedule_data: jsonb nullable
    timestamps: true

  OperationsScheduleRequest:
    id: uuid
    operations_schedule_id: foreign:isa95_operations_schedules
    operations_request_id: foreign:isa95_operations_requests
    allocated_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    sequence: integer nullable
    timestamps: true
    indexes:
      - [operations_schedule_id, operations_request_id] unique

  OperationsSegmentSchedule:
    id: uuid
    operations_schedule_id: foreign:isa95_operations_schedules
    operations_segment_id: foreign:isa95_operations_segments nullable
    operations_request_segment_id: foreign:isa95_operations_request_segments nullable
    segment_id: string
    sequence: integer
    scheduled_start: datetime nullable
    scheduled_end: datetime nullable
    planned_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    parameters: jsonb nullable
    status: enum:planned,ready,dispatched,in_progress,completed,skipped,cancelled default:planned
    timestamps: true

  OperationsResourceAssignment:
    id: uuid
    operations_schedule_id: foreign:isa95_operations_schedules nullable
    operations_segment_schedule_id: foreign:isa95_operations_segment_schedules nullable
    operations_request_id: foreign:isa95_operations_requests nullable
    resource_type: enum:personnel,equipment,physical_asset,material,location
    resource_id: uuid
    assignment_role: string nullable
    assigned_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    assigned_from: datetime nullable
    assigned_to: datetime nullable
    status: enum:planned,assigned,confirmed,released,cancelled default:planned
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 10. OPERATIONS PERFORMANCE / ACTUALS
  # =====================================================================

  OperationsPerformance:
    id: uuid
    performance_id: string unique
    operations_type: enum:production,maintenance,quality,inventory
    operations_schedule_id: foreign:isa95_operations_schedules nullable
    operations_request_id: foreign:isa95_operations_requests nullable
    operations_definition_id: foreign:isa95_operations_definitions nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    actual_start: datetime nullable
    actual_end: datetime nullable
    status: enum:started,paused,completed,aborted,exception default:started
    actual_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    good_quantity: decimal:20,6 nullable
    scrap_quantity: decimal:20,6 nullable
    rework_quantity: decimal:20,6 nullable
    shift_code: string nullable
    source_system: string nullable
    source_reference: string nullable
    actual_data: jsonb nullable
    timestamps: true

  OperationsSegmentPerformance:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances
    operations_segment_id: foreign:isa95_operations_segments nullable
    operations_segment_schedule_id: foreign:isa95_operations_segment_schedules nullable
    segment_id: string
    sequence: integer nullable
    actual_start: datetime nullable
    actual_end: datetime nullable
    status: enum:started,paused,completed,aborted,skipped,exception default:started
    actual_quantity: decimal:20,6 nullable
    quantity_uom: string nullable
    actual_parameters: jsonb nullable
    observations: jsonb nullable
    timestamps: true

  OperationsMaterialActual:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances
    operations_segment_performance_id: foreign:isa95_operations_segment_performances nullable
    material_definition_id: foreign:isa95_material_definitions
    material_lot_id: foreign:isa95_material_lots nullable
    material_sublot_id: foreign:isa95_material_sublots nullable
    actual_quantity: decimal:20,8
    quantity_uom: string
    material_use: enum:consumed,produced,returned,scrapped,reworked
    occurred_at: datetime nullable
    properties: jsonb nullable
    timestamps: true

  OperationsPersonnelActual:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances
    operations_segment_performance_id: foreign:isa95_operations_segment_performances nullable
    person_id: foreign:isa95_people
    participation_type: string nullable
    start_at: datetime nullable
    end_at: datetime nullable
    labor_hours: decimal:12,4 nullable
    properties: jsonb nullable
    timestamps: true

  OperationsEquipmentActual:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances
    operations_segment_performance_id: foreign:isa95_operations_segment_performances nullable
    equipment_id: foreign:isa95_equipment
    usage_type: string nullable
    start_at: datetime nullable
    end_at: datetime nullable
    operating_hours: decimal:12,4 nullable
    properties: jsonb nullable
    timestamps: true

  OperationsPhysicalAssetActual:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances
    physical_asset_id: foreign:isa95_physical_assets
    usage_type: string nullable
    start_at: datetime nullable
    end_at: datetime nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 11. OPERATIONS RESPONSES AND INFORMATION
  # =====================================================================

  OperationsResponse:
    id: uuid
    response_id: string unique
    operations_type: enum:production,maintenance,quality,inventory
    operations_performance_id: foreign:isa95_operations_performances nullable
    operations_request_id: foreign:isa95_operations_requests nullable
    response_type: string
    status: enum:pending,accepted,rejected,processed,failed default:pending
    message: text nullable
    responded_at: datetime nullable
    source_system: string nullable
    source_reference: string nullable
    payload_snapshot: jsonb nullable
    timestamps: true

  OperationsSegmentResponse:
    id: uuid
    operations_response_id: foreign:isa95_operations_responses
    operations_segment_performance_id: foreign:isa95_operations_segment_performances nullable
    segment_id: string
    response_type: string
    status: string nullable
    response_data: jsonb nullable
    timestamps: true

  OperationsInformation:
    id: uuid
    operations_performance_id: foreign:isa95_operations_performances nullable
    operations_schedule_id: foreign:isa95_operations_schedules nullable
    information_type: string
    information_code: string
    value: jsonb nullable
    uom: string nullable
    occurred_at: datetime
    recorded_by: string nullable
    timestamps: true

  # =====================================================================
  # 12. PRODUCTION-SPECIFIC SUPPORT
  # =====================================================================

  ProductionOrder:
    id: uuid
    order_id: string unique
    operations_request_id: foreign:isa95_operations_requests nullable
    product_definition_id: foreign:isa95_product_definitions
    production_quantity: decimal:20,6
    quantity_uom: string
    production_line_reference: string nullable
    planned_start: datetime nullable
    planned_end: datetime nullable
    status: enum:planned,released,in_progress,on_hold,completed,closed,cancelled default:planned
    external_order_reference: string nullable
    properties: jsonb nullable
    timestamps: true

  ProductionLot:
    id: uuid
    production_order_id: foreign:isa95_production_orders nullable
    product_definition_id: foreign:isa95_product_definitions
    lot_number: string unique
    planned_quantity: decimal:20,6 nullable
    actual_quantity: decimal:20,6 nullable
    quantity_uom: string
    status: enum:created,in_process,completed,held,released,rejected,closed default:created
    started_at: datetime nullable
    completed_at: datetime nullable
    properties: jsonb nullable
    timestamps: true

  ProductionGenealogy:
    id: uuid
    production_lot_id: foreign:isa95_production_lots
    input_material_lot_id: foreign:isa95_material_lots nullable
    output_material_lot_id: foreign:isa95_material_lots nullable
    parent_production_lot_id: foreign:isa95_production_lots nullable
    relationship_type: string
    quantity: decimal:20,8 nullable
    quantity_uom: string nullable
    occurred_at: datetime nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 13. MAINTENANCE-SPECIFIC SUPPORT
  # =====================================================================

  MaintenanceWorkOrder:
    id: uuid
    work_order_id: string unique
    operations_request_id: foreign:isa95_operations_requests nullable
    equipment_id: foreign:isa95_equipment nullable
    physical_asset_id: foreign:isa95_physical_assets nullable
    maintenance_type: enum:preventive,corrective,predictive,inspection,emergency,calibration
    priority: integer default:5
    description: text
    requested_at: datetime nullable
    planned_start: datetime nullable
    planned_end: datetime nullable
    actual_start: datetime nullable
    actual_end: datetime nullable
    status: enum:requested,approved,planned,released,in_progress,on_hold,completed,closed,cancelled default:requested
    failure_code: string nullable
    cause_code: string nullable
    resolution: text nullable
    properties: jsonb nullable
    timestamps: true

  MaintenanceWorkOrderTask:
    id: uuid
    maintenance_work_order_id: foreign:isa95_maintenance_work_orders
    sequence: integer
    description: text
    process_segment_id: foreign:isa95_process_segments nullable
    planned_duration: decimal:12,3 nullable
    actual_duration: decimal:12,3 nullable
    status: enum:pending,in_progress,completed,skipped default:pending
    properties: jsonb nullable
    timestamps: true

  MaintenanceMeasurement:
    id: uuid
    maintenance_work_order_id: foreign:isa95_maintenance_work_orders
    equipment_id: foreign:isa95_equipment nullable
    physical_asset_id: foreign:isa95_physical_assets nullable
    measurement_code: string
    value: decimal:20,8 nullable
    uom: string nullable
    measured_at: datetime
    measured_by: string nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 14. QUALITY-SPECIFIC SUPPORT
  # =====================================================================

  TestSpecification:
    id: uuid
    specification_id: string unique
    product_definition_id: foreign:isa95_product_definitions nullable
    material_definition_id: foreign:isa95_material_definitions nullable
    process_segment_id: foreign:isa95_process_segments nullable
    name: string
    description: text nullable
    version: string default:"1.0"
    status: enum:draft,approved,obsolete default:draft
    effective_from: datetime nullable
    effective_to: datetime nullable
    properties: jsonb nullable
    timestamps: true

  TestSpecificationParameter:
    id: uuid
    test_specification_id: foreign:isa95_test_specifications
    parameter_code: string
    name: string
    data_type: string
    target_value: jsonb nullable
    lower_limit: decimal:20,8 nullable
    upper_limit: decimal:20,8 nullable
    uom: string nullable
    is_required: boolean default:true
    sampling_rule: jsonb nullable
    timestamps: true

  TestResult:
    id: uuid
    result_id: string unique
    test_specification_id: foreign:isa95_test_specifications nullable
    operations_performance_id: foreign:isa95_operations_performances nullable
    production_lot_id: foreign:isa95_production_lots nullable
    material_lot_id: foreign:isa95_material_lots nullable
    equipment_id: foreign:isa95_equipment nullable
    tested_at: datetime
    tested_by: string nullable
    overall_result: enum:pass,fail,conditional, pending default:pending
    disposition: enum:accept,reject,rework,hold,scrap,pending default:pending
    comments: text nullable
    properties: jsonb nullable
    timestamps: true

  TestResultValue:
    id: uuid
    test_result_id: foreign:isa95_test_results
    parameter_code: string
    measured_value: jsonb nullable
    numeric_value: decimal:20,8 nullable
    uom: string nullable
    lower_limit: decimal:20,8 nullable
    upper_limit: decimal:20,8 nullable
    result_status: enum:pass,fail,not_evaluated default:not_evaluated
    measured_at: datetime nullable
    timestamps: true

  NonconformanceRecord:
    id: uuid
    nonconformance_id: string unique
    operations_performance_id: foreign:isa95_operations_performances nullable
    production_lot_id: foreign:isa95_production_lots nullable
    material_lot_id: foreign:isa95_material_lots nullable
    equipment_id: foreign:isa95_equipment nullable
    severity: enum:minor,major,critical default:minor
    description: text
    detected_at: datetime
    detected_by: string nullable
    disposition: enum:use_as_is,rework,repair,reject,scrap,hold,pending default:pending
    status: enum:open,under_review,contained,dispositioned,closed default:open
    root_cause: text nullable
    corrective_action: text nullable
    properties: jsonb nullable
    timestamps: true

  # =====================================================================
  # 15. INVENTORY-SPECIFIC SUPPORT
  # =====================================================================

  InventoryCount:
    id: uuid
    count_id: string unique
    operational_location_id: foreign:isa95_operational_locations
    planned_at: datetime nullable
    counted_at: datetime nullable
    status: enum:planned,in_progress,completed,approved,cancelled default:planned
    counted_by: string nullable
    approved_by: string nullable
    notes: text nullable
    timestamps: true

  InventoryCountLine:
    id: uuid
    inventory_count_id: foreign:isa95_inventory_counts
    material_definition_id: foreign:isa95_material_definitions
    material_lot_id: foreign:isa95_material_lots nullable
    expected_quantity: decimal:20,6 nullable
    counted_quantity: decimal:20,6 nullable
    quantity_uom: string
    variance_quantity: decimal:20,6 nullable
    status: enum:matched,variance,unverified default:unverified
    timestamps: true

  MaterialReservation:
    id: uuid
    reservation_id: string unique
    operations_request_id: foreign:isa95_operations_requests nullable
    material_definition_id: foreign:isa95_material_definitions
    material_lot_id: foreign:isa95_material_lots nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    reserved_quantity: decimal:20,6
    quantity_uom: string
    reserved_from: datetime nullable
    reserved_to: datetime nullable
    status: enum:reserved,partially_issued,issued,released,cancelled default:reserved
    timestamps: true

  # =====================================================================
  # 16. SHIFT / CALENDAR / OPERATIONAL TIME
  # =====================================================================

  WorkCalendar:
    id: uuid
    calendar_id: string unique
    name: string
    description: text nullable
    timezone: string nullable
    calendar_type: enum:site,area,work_center,work_unit,personnel,equipment
    operational_location_id: foreign:isa95_operational_locations nullable
    is_active: boolean default:true
    timestamps: true

  WorkCalendarException:
    id: uuid
    work_calendar_id: foreign:isa95_work_calendars
    exception_type: enum:holiday,shutdown,maintenance,extra_shift,other
    starts_at: datetime
    ends_at: datetime
    description: text nullable
    properties: jsonb nullable
    timestamps: true

  WorkShift:
    id: uuid
    shift_id: string unique
    name: string
    description: text nullable
    start_time: time
    end_time: time
    crosses_midnight: boolean default:false
    is_active: boolean default:true
    timestamps: true

  WorkShiftAssignment:
    id: uuid
    work_shift_id: foreign:isa95_work_shifts
    work_calendar_id: foreign:isa95_work_calendars nullable
    person_id: foreign:isa95_people nullable
    equipment_id: foreign:isa95_equipment nullable
    operational_location_id: foreign:isa95_operational_locations nullable
    starts_at: datetime
    ends_at: datetime
    assignment_type: string nullable
    timestamps: true

  # =====================================================================
  # 17. B2MML / ISA-95 TRANSACTION AND INTEGRATION SUPPORT
  # =====================================================================

  IntegrationEndpoint:
    id: uuid
    endpoint_id: string unique
    name: string
    system_type: enum:erp,mes,scada,wms,qms,cmms,plc,other
    protocol: enum:rest,soap,xml_file,message_broker,opc_ua,database,other
    endpoint_uri: text nullable
    direction: enum:inbound,outbound,bidirectional
    configuration: jsonb nullable
    credentials_reference: string nullable
    is_active: boolean default:true
    timestamps: true

  TransactionDefinition:
    id: uuid
    transaction_code: string unique
    name: string
    description: text nullable
    operations_type: enum:production,maintenance,quality,inventory nullable
    message_type: string
    standard_part: string nullable
    b2mml_schema_name: string nullable
    direction: enum:inbound,outbound,bidirectional
    version: string default:"1.0"
    mapping_definition: jsonb nullable
    is_active: boolean default:true
    timestamps: true

  IntegrationMessage:
    id: uuid
    message_id: string unique
    integration_endpoint_id: foreign:isa95_integration_endpoints nullable
    transaction_definition_id: foreign:isa95_transaction_definitions nullable
    correlation_id: string nullable
    message_type: string
    direction: enum:inbound,outbound
    format: enum:xml,json,other
    schema_version: string nullable
    status: enum:received,validated,queued,processing,processed,failed,rejected default:received
    received_at: datetime nullable
    processed_at: datetime nullable
    payload: longText nullable
    payload_hash: string nullable
    error_details: jsonb nullable
    timestamps: true

  TransactionRequest:
    id: uuid
    transaction_id: string unique
    integration_message_id: foreign:isa95_integration_messages nullable
    transaction_definition_id: foreign:isa95_transaction_definitions
    source_endpoint_id: foreign:isa95_integration_endpoints nullable
    target_endpoint_id: foreign:isa95_integration_endpoints nullable
    business_reference: string nullable
    correlation_id: string nullable
    status: enum:created,submitted,acknowledged,completed,failed,cancelled default:created
    requested_at: datetime
    completed_at: datetime nullable
    request_payload: jsonb nullable
    timestamps: true

  TransactionResponse:
    id: uuid
    transaction_request_id: foreign:isa95_transaction_requests
    integration_message_id: foreign:isa95_integration_messages nullable
    response_code: string nullable
    response_status: enum:accepted,rejected,completed,failed,warning
    message: text nullable
    responded_at: datetime
    response_payload: jsonb nullable
    timestamps: true

  ExternalReference:
    id: uuid
    integration_endpoint_id: foreign:isa95_integration_endpoints nullable
    entity_type: string
    entity_id: uuid
    external_id: string
    external_type: string nullable
    last_synchronized_at: datetime nullable
    synchronization_status: enum:pending,synchronized,failed,ignored default:pending
    metadata: jsonb nullable
    timestamps: true
    indexes:
      - [integration_endpoint_id, entity_type, entity_id] unique
      - [integration_endpoint_id, external_id]

  # =====================================================================
  # 18. AUDIT / TRACEABILITY / COMMON EXTENSIONS
  # =====================================================================

  ResourceStatusHistory:
    id: uuid
    resource_type: string
    resource_id: uuid
    previous_status: string nullable
    new_status: string
    changed_at: datetime
    changed_by: string nullable
    reason: text nullable
    source_system: string nullable
    timestamps: true

  OperationalEvent:
    id: uuid
    event_id: string unique
    event_type: string
    severity: enum:info,warning,error,critical default:info
    operational_location_id: foreign:isa95_operational_locations nullable
    resource_type: string nullable
    resource_id: uuid nullable
    occurred_at: datetime
    reported_at: datetime nullable
    source_system: string nullable
    source_reference: string nullable
    description: text nullable
    event_data: jsonb nullable
    timestamps: true

  Measurement:
    id: uuid
    measurement_id: string unique
    measurement_type: string
    parameter_code: string
    resource_type: string nullable
    resource_id: uuid nullable
    operations_performance_id: foreign:isa95_operations_performances nullable
    numeric_value: decimal:24,10 nullable
    text_value: text nullable
    structured_value: jsonb nullable
    uom: string nullable
    measured_at: datetime
    measured_by: string nullable
    source_system: string nullable
    quality_code: string nullable
    timestamps: true

  DocumentReference:
    id: uuid
    reference_type: string
    reference_id: uuid
    document_identifier: string
    document_version: string nullable
    document_uri: text nullable
    document_type: string nullable
    description: text nullable
    effective_from: datetime nullable
    effective_to: datetime nullable
    timestamps: true
```