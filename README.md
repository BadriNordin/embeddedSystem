## HOW TO RUN THE PROJECT

This README file will teach you how to setup the project locally and connect your SMT32 NUCLEOF411RE board via ESP8266

1. Install Laragon: https://laragon.org/download/index.html
2. Download this project as a ZIP file
3. Open Laragon and click "Root"
4. Copy the extracted "finalProject" folder into the root folder
5. Click "Start" on Laragon
6. Click "Terminal" to start the cmder terminal
7. Install composer
 ```bash
composer install
```
8. Migrate the database
```bash
php artisan migrate
```
9. Get the IP address of your PC
```bash
ipconfig
```
10. Look for your IPV4 address
11. Run the project and make your PC as the server, devices connected to the same network will be able to access the web and mobile application
```bash
php artisan serve --host=<YOUR IP ADDRESS>
```
12. Follow the link shown by the output to access the website, it should look somthing like this
```bash
 INFO  Server running on [http://<YOUR IP ADDRESS>:8000].
```
13. Now your project is ready to be connected with your MBED project
14. The MBED project main file can be found here: https://github.com/BadriNordin/embeddedSystem/blob/main/mainProject.cpp
