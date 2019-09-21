#Servidor TCP
import socket
from rsa import RSA
HOST = '' # Endereo IP do Servidor
PORT = 8741 # Porta que o Servidor vai escutar
tcp = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
orig = (HOST, PORT)
rsa = RSA()
rsa.gerar_chaves()
header_l = 10
chave_privada = rsa.chave_privada

tcp.bind(orig)
tcp.listen(1)
#msg = tcp.recv(header_l)
while True:
    con, cliente = tcp.accept()
    print ('Conectado por', cliente)
    while True:
        msg = con.recv(header_l).decode('utf-8')
        #tcp.recv(rsa.desencriptar(msg, chave_privada).decode("utf-8"))
        if not msg: break
        mensagem_desencriptada = con.recv(rsa.desencriptar(chave_privada).decode("utf-8"))
        print(mensagem_desencriptada)
    print ('Finalizando conexao do cliente', cliente)
    con.close()