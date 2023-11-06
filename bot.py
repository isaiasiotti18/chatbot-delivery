import editacodigo_whats
import time
import os

bolinha_notificacao, contato_cliente, caixa_msg, msg_cliente, caixa_de_pesquisa, pega_contato = editacodigo_whats.obter_configuracoes_whatsapp('l2G63MeLBs63HwE0AVgOGVBChVKXunov')

driver = editacodigo_whats.carregar_pagina_whatsapp('whatsapp/sessao', 'https://web.whatsapp.com/')

time.sleep(120)
