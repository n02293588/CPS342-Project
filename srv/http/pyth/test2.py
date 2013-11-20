from time import sleep
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)

GPIO.setup(12, GPIO.IN)
x = 0
while 1:

	if (GPIO.input(12) and x == 1):
		print('Input went HIGH')
		x = 0
	elif (not GPIO.input(12) and  x == 0):
		print('Input went LOW')
		x = 1
#	sleep(1);
