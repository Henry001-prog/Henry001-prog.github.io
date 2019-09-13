import nmap
import sys

N = nmap.PortScanner()

#alvo = input("Alvo: ")
#porta = input("Porta: ")

N.scan(sys.argv[1], sys.argv[2])

for host in N.all_hosts():
    print("########################")
    print('[+]Host : %s [%s]' % (host, N[host].hostname()))
    print('[+]State : %s' % N[host].state())
    for proto in N[host].all_protocols():
        print('########################')
        print('[+]Protocolo : %s' % proto)


        lport = N[host][proto].keys()
        lport = list(lport)
        lport.sort()
        for port in lport:
            print('[+]porta : %s\testado : %s' % (port, N[host][proto][port]['state']))

'''

N.command_line()
N.scaninfo()
N.all_hosts()
N[host].hostname()
N[host].state()
N[host].all_protocols()
N[host].[proto].keys()
N[host].has_tcp(port)
N[host].has_tcp(port)
N[host][proto][port]
N[host][proto][port]['state']

'''
