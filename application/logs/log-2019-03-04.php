<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-04 02:47:00 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 05:56:58 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 07:05:58 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 07:06:03 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:06:03 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:03 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:06:03 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:04 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 12:36:06 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 07:06:31 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 07:06:42 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:06:42 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:06:42 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:43 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:43 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:06:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:06:51 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 12:37:09 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 07:12:11 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 07:12:32 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 07:12:38 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:12:39 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:12:39 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:12:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 12:45:13 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 12:45:15 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 07:17:20 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:17:20 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:17:20 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:17:20 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:17:20 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:17:23 --> 404 Page Not Found: Ssets/global
ERROR - 2019-03-04 07:17:32 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:17:32 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:17:32 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:17:37 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:17:37 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:17:37 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:17:37 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:17:38 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 12:47:48 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 07:17:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 07:45:39 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 07:45:48 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:45:48 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:45:48 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:45:48 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:45:53 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 13:15:57 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 07:45:57 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 07:54:33 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 07:54:33 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 07:54:33 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:54:33 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 07:54:33 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 13:24:37 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 13:28:23 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 13:28:25 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 13:28:26 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 13:28:27 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 13:30:13 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 08:01:10 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 08:01:12 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 08:01:12 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 08:01:12 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 08:01:12 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 08:01:12 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 13:31:14 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 08:01:14 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 11:15:05 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:15:07 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:15:07 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:15:07 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:15:07 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:15:07 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:15:12 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 16:45:13 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 11:15:13 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 11:17:57 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 16:50:27 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 11:20:39 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:21:40 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:22:10 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:24:22 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:24:22 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:24:22 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:24 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:24 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:26:24 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:25 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:25 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:26 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 16:56:43 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 11:26:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 11:26:53 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:26:53 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:53 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:53 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:53 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:55 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:26:55 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:55 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:55 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:55 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:57 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:26:57 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:57 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:57 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:57 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:59 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:26:59 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:26:59 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:26:59 --> 404 Page Not Found: Ssets/global
ERROR - 2019-03-04 11:27:00 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:27:00 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:27:00 --> 404 Page Not Found: Ssets/global
ERROR - 2019-03-04 11:27:02 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:27:02 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:27:02 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:27:02 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:27:02 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:27:03 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:27:03 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:27:03 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:27:03 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 16:57:06 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 11:28:25 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:30:46 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:31:15 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:31:15 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:31:15 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:31:17 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 11:31:20 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:31:20 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:31:20 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:31:20 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:31:20 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:31:21 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 17:01:22 --> Query error: Expression #27 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'rashmxkh_main_db.bl.b_status' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `ood`.*, `ag`.`a_full_name` as `agentname`, `brl`.`b_pk_id`, `bl`.`b_status`
FROM `oneway_offer_detail` `ood`
LEFT JOIN `agent_detail` `ag` ON `ag`.`id` = `ood`.`oo_agent_id`
LEFT JOIN `booking_request_list` `brl` ON `brl`.`b_pk_id` = `ood`.`id`
LEFT JOIN `booking_list` `bl` ON `bl`.`b_pk_id` = `ood`.`id`
WHERE `brl`.`b_status` = 2
AND brl.b_from_date = CURDATE()
GROUP BY `ood`.`id`
ORDER BY `ood`.`oo_valid_date` ASC, `ood`.`oo_valid_from_time` ASC, `ood`.`oo_valid_to_time` ASC
ERROR - 2019-03-04 11:31:22 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-03-04 11:37:33 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:37:33 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:37:33 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:37:33 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:37:33 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:37:41 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:37:41 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:37:41 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:37:41 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:37:41 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:41 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:41 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:48:41 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:42 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:48:42 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:42 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:42 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:43 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:48:43 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:43 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:43 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:43 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:48:46 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:48:47 --> 404 Page Not Found: Oneway_offer_management/favicon.ico
ERROR - 2019-03-04 11:53:25 --> 404 Page Not Found: Assets/global
ERROR - 2019-03-04 11:58:12 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:12 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:12 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:58:12 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:12 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:15 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:58:15 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:15 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:15 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:15 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:17 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:58:17 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:17 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:17 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:17 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:18 --> 404 Page Not Found: Js/jquery.min.js
ERROR - 2019-03-04 11:58:18 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:18 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
ERROR - 2019-03-04 11:58:18 --> 404 Page Not Found: Js/bootstrap.min.js
ERROR - 2019-03-04 11:58:18 --> 404 Page Not Found: Js/bootstrap-timepicker.min.js
