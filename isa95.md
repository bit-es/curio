# ISA‑95 / B2MML MOM — Laravel Package Model List
**Standard:** ISA‑95 Part 1–5 / B2MML V0700
**Purpose:** Manufacturing Operations Management — Modular Laravel Package Structure
**Generated:** 2026-11-04
**Table Prefix:** `isa95_`
**Total Models:** 39

---

## Overview — Package Strategy
Each package is standalone, follows PSR‑4, and declares dependencies explicitly. Shared base types live in `isa95-foundation` to avoid duplication and circular references.

| Package Name | Purpose | Model Count | Key Dependencies |
|---|---|---:|---|
| `isa95-foundation` | Shared base: Location, UOM, enums, traits | 5 | — |
| `isa95-personnel` | Personnel classes, people, skills, capabilities | 4 | `isa95-foundation` |
| `isa95-equipment` | Equipment classes, assets, capabilities, properties | 4 | `isa95-foundation` |
| `isa95-material` | Materials, lots, sublots, definitions, BOM | 6 | `isa95-foundation` |
| `isa95-assets` | Physical asset management (ISA‑95 Part 4) | 3 | `isa95-foundation` |
| `isa95-process` | Process segments, capabilities, routing | 2 | `isa95-foundation` |
| `isa95-product` | Product definitions, recipes, BOM structures | 4 | `isa95-foundation`, `isa95-material`, `isa95-process` |
| `isa95-scheduling` | Schedules, requests, segment requirements | 4 | `isa95-foundation`, `isa95-product` |
| `isa95-performance` | Execution, results, responses, KPIs | 3 | `isa95-foundation`, `isa95-scheduling` |
| `isa95-operations` | Unified MOM: Production/Maintenance/Quality/Inventory | 4 | All above |
| **TOTAL** | | **39** | — |

---

## Full Model List by Package

---

## 📦 1. isa95-foundation
**Shared foundation — no business logic, only base structures**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationalLocation` | `isa95_operational_locations` | Site → Area → Line → Work Cell → Unit hierarchy |
| 2 | `UnitOfMeasure` | `isa95_unit_of_measures` | Standardized units (kg, pc, min, m, L, etc.) |
| 3 | `CodeList` | `isa95_code_lists` | Reference values: statuses, types, categories |
| 4 | `Identifier` | `isa95_identifiers` | Cross‑system keys: ERP ID, MES ID, external refs |
| 5 | `WorkShift` | `isa95_work_shifts` | Shift definitions, times, assigned locations |

---

## 📦 2. isa95-personnel
**Human resources & qualification management**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `PersonnelClass` | `isa95_personnel_classes` | Job role/type templates, function groups |
| 2 | `Person` | `isa95_people` | Individual operator/staff: name, ID, status, location |
| 3 | `PersonnelSkill` | `isa95_personnel_skills` | Certifications, proficiency levels, validity dates |
| 4 | `PersonnelCapability` | `isa95_personnel_capabilities` | Tasks/roles an individual is authorized to perform |

---

## 📦 3. isa95-equipment
**Machinery, tools, and production resources**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `EquipmentClass` | `isa95_equipment_classes` | Machine type templates: specs, manufacturer, model |
| 2 | `Equipment` | `isa95_equipment` | Physical asset: line, workstation, machine — status, location, serial |
| 3 | `EquipmentCapability` | `isa95_equipment_capabilities` | Capacity, speed, compatible materials, efficiency |
| 4 | `EquipmentProperty` | `isa95_equipment_properties` | Dynamic attributes: calibration, readings, parameters |

---

## 📦 4. isa95-material
**Materials, lots, inventory, and traceability**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `MaterialClass` | `isa95_material_classes` | Categories: Raw, Intermediate, Finished, Packaging, Waste |
| 2 | `MaterialDefinition` | `isa95_materials` | SKU/product master: specs, version, UOM, control flags |
| 3 | `MaterialLot` | `isa95_material_lots` | Batch/lot tracking: qty, status, dates, location |
| 4 | `MaterialSublot` | `isa95_material_sublots` | Granular subdivisions of a parent lot |
| 5 | `MaterialCapability` | `isa95_material_capabilities` | Yield, quality specs, handling/storage requirements |
| 6 | `MaterialFlow` | `isa95_material_flows` | Consumption/production transactions linked to jobs |

---

## 📦 5. isa95-assets
**Long‑lived physical assets — ISA‑95 Part 4**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `PhysicalAssetClass` | `isa95_physical_asset_classes` | Asset type templates: Facility, System, Component, Tooling |
| 2 | `PhysicalAsset` | `isa95_physical_assets` | Buildings, infrastructure, tooling — lifecycle tracking |
| 3 | `PhysicalAssetCapability` | `isa95_physical_asset_capabilities` | Availability, reliability, throughput performance |

---

## 📦 6. isa95-process
**Standard processes & routing definitions**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProcessSegment` | `isa95_process_segments` | Standard step/phase: Setup → Processing → Cleaning → Inspection |
| 2 | `ProcessSegmentCapability` | `isa95_process_segment_capabilities` | Resource requirements per segment: equipment/skill/material needs |

---

## 📦 7. isa95-product
**Recipes, BOMs, and product specifications**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProductDefinition` | `isa95_product_definitions` | Master recipe header: version, status, effective dates |
| 2 | `ProductSegment` | `isa95_product_segments` | Step‑by‑step routing: sequence, timing, transition logic |
| 3 | `BillOfMaterial` | `isa95_product_definition_boms` | Input/output quantities per step: scrap factors, consumption type |
| 4 | `ProductInformation` | `isa95_product_information` | Specs, quality params, docs, packaging instructions |

---

## 📦 8. isa95-scheduling
**Planning, orders, and resource allocation**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProductionSchedule` | `isa95_production_schedules` | MPS/planning horizon: time range, status, priority |
| 2 | `ProductionRequest` | `isa95_production_requests` | Work order: product, qty, dates, source system ref |
| 3 | `SegmentRequirement` | `isa95_segment_requirements` | Step‑level scheduling: assigned equipment, operators, timing |
| 4 | `ScheduleInformation` | `isa95_schedule_information` | Constraints, availability notes, manual adjustments |

---

## 📦 9. isa95-performance
**Execution results, feedback, and KPIs**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `ProductionPerformance` | `isa95_production_performances` | Actual job record: start/end, qty, scrap, resources used |
| 2 | `ProductionResponse` | `isa95_production_responses` | MES → ERP acknowledgment: accept/reject, payload snapshot |
| 3 | `PerformanceInformation` | `isa95_performance_information` | Readings, events, alarms, annotations logged during execution |

---

## 📦 10. isa95-operations
**Unified MOM — Production / Maintenance / Quality / Inventory**

| # | Model Name | Database Table | Role / Description |
|---|---|---|---|
| 1 | `OperationsCapability` | `isa95_operations_capabilities` | Cross‑domain capacity: Maint/Quality/Inventory resource availability |
| 2 | `OperationsDefinition` | `isa95_operations_definitions` | Non‑production templates: maintenance plans, inspection forms |
| 3 | `OperationsSchedule` | `isa95_operations_schedules` | Work orders for maintenance, quality checks, inventory moves |
| 4 | `OperationsPerformance` | `isa95_operations_performances` | Execution results across all MOM domains |

---

## Dependency Graph
isa95-foundation
├─ isa95-personnel
├─ isa95-equipment
├─ isa95-material
├─ isa95-assets
├─ isa95-process
│     └─ isa95-product ──┐
│                        ├─ isa95-scheduling
│                        │     └─ isa95-performance
│                        └─ isa95-operations ← aggregates all packages

---

## Implementation Notes
- **Installation:** Each package is installable via `composer require vendor/isa95-xxx`
- **Cross‑Package Relationships:** Use `::class` references — e.g., `BelongsTo(ProductDefinition::class)` from `isa95-product`
- **Shared Enums/Traits:** Place in `isa95-foundation` under `Enums/` and `Traits/` directories
- **B2MML JSON:** Transformers/serializers belong in `isa95-performance` and `isa95-operations`
- **Admin UI:** Build Filament/management interfaces as a separate package consuming all others
- **Table Naming:** All prefixed with `isa95_` to isolate from app‑specific tables
- **Primary Key:** Use `uuid` for all models to support distributed systems and B2MML IDs
