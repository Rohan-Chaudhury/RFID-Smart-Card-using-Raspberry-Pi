#!/usr/bin/env python

import RPi.GPIO as GPIO
import SimpleMFRC522
import urllib
import time
import json
from collections import namedtuple

reader = SimpleMFRC522.SimpleMFRC522()

print('Place the card over the reader please:')

try:
	while True:
        	id, text = reader.read()
		my='http://192.168.0.101/clgid.php?id=%s'% text
	
		response=urllib.urlopen(my)

		data=response.read()
		obj=json.loads(data,object_hook=lambda d: namedtuple('X',d.keys())(*d.values()))
		print 'NAME:',obj.name
		print 'Department:',obj.Depart
		print 'Registration Number:',obj.reg
		print 'Roll Number:',obj.roll
		print 'Mess Choice:',obj.mess
		print 'Library ID:',obj.lib
		print('\n')
		print('Next Student Please:')
		print('\n')
		time.sleep(1)
except KeyboardInterrupt:
	exit()

finally:
        	GPIO.cleanup()


