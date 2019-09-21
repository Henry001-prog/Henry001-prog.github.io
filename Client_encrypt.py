#Cliente TCP
import socket #importando a biblioteca socket
from rsa import RSA
SERVER = '127.0.0.1' # Endereço IP do Servidor
PORT = 8741 # Porta que o Servidor está escutando
tcp = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
dest = (SERVER, PORT)
rsa = RSA()
rsa.gerar_chaves()
chave_publica = rsa.chave_publica
tcp.connect(dest)
print ('Para sair, você deve pressionar control x')
msg = input()#.encriptar()
#mensagem_encriptada = rsa.encriptar(msg, chave_publica)
while msg != '\x18':
    tcp.send(rsa.encriptar(msg, chave_publica).encode("utf-8"))
    msg = input()
tcp.close()