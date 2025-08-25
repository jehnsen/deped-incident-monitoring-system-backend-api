-- See what's already there
SELECT id, code, name FROM regions WHERE code IN ('IV-B','MIMAROPA');

-- If nothing returns, create it (adjust columns if your regions schema differs)
INSERT INTO regions (code, name, created_at, updated_at)
VALUES ('IV-B', 'MIMAROPA', NOW(), NOW());


INSERT INTO divisions (region_id, code, name, created_at, updated_at)
VALUES
(4, 'MRQ', 'Division of Marinduque', NOW(), NOW()),
(4, 'OMD', 'Division of Occidental Mindoro', NOW(), NOW()),
(4, 'OMR', 'Division of Oriental Mindoro', NOW(), NOW()),
(4, 'PLW', 'Division of Palawan', NOW(), NOW()),
(4, 'PPC', 'Division of Puerto Princesa City', NOW(), NOW()),
(4, 'RBL', 'Division of Romblon', NOW(), NOW());


INSERT INTO schools
(division_id, school_id_code, name, address, contact_email, contact_phone, enrollment, latitude, longitude, risk_status)
VALUES
-- MARINDUQUE (Div 401)
(401,'MRQ-0001','Boac Central School','Boac, Marinduque','boac.central@deped.gov.ph','+63-42-332-1101',1650,13.4461,121.8398,'none'),
(401,'MRQ-0002','Santa Cruz National High School','Santa Cruz, Marinduque','scnhs@deped.gov.ph','+63-42-321-7788',2100,13.4720,122.0287,'typhoon'),
(401,'MRQ-0003','Gasan West Elementary School','Gasan, Marinduque','gasan.wes@deped.gov.ph','+63-42-325-6003',720,13.3233,121.8443,'none'),
(401,'MRQ-0004','Buenavista National High School','Buenavista, Marinduque','bnhs@deped.gov.ph','+63-42-333-2212',950,13.2630,121.9830,'typhoon'),

-- OCCIDENTAL MINDORO (Div 402)
(402,'OMD-0101','Mamburao Central School','Mamburao, Occidental Mindoro','mamburao.cs@deped.gov.ph','+63-43-711-2001',1300,13.2236,120.5967,'none'),
(402,'OMD-0102','San Jose National High School','San Jose, Occidental Mindoro','sjnshs@deped.gov.ph','+63-43-491-7777',3800,12.3520,121.0673,'typhoon'),
(402,'OMD-0103','Sablayan National Comprehensive High School','Sablayan, Occidental Mindoro','snchs@deped.gov.ph','+63-43-458-9900',2900,12.8347,120.7693,'flood'),
(402,'OMD-0104','Calintaan National High School','Calintaan, Occidental Mindoro','calintaan.nhs@deped.gov.ph','+63-43-456-8801',1100,12.5683,120.9119,'multi'),

-- ORIENTAL MINDORO (Div 403)
(403,'OMR-0201','Calapan City Science High School','Calapan City, Oriental Mindoro','calapansci@deped.gov.ph','+63-43-288-5566',1600,13.4106,121.1803,'none'),
(403,'OMR-0202','Naujan Academy','Naujan, Oriental Mindoro','naujan.acad@deped.gov.ph','+63-43-279-1122',1200,13.3231,121.3059,'flood'),
(403,'OMR-0203','Victoria National High School','Victoria, Oriental Mindoro','victoria.nhs@deped.gov.ph','+63-43-286-7000',2100,13.1830,121.2051,'flood'),
(403,'OMR-0204','Pinamalayan National High School','Pinamalayan, Oriental Mindoro','pinamalayan.nhs@deped.gov.ph','+63-43-283-4456',3400,13.0366,121.4880,'typhoon'),
(403,'OMR-0205','Bongabong Central School','Bongabong, Oriental Mindoro','bongabong.cs@deped.gov.ph','+63-43-289-9011',980,12.7152,121.3664,'multi'),
(403,'OMR-0206','Roxas National Comprehensive High School (Mindoro)','Roxas, Oriental Mindoro','roxas.mindoro@deped.gov.ph','+63-43-290-3311',2500,12.5852,121.5205,'multi'),

-- PALAWAN / PUERTO PRINCESA (Div 404)
(404,'PLW-0301','Puerto Princesa City National High School','Puerto Princesa City, Palawan','ppcnhs@deped.gov.ph','+63-48-433-8811',7000,9.7619,118.7441,'none'),
(404,'PLW-0302','Roxas National High School (Palawan)','Roxas, Palawan','roxas.palawan@deped.gov.ph','+63-48-723-1122',1800,10.3334,119.3456,'typhoon'),
(404,'PLW-0303','Taytay National High School','Taytay, Palawan','taytay.nhs@deped.gov.ph','+63-48-251-7700',2200,10.8200,119.5084,'typhoon'),
(404,'PLW-0304','Coron School of Fisheries','Coron, Palawan','coron.sof@deped.gov.ph','+63-48-723-6600',900,12.0009,120.2060,'typhoon'),
(404,'PLW-0305','El Nido National High School','El Nido, Palawan','elnido.nhs@deped.gov.ph','+63-48-723-8899',1500,11.1964,119.4070,'typhoon'),
(404,'PLW-0306','Brooke’s Point National High School','Brooke’s Point, Palawan','brookespoint.nhs@deped.gov.ph','+63-48-741-5501',2400,8.7788,117.8349,'multi'),

-- ROMBLON (Div 405)
(405,'RBL-0401','Odiongan National High School','Odiongan, Romblon','odiongan.nhs@deped.gov.ph','+63-42-567-7701',2600,12.4017,122.0019,'flood'),
(405,'RBL-0402','Romblon National High School','Romblon, Romblon','romblon.nhs@deped.gov.ph','+63-42-507-8890',1900,12.5753,122.2709,'typhoon'),
(405,'RBL-0403','San Fernando National High School (Sibuyan)','San Fernando, Romblon','sanfernando.sibuyan@deped.gov.ph','+63-42-555-9001',1200,12.4100,122.6713,'multi'),
(405,'RBL-0404','Cajidiocan National High School','Cajidiocan, Romblon','cajidiocan.nhs@deped.gov.ph','+63-42-556-7788',1050,12.3667,122.6500,'multi');


INSERT INTO departments (name, description, created_at, updated_at)
VALUES
('Administration', 'Handles overall administrative support for the division/region.', NOW(), NOW()),
('Finance', 'Manages financial transactions, budgets, and disbursements.', NOW(), NOW()),
('Human Resources', 'Oversees personnel, staffing, and employee concerns.', NOW(), NOW()),
('Curriculum and Instruction', 'Focuses on curriculum development and instruction support.', NOW(), NOW()),
('Disaster Risk Reduction and Management (DRRM)', 'Responsible for disaster preparedness, response, and monitoring.', NOW(), NOW()),
('Health and Nutrition', 'Handles school health, feeding, and nutrition programs.', NOW(), NOW()),
('ICT / Information Technology', 'Provides IT systems management, infrastructure, and support.', NOW(), NOW()),
('Planning and Research', 'Conducts planning, research, and data analysis for decision making.', NOW(), NOW()),
('Legal Services', 'Provides legal assistance, compliance, and policy support.', NOW(), NOW()),
('Supply and Procurement', 'Manages procurement, supplies, and logistics.', NOW(), NOW());

CREATE TABLE `incident_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `incident_types_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `incident_types` (code, name, description, created_at, updated_at)
VALUES
('TYPHOON', 'Typhoon', 'Typhoon-related incidents such as strong winds, damage, or storm surge.', NOW(), NOW()),
('FLOOD', 'Flooding', 'Flood incidents inside or around school premises.', NOW(), NOW()),
('EARTHQUAKE', 'Earthquake', 'Earthquake tremors, structural damage, or related hazards.', NOW(), NOW()),
('LANDSLIDE', 'Landslide', 'Soil/rockfall affecting school grounds or access routes.', NOW(), NOW()),
('FIRE', 'Fire', 'Fire-related incidents in classrooms, canteens, or facilities.', NOW(), NOW()),
('POWER_OUT', 'Power Outage', 'Unscheduled or extended power interruption incidents.', NOW(), NOW()),
('DENGUE', 'Dengue Cluster', 'Reported dengue cases or clusters among students/staff.', NOW(), NOW()),
('VOLCANIC', 'Volcanic Activity', 'Ash fall or eruption effects (if affecting nearby provinces).', NOW(), NOW()),
('OTHER', 'Other', 'Other incidents not covered by main categories.', NOW(), NOW());

CREATE TABLE IF NOT EXISTS incidents (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  ref_no VARCHAR(32) NOT NULL UNIQUE,
  type_id BIGINT UNSIGNED NOT NULL,
  school_id BIGINT UNSIGNED DEFAULT NULL,
  reported_by_user_id BIGINT UNSIGNED DEFAULT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  status ENUM('open','in_progress','resolved','closed','dismissed') NOT NULL DEFAULT 'open',
  severity ENUM('low','medium','high','critical') NOT NULL DEFAULT 'medium',
  occurred_at DATETIME NOT NULL,
  reported_at DATETIME NOT NULL,
  latitude DECIMAL(9,6) DEFAULT NULL,
  longitude DECIMAL(9,6) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY idx_incidents_school_id (school_id),
  KEY idx_incidents_type_id (type_id),
  KEY idx_incidents_status (status),
  KEY idx_incidents_occurred_at (occurred_at),
  CONSTRAINT fk_incidents_type FOREIGN KEY (type_id) REFERENCES incident_types (id) ON DELETE RESTRICT,
  CONSTRAINT fk_incidents_school FOREIGN KEY (school_id) REFERENCES schools (id) ON DELETE SET NULL,
  CONSTRAINT fk_incidents_reporter FOREIGN KEY (reported_by_user_id) REFERENCES users (id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO incidents
(ref_no, type_id, school_id, reported_by_user_id, title, description, status, severity, occurred_at, reported_at, latitude, longitude, created_at, updated_at)
VALUES
-- 1 Marinduque (Boac)
('INC-2025-0001',
 (SELECT id FROM incident_types WHERE code='TYPHOON'),
 (SELECT id FROM schools WHERE school_id_code='MRQ-0001'),
 NULL,
 'Strong winds from Typhoon Carina',
 'Classrooms reported minor roof damage after overnight strong winds.',
 'in_progress','high','2025-07-16 02:10:00','2025-07-16 07:45:00',13.446100,121.839800,NOW(),NOW()),

-- 2 Marinduque (Santa Cruz)
('INC-2025-0002',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='MRQ-0002'),
 NULL,
 'Flooding at school grounds',
 'Half of the quadrangle submerged; temporary suspension of morning classes.',
 'resolved','medium','2025-06-21 05:30:00','2025-06-21 06:10:00',13.472000,122.028700,NOW(),NOW()),

-- 3 Marinduque (Gasan)
('INC-2025-0003',
 (SELECT id FROM incident_types WHERE code='POWER_OUT'),
 (SELECT id FROM schools WHERE school_id_code='MRQ-0003'),
 NULL,
 'Power outage during exams',
 'Power disruption affected Grade 6 exam schedule; rescheduled to afternoon.',
 'closed','low','2025-03-12 09:05:00','2025-03-12 09:20:00',13.323300,121.844300,NOW(),NOW()),

-- 4 Marinduque (Buenavista)
('INC-2025-0004',
 (SELECT id FROM incident_types WHERE code='LANDSLIDE'),
 (SELECT id FROM schools WHERE school_id_code='MRQ-0004'),
 NULL,
 'Minor landslide near access road',
 'Debris partially blocked the access road; LGU cleared within 3 hours.',
 'resolved','medium','2025-01-28 06:30:00','2025-01-28 07:15:00',13.263000,121.983000,NOW(),NOW()),

-- 5 Occidental Mindoro (Mamburao)
('INC-2025-0005',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='OMD-0101'),
 NULL,
 'Localized flooding after heavy rains',
 'Water entered two classrooms; learning materials moved to higher shelves.',
 'in_progress','medium','2025-08-10 04:20:00','2025-08-10 05:05:00',13.223600,120.596700,NOW(),NOW()),

-- 6 Occidental Mindoro (San Jose)
('INC-2025-0006',
 (SELECT id FROM incident_types WHERE code='FIRE'),
 (SELECT id FROM schools WHERE school_id_code='OMD-0102'),
 NULL,
 'Electrical fire in storage room',
 'Small fire due to faulty extension cord; extinguished by staff, no injuries.',
 'closed','high','2025-05-04 14:40:00','2025-05-04 15:00:00',12.352000,121.067300,NOW(),NOW()),

-- 7 Occidental Mindoro (Sablayan)
('INC-2025-0007',
 (SELECT id FROM incident_types WHERE code='DENGUE'),
 (SELECT id FROM schools WHERE school_id_code='OMD-0103'),
 NULL,
 'Dengue cluster monitoring',
 'Four suspected dengue cases in Grade 9; campus cleanup and DOH coordination.',
 'in_progress','medium','2025-07-02 08:00:00','2025-07-02 09:10:00',12.834700,120.769300,NOW(),NOW()),

-- 8 Occidental Mindoro (Calintaan)
('INC-2025-0008',
 (SELECT id FROM incident_types WHERE code='LANDSLIDE'),
 (SELECT id FROM schools WHERE school_id_code='OMD-0104'),
 NULL,
 'Slope failure behind gym',
 'Slope erosion after continuous rains; area cordoned, awaiting DPWH inspection.',
 'open','high','2025-08-18 06:50:00','2025-08-18 07:05:00',12.568300,120.911900,NOW(),NOW()),

-- 9 Oriental Mindoro (Calapan City)
('INC-2025-0009',
 (SELECT id FROM incident_types WHERE code='EARTHQUAKE'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0201'),
 NULL,
 'M4.2 tremor felt during classes',
 'No structural damage noted; drop-cover-hold executed successfully.',
 'closed','low','2025-02-11 10:22:00','2025-02-11 10:40:00',13.410600,121.180300,NOW(),NOW()),

-- 10 Oriental Mindoro (Naujan)
('INC-2025-0010',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0202'),
 NULL,
 'River overflow affects access road',
 'Students rerouted; classes continued with minor delay.',
 'resolved','medium','2025-07-23 05:10:00','2025-07-23 05:45:00',13.323100,121.305900,NOW(),NOW()),

-- 11 Oriental Mindoro (Victoria)
('INC-2025-0011',
 (SELECT id FROM incident_types WHERE code='POWER_OUT'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0203'),
 NULL,
 'Extended power interruption',
 'No electricity for six hours; afternoon classes shifted to modules.',
 'closed','low','2025-06-03 07:30:00','2025-06-03 08:00:00',13.183000,121.205100,NOW(),NOW()),

-- 12 Oriental Mindoro (Pinamalayan)
('INC-2025-0012',
 (SELECT id FROM incident_types WHERE code='TYPHOON'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0204'),
 NULL,
 'Typhoon-induced roof damage',
 'Two classrooms lost roof sheets; request for emergency repair submitted.',
 'in_progress','high','2025-07-16 03:20:00','2025-07-16 07:30:00',13.036600,121.488000,NOW(),NOW()),

-- 13 Oriental Mindoro (Bongabong)
('INC-2025-0013',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0205'),
 NULL,
 'Flash flood in nearby creek',
 'Water rose rapidly; early dismissal implemented for safety.',
 'resolved','medium','2025-08-03 11:35:00','2025-08-03 11:55:00',12.715200,121.366400,NOW(),NOW()),

-- 14 Oriental Mindoro (Roxas)
('INC-2025-0014',
 (SELECT id FROM incident_types WHERE code='LANDSLIDE'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0206'),
 NULL,
 'Road cut along hillside route',
 'School bus trips suspended pending clearing operations.',
 'open','high','2025-08-12 06:15:00','2025-08-12 06:45:00',12.585200,121.520500,NOW(),NOW()),

-- 15 Palawan (Puerto Princesa)
('INC-2025-0015',
 (SELECT id FROM incident_types WHERE code='FIRE'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0301'),
 NULL,
 'Minor canteen fire',
 'Cooking oil flare-up; extinguisher used; canteen closed for inspection.',
 'closed','medium','2025-04-19 12:05:00','2025-04-19 12:20:00',9.761900,118.744100,NOW(),NOW()),

-- 16 Palawan (Roxas)
('INC-2025-0016',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0302'),
 NULL,
 'Low-lying rooms inundated',
 'Two SPED rooms affected; learning materials relocated to safe storage.',
 'resolved','medium','2025-07-30 04:40:00','2025-07-30 05:05:00',10.333400,119.345600,NOW(),NOW()),

-- 17 Palawan (Taytay)
('INC-2025-0017',
 (SELECT id FROM incident_types WHERE code='TYPHOON'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0303'),
 NULL,
 'Damaged windows after typhoon',
 'Multiple jalousie panes shattered; temporary plastic covers installed.',
 'in_progress','high','2025-07-16 01:50:00','2025-07-16 07:35:00',10.820000,119.508400,NOW(),NOW()),

-- 18 Palawan (Coron)
('INC-2025-0018',
 (SELECT id FROM incident_types WHERE code='EARTHQUAKE'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0304'),
 NULL,
 'Light tremor during flag ceremony',
 'No visible damage; structural check requested from LGU.',
 'resolved','low','2025-05-06 07:30:00','2025-05-06 07:55:00',12.000900,120.206000,NOW(),NOW()),

-- 19 Palawan (El Nido)
('INC-2025-0019',
 (SELECT id FROM incident_types WHERE code='DENGUE'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0305'),
 NULL,
 'Increase in dengue-like symptoms',
 'Five students absent with fever; barangay health center notified.',
 'in_progress','medium','2025-06-25 08:10:00','2025-06-25 09:00:00',11.196400,119.407000,NOW(),NOW()),

-- 20 Palawan (Brooke’s Point)
('INC-2025-0020',
 (SELECT id FROM incident_types WHERE code='LANDSLIDE'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0306'),
 NULL,
 'Mudslide near perimeter fence',
 'Safety line set; classrooms far from area remain open.',
 'open','medium','2025-08-14 06:35:00','2025-08-14 06:50:00',8.778800,117.834900,NOW(),NOW()),

-- 21 Romblon (Odiongan)
('INC-2025-0021',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='RBL-0401'),
 NULL,
 'Street flooding affects entry gate',
 'Morning arrival delayed by 30 minutes; no damage inside campus.',
 'resolved','low','2025-06-11 06:00:00','2025-06-11 06:20:00',12.401700,122.001900,NOW(),NOW()),

-- 22 Romblon (Romblon)
('INC-2025-0022',
 (SELECT id FROM incident_types WHERE code='POWER_OUT'),
 (SELECT id FROM schools WHERE school_id_code='RBL-0402'),
 NULL,
 'Island-wide brownout',
 'Whole island experienced scheduled power maintenance; classes adjusted.',
 'closed','low','2025-03-22 08:00:00','2025-03-22 08:10:00',12.575300,122.270900,NOW(),NOW()),

-- 23 Romblon (San Fernando, Sibuyan)
('INC-2025-0023',
 (SELECT id FROM incident_types WHERE code='TYPHOON'),
 (SELECT id FROM schools WHERE school_id_code='RBL-0403'),
 NULL,
 'Typhoon signal #2—preventive suspension',
 'Local DRRMC declared preventive class suspension; campus secured.',
 'closed','medium','2025-07-15 20:00:00','2025-07-15 20:20:00',12.410000,122.671300,NOW(),NOW()),

-- 24 Romblon (Cajidiocan)
('INC-2025-0024',
 (SELECT id FROM incident_types WHERE code='LANDSLIDE'),
 (SELECT id FROM schools WHERE school_id_code='RBL-0404'),
 NULL,
 'Rockfall on mountain road',
 'Alternate route used for school service vans; no injuries.',
 'resolved','medium','2025-08-02 05:40:00','2025-08-02 06:05:00',12.366700,122.650000,NOW(),NOW()),

-- 25 Palawan (Puerto Princesa)
('INC-2025-0025',
 (SELECT id FROM incident_types WHERE code='FIRE'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0301'),
 NULL,
 'Laboratory equipment overheated',
 'Old power strip overheated; breaker tripped; safety briefing scheduled.',
 'closed','medium','2025-02-18 13:10:00','2025-02-18 13:25:00',9.761900,118.744100,NOW(),NOW()),

-- 26 Occidental Mindoro (San Jose)
('INC-2025-0026',
 (SELECT id FROM incident_types WHERE code='EARTHQUAKE'),
 (SELECT id FROM schools WHERE school_id_code='OMD-0102'),
 NULL,
 'Aftershock felt during PE',
 'Students evacuated to open grounds; classes resumed after inspection.',
 'closed','low','2025-04-09 15:05:00','2025-04-09 15:20:00',12.352000,121.067300,NOW(),NOW()),

-- 27 Oriental Mindoro (Pinamalayan)
('INC-2025-0027',
 (SELECT id FROM incident_types WHERE code='FLOOD'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0204'),
 NULL,
 'Drainage overflow after squall line',
 'Water receded in 40 minutes; maintenance cleared debris.',
 'resolved','medium','2025-08-07 16:50:00','2025-08-07 17:10:00',13.036600,121.488000,NOW(),NOW()),

-- 28 Marinduque (Boac)
('INC-2025-0028',
 (SELECT id FROM incident_types WHERE code='DENGUE'),
 (SELECT id FROM schools WHERE school_id_code='MRQ-0001'),
 NULL,
 'Two dengue positives in Grade 5',
 'Advised 4S strategy; intensified campus clean-up and larval survey.',
 'in_progress','medium','2025-05-27 08:30:00','2025-05-27 09:15:00',13.446100,121.839800,NOW(),NOW()),

-- 29 Palawan (Coron)
('INC-2025-0029',
 (SELECT id FROM incident_types WHERE code='POWER_OUT'),
 (SELECT id FROM schools WHERE school_id_code='PLW-0304'),
 NULL,
 'Unscheduled power interruption',
 'Learning continuity ensured via printed modules for afternoon shift.',
 'closed','low','2025-08-09 13:00:00','2025-08-09 13:05:00',12.000900,120.206000,NOW(),NOW()),

-- 30 Oriental Mindoro (Victoria)
('INC-2025-0030',
 (SELECT id FROM incident_types WHERE code='TYPHOON'),
 (SELECT id FROM schools WHERE school_id_code='OMR-0203'),
 NULL,
 'Pre-emptive class suspension',
 'Governor announced suspension; school activated preparedness checklist.',
 'closed','medium','2025-07-15 19:30:00','2025-07-15 19:45:00',13.183000,121.205100,NOW(),NOW());
