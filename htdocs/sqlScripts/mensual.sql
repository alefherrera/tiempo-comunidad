USE tiempo_comunidad;

START TRANSACTION;

UPDATE revistas SET actual = false WHERE actual = true;
UPDATE revistas SET actual = true ORDER BY idrevistas DESC LIMIT 1;

COMMIT;