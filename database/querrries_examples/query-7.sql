SELECT SUM(p.price * op.quantity) AS total
FROM order_product op
INNER JOIN products p ON op.product_id = p.id
INNER JOIN orders o ON op.order_id = o.id
WHERE DATE(o.date) = '2025.05.27'