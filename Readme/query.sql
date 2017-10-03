SELECT tl.lat, tl.lon, t.type_id, t.mark_id, avg(TIMESTAMPDIFF(SECOND, tl.created_at, tl.finished_at)), count(tl.transport_id) FROM `transport_locations` tl
LEFT JOIN transports t ON tl.transport_id = t.id
GROUP BY tl.lat, tl.lon, t.type_id, t.mark_id