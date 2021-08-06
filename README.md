                                        TurtleBot

READ ME
    
    All code developed to create functionality for the turtlebot can be found at: https://github.com/mbuettner1/turtlebot. This github respository contains: 
        - All code used to create website
        - Python script for battery connection
        - C script for DHT11 (humidity/temperature)
        - Python script for camera data transmission via openCV and Flask
    
    The folder containing all data for the website is called SR and the direct link is: https://github.com/mbuettner1/turtlebot/tree/main/SR. The structure of the website is created via the .php files outside of the includes folder. The includes folder includes all of the back-end .php files for creating database connection and user security. For the use of this website, I had it functionally stored on my website server using GoDaddy with a built in local storage phpMyAdmin. 

    The folder containing the camera connection, as well as the object detection overlay is called camera, and the direct link is: https://github.com/mbuettner1/turtlebot/tree/main/camera. In this folder we have the openCV script, camera.py, that is used to activate and pull the camera feed from the USB camera. The main.py script connects the camera.py feed to the index.html page found in the templates folder that is specfically created to host the camera feed onto with the ability to allow object detection. This code was stored on the Jetson Nano's home, and utilized the terminal commands to activate the camera:
                cd camera
                python3 main.py
    Once the proxy server was active, the website could then access the IP address.

    The folder containing the C code for the DHT11 temperature and humidity sensor is called DHT11, and the direct link is: https://github.com/mbuettner1/turtlebot/tree/main/dht11. In this folder we have the C based code created for the Arduino IDE, so that we can run the temperature sensor on the ESP8266 board. This board stays active as long as its connected and automatically starts parsing data once the wifi login is correct in the script, if not, this can be adjusted anywhere utilizing the Arduino IDE.

    Lastly, plug.py is a python script created to read the battery data, and can be found here: https://github.com/mbuettner1/turtlebot/blob/main/plug.py. This script is activated on the Jetson Nano to read the connected battery pack. This script can be activated in the terminal command using:
                python3 plug.py
    The python script connects to my database utilizing mysql.connector() to send the output data to my database which is called into the website.
