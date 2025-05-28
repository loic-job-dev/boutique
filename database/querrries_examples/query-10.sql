SELECT c.first_name, c.last_name, COUNT(customer_id)
FROM orders o
RIGHT JOIN customers c ON o.customer_id = c.id
GROUP BY c.first_name, c.last_name