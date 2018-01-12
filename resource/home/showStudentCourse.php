


SELECT ac.star, c.topic, date(c.start_time), t.image, t.nickname, t.firstname, t.lastname
FROM assign_course ac INNER JOIN course c ON ac.course_id = c.course_id 
						INNER JOIN teacher t ON c.teacher_id = t.teacher_id;