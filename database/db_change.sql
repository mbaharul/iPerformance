-- [1] Baha 2/7/2019
-- DELETE row from company KPI
delete from company_level_kpi where year = 2017 and entity <> 'TIME';
-- END

-- [2] Baha 2/7/2019
-- Add new column for company_level_kpi
ALTER TABLE `ijn`.`company_level_kpi` ADD COLUMN `goal_type` INTEGER(4) UNSIGNED AFTER `entity`;
-- Add the data
update company_level_kpi set goal_type = 1 where company_level_kpi_id = 113;
update company_level_kpi set goal_type = 2 where company_level_kpi_id = 114;
update company_level_kpi set goal_type = 3 where company_level_kpi_id = 115;
update company_level_kpi set goal_type = 4 where company_level_kpi_id = 116;
-- END

-- [3] Baha 30/7/2019
-- Module Superior assessment
-- Modify table superior assessment

truncate superior_assessment;

ALTER TABLE `superior_assessment` MODIFY COLUMN `rating` VARCHAR(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
 MODIFY COLUMN `total_score` DOUBLE,
 MODIFY COLUMN `superior_assessment_mst_id` INTEGER NOT NULL DEFAULT 0;

ALTER TABLE `superior_assessment` MODIFY COLUMN `appraiser_id` INTEGER UNSIGNED,
 MODIFY COLUMN `employee_id` INTEGER UNSIGNED;
-- END