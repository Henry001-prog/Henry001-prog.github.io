import socket
import select
import string
import sys
from Crypto.Cipher import AES
import base64

def encrypt(raw):
	cipher = AES.new( 'my_merchant_key_', AES.MODE_CFB, 'This is an IV456' )
	return ( cipher.encrypt( raw ) )
def decrypt(enc):
	cipher = AES.new('my_merchant_key_', AES.MODE_CFB, 'This is an IV456')
	return (cipher.decrypt(enc))
def prompt() :
	sys.stdout.write('<You> \n')
	sys.stdout.flush()

if __name__ == '__main__':

	if(len(sys.argv) < 3) :
		print('Usage : python client.py hostname port')
		#sys.exit()

	host = sys.argv[1]
	port = int(sys.argv[2])

	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.settimeout(2)

	# connect to the server
	try:
		s.connect((host, port))
	except :
		print('Connection failed')
		sys.exit()

	print('Connected established. Start sending messages')
	prompt()

	while True:
		socket_list = [sys.stdin, s]

		# Get the list sockets
		read_sockets, write_sockets, error_sockets = select.select(socket_list , [], [])

		for sock in read_sockets:
			#Read messages coming from server
			if sock == s:
				data = sock.recv(10000)
				if not data :
					print('\nDisconnected from chat server')
					sys.exit()
				else :
					#print data
					data1 = str(data[24:])
			#decrypt the message using the key & iv write it to terminal
				decoded_chat=decrypt(data1)
				sys.stdout.write(decoded_chat)
				prompt()

			#Enter your message
			else:
				msg = sys.stdin.readline()
			#Encrypt the message before sending
				encrypted_chat=encrypt(msg)

				s.send(encrypted_chat)
				prompt()