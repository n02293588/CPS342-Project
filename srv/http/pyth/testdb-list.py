#!/usr/bin/python
from time import sleep
import RPi.GPIO as GPIO
import MySQLdb
import time
GPIO.setmode(GPIO.BOARD)

db = MySQLdb.connect(host="localhost", # your host, usually localhost
			user="root", # your username
			passwd="n02293588", # your password
			db="sensordb") # name of the data base

# you must create a Cursor object. It will let
#  you execute all the query you need
cur = db.cursor()

from time import sleep
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)

GPIO.setup(12, GPIO.IN)
x = 0
db_count = 0

sens = 'm'
senslist = []
biglist = []

with db:
	cur.execute("DELETE FROM sensordat2")

while 1:

	if (GPIO.input(12) and x == 1):
		print('Input went HIGH')

		localtime = time.asctime( time.localtime(time.time()) )
		senslist = [localtime, sens]
		biglist.append(senslist)
		
		x = 0
		db_count = db_count + 1

	elif (not GPIO.input(12) and  x == 0):
		print('Input went LOW')
		x = 1

	if (db_count == 1):
		print(biglist)

		cur.executemany('INSERT INTO sensordat2 VALUES (%s, %s)', biglist)

		cur.execute("SELECT * FROM sensordat2")
		for reading in cur.fetchall():
			print str(reading[0])+"	"+str(reading[1])
		db.commit()

#		print("Database reached 5 entries, DB will be cleared")

		db_count = 0
		biglist = []

#		sleep(1);
db.close()

