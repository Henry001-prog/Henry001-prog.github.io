import socket, select
from Crypto.Cipher import AES


#To broadcast data received from client to all connected clients
def broadcast_data (sock, message):
	#Loop and check that messages are sent only to other clients, except sender
	for socket in CONNECTION_LIST:
		if socket != server_socket and socket != sock :
			try :
				socket.send(message)
			except :
				# Case of exception or manual break remove the socket from list
				socket.close()
				CONNECTION_LIST.remove(socket)

if __name__ == "__main__":

	# Create a list to keep track of socket connections
	CONNECTION_LIST = []
	RECV_BUFFER = 4096
	PORT = 5000
	server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	server_socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
	server_socket.bind(("0.0.0.0", PORT))
	server_socket.listen(10)

	# Add server socket to the list of readable connections
	CONNECTION_LIST.append(server_socket)

	print(f"Chat Socket server started on port " + str(PORT))

	while 1:
		# Get the list sockets
		read_sockets,write_sockets,error_sockets = select.select(CONNECTION_LIST,[],[])

		for sock in read_sockets:
			#New connection
			if sock == server_socket:
				# Handle the case in which there is a new connection recieved through server_socket
				sockfd, addr = server_socket.accept()
				CONNECTION_LIST.append(sockfd)
				print("Client (%s, %s) connected' % addr")

				broadcast_data(sockfd, "[%s:%s] is online\n" % addr)

			#Read incoming message from a client adn broadcast
			else:
				# Data recieved from client, process it
				try:

					data = sock.recv(RECV_BUFFER)
					if data:
						broadcast_data(sock, "\r" + '<' + str(sock.getpeername()) + '> ' + data)

				except:
					broadcast_data(sock, "Client (%s, %s) is offline" % addr)
					print("Client (%s, %s) is offline" % addr)
					sock.close()
					CONNECTION_LIST.remove(sock)
					continue

	server_socket.close()