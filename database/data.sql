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