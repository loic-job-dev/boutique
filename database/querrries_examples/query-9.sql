SELECT o.number, SUM(p.price * op.quantity) AS total
FROM order_product op
INNER JOIN products p ON op.product_id = p.id
INNER JOIN orders o ON op.order_id = o.id
INNER JOIN customers c ON o.customer_id = c.id
WHERE c.first_name = 'Charlize'
GROUP BY o.number