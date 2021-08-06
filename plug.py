import psutil
import time
import pymysql
import mysql.connector

cnx = mysql.connector.connect(user="turtogroup", password="test123",
                              host="107.180.50.169", port=3306,
                              database="turto")

myCursor = cnx.cursor()

while True:
    battery = psutil.sensors_battery()
    percent = str(battery.percent)
    plugged = battery.power_plugged
    plugged = "Plugged in" if plugged else "Not plugged in"
    print(percent + "% " + plugged)
    myCursor.execute("INSERT INTO battery(percentage,plugged) VALUES(" + percent + ",'" + plugged + "');")
    cnx.commit()
    time.sleep(3)