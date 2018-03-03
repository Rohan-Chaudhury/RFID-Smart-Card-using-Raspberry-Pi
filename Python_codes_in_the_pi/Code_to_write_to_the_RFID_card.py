#!/usr/bin/env python

import RPi.GPIO as GPIO
import SimpleMFRC522
import urllib
import json
from collections import namedtuple
reader = SimpleMFRC522.SimpleMFRC522()
q=1

while(q):
	try:
		reg = raw_input('Enter Registration Number:')
        	my='http://192.168.1.101/fetchid.php?reg=%s'%reg
		response=urllib.urlopen(my)
		data=response.read()
                obj=json.loads(data,object_hook=lambda d: namedtuple('X',d.keys())(*d.values()))
                text=obj.uid
		print("Now place your tag to write")
        	reader.write(str(text))
        	print("Written")
		q=input('press 0 to exit or any other number to continue:')
	finally:
        	GPIO.cleanup()
