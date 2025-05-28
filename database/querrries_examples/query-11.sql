SELECT c.first_name, c.last_name, SUM(p.price * op.quantity) AS total
FROM orders o
RIGHT JOIN customers c ON o.customer_id = c.id
LEFT JOIN order_product op ON op.order_id = o.id
LEFT JOIN products p ON op.product_id = p.id
GROUP BY c.first_name, c.last_name