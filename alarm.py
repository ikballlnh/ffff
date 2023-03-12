from ast import If
import requests
from urllib.parse import urlparse
from requests.structures import CaseInsensitiveDict
from concurrent.futures import ThreadPoolExecutor
import random, string
import os

def tele(isi):
    r = requests.get(
        "https://api.telegram.org/bot5464351915:AAGwk6D3BhlMXyJrCoqRsPGVf-yMzxVZHk4/sendMessage?parse_mode=markdown&chat_id=536653862&text="+isi+"")
    result= r.json()
    print(result)


def save(filename, text):
    more_lines = [text, '']
    with open(filename, 'a', encoding="utf8") as f:
        f.writelines('\n'.join(more_lines))

def getIdUtama(coki):
    headers = CaseInsensitiveDict()
    headers["Host"] = "gs15.pragmaticplaylive.net"
    headers["Accept"] = 'application/json, text/plain, */*'

    r = requests.get(
        "https://gs15.pragmaticplaylive.net/api/ui/statisticHistory?tableId=spacemanyxeabn02&numberOfGames=8&JSESSIONID="+coki+"&ck=1678453708044&game_mode=lobby_desktop", headers=headers)
    result= r.json()
    l1 = result['history'][0]['gameResult']
    l2 = result['history'][1]['gameResult']
    l3 = result['history'][2]['gameResult']
    l4 = result['history'][3]['gameResult']
    l5 = result['history'][4]['gameResult']
    l6 = result['history'][5]['gameResult']
    l7 = result['history'][6]['gameResult']
    l8 = result['history'][7]['gameResult']
    j = 2.0

    if float(l1) < j:
        print("Kondisi 1 penuh -> i=1")
        print(l1)
        if float(l2) <j:
            print("Kondisi 2 penuh -> i=2")
            print(l1)
            print(l2)
            if float(l3) <j:
                print("Kondisi 3 penuh -> i=3")
                print(l1)
                print(l2)
                print(l3)
                if float(l4) <j:
                    print("Kondisi 4 penuh -> i=4")
                    print(l1)
                    print(l2)
                    print(l3)
                    print(l4)
                    tele("SUDAHH PENUH BOSSS 4 = (5)")
                    if float(l5) <j:
                        print("Kondisi 5 penuh -> i=5")
                        print(l1)
                        print(l2)
                        print(l3)
                        print(l4)
                        print(l5)
                        tele("SUDAHH PENUH BOSSS 5 = (10)")
                        if float(l6) <j:
                            print("Kondisi 6 penuh -> i=6")
                            print(l1)
                            print(l2)
                            print(l3)
                            print(l4)
                            print(l5)
                            print(l6)
                            tele("SUDAHH PENUH BOSSS 6 = (20)")
                            if float(l7) <j:
                                print("Kondisi 7 penuh -> i=7")
                                print(l1)
                                print(l2)
                                print(l3)
                                print(l4)
                                print(l5)
                                print(l6)
                                print(l7)
                                tele("SUDAHH PENUH BOSSS 7 = (40)")
                                if float(l8) <j:
                                    print("Kondisi 8 penuh -> i=8")
                                    print(l1)
                                    print(l2)
                                    print(l3)
                                    print(l4)
                                    print(l5)
                                    print(l6)
                                    print(l7)
                                    print(l8)
                                    tele("SUDAHH PENUH BOSSS 8 = (80)")
                                else:
                                    print("Kondisi 8 blom")
                                    print(l1)
                                    print(l2)
                                    print(l3)
                                    print(l4)
                                    print(l5)
                                    print(l6)
                                    print(l7)
                                    print(l8) 
                            else:
                                print("Kondisi 7 blom")
                                print(l1)
                                print(l2)
                                print(l3)
                                print(l4)
                                print(l5)
                                print(l6)
                                print(l7) 
                        else:
                            print("Kondisi 6 blom")
                            print(l1)
                            print(l2)
                            print(l3)
                            print(l4)
                            print(l5)
                            print(l6) 
                    else:
                        print("Kondisi 5 blom")
                        print(l1)
                        print(l2)
                        print(l3)
                        print(l4)
                        print(l5) 
                else:
                    print("Kondisi 4 blom")
                    print(l1)
                    print(l2)
                    print(l3)
                    print(l4) 
            else:
                print("Kondisi 3 blom")
                print(l1)
                print(l2)
                print(l3)   
        else:
            print("Kondisi 2 blom")
            print(l1)
            print(l2)
    else:
        print("Kondisi 1 blom")
        print(l1)

value = True
while (value):
    try:
        getIdUtama("tKXU_pZja341d6IgmZ1K2pvKcUfDuTzZph9-rm5X6o-9EnwVbtuf!424957020")
    except:
        print("ERORRR NYETT")
