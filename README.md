## Sobre
API construída em Laravel para:
- Cadastrar e listar vendedores.
- Cadastrar e listar vendas.
- Enviar relatório de vendas por email ao final de cada dia. (18:00)

## Endpoints
- Cadastrar vendedor: [POST] /sellers
- Cadastrar venda: [POST] /sales
- Listar vendedores; [GET] /sellers/getAll
- Listar vendas por vendedor: [GET] /sales/{id}

## Envio de e-mail
O envio de email foi configurado através da função de schedule do Laravel utilizando Commands.<br />
O código para envio de e-mail pode ser visto em App/Console
