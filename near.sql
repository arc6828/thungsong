SELECT 
id, 
(
   3959 *
   acos(cos(radians(37)) * 
   cos(radians(latitude)) * 
   cos(radians(longitude) - 
   radians(-122)) + 
   sin(radians(37)) * 
   sin(radians(latitude )))
) AS distance 
FROM stations 
ORDER BY distance LIMIT 1;