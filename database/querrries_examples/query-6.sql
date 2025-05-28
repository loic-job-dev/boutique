SELECT number, SUM(p.price * op.quantity)
FROM order_product op
INNER JOIN products p ON op.product_id = p.id
INNER JOIN orders o ON op.order_id = o.id
GROUP BY o.number;