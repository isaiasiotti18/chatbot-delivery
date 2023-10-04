SELECT 
	cp.id_cliente,
    cp.id_pedido,
    c.nome, 
    c.cep, 
    c.endereco, 
    c.telefone, 
    c.email,
    p.qtd_gas,
    p.qtd_agua,
    p.status_pedido,
    p.forma_pagamento,
    p.data_hora
FROM cliente_pedido cp
INNER JOIN cliente c ON c.id = cp.id_cliente
INNER JOIN pedido p ON p.id = cp.id_pedido