/* 19:40:25 carcada carcada */ ALTER TABLE `ride` ADD `pet` BOOL  NOT NULL  DEFAULT '0'   AFTER `description`;
/* 19:40:35 carcada carcada */ ALTER TABLE `ride` ADD `twoseats` BOOL  NULL  DEFAULT '0'   AFTER `pet`;
/* 19:40:46 carcada carcada */ ALTER TABLE `ride` ADD `woman` BOOL  NULL  DEFAULT '0'   AFTER `twoseats`;
/* 19:40:58 carcada carcada */ ALTER TABLE `ride` ADD `smoker` BOOL  NULL  DEFAULT '0'   AFTER `woman`;
/* 19:41:15 carcada carcada */ ALTER TABLE `ride` ADD `baggageSize` VARCHAR(255)  NULL  DEFAULT ''  AFTER `smoker`;
/* 19:41:24 carcada carcada */ ALTER TABLE `ride` ADD `detour` VARCHAR(255)  NULL  DEFAULT ''  AFTER `baggageSize`;