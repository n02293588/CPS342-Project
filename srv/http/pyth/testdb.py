#!/usr/bin/python
from time import sleep
import RPi.GPIO as GPIO
import MySQLdb
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
while 1:

	if (GPIO.input(12) and x == 1):
		print('Input went HIGH')
		with db:
			cur.execute("INSERT INTO sensordat VALUES (CURRENT_DATE(), NOW(), 'm')")
		cur.execute("SELECT * FROM sensordat")
		for reading in cur.fetchall():
			print str(reading[0])+" "+str(reading[1])+"     "+str(reading[2])
		x = 0
		db_count = db_count + 1

	elif (not GPIO.input(12) and  x == 0):
		print('Input went LOW')
		x = 1

	if (db_count == 5):
		print("Database reached 5 entries, DB will be cleared")
		with db:
			cur.execute("DELETE FROM sensordat")
		db_count = 0
#       sleep(1);
db.close()


#sens = "'m'"
#ttime = "NOW()"
#tdate = "CURRENT_DATE()"
#varlist = [tdate, ttime, sens]
#var_string = ', '.join('?' * len(varlist))
#query_string = 'INSERT INTO sensdat VALUES (%s):' % var_string
#cursor.execute(query_string, varlist)
