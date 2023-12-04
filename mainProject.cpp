#include "ESP8266.h"
#include "mbed.h"
#include <cstdio>

Serial pc(USBTX, USBRX);
// wifi UART port and baud rate
ESP8266 wifi(PA_9, PA_10, 115200); // Tx,Rx,Baud rate
char snd[255], rcv[1000];
char command[300];
char resp[1000];
int timeout = 8000;        // timeout for wifi commands
DigitalOut led(PC_1);      // LED1 isoutput
InterruptIn irsensor(D10); // BLUE BUTTON onboard is input
DigitalOut buzzer(D7);
char *visitor;

void ConnectToWifi() {
  pc.printf("SET mode to AP\r\n");
  wifi.SetMode(1); // set ESP mode to 1

  wifi.RcvReply(rcv, 1000); // receive a response from ESP
  pc.printf("%s", rcv);     // Print the response on screen

  pc.printf("Connecting to AP\r\n");
  // wifi.Join("disyamirza@unifi", "16585638"); //Your AP's wifi username &
  // Passwo wifi.Join("SATASIA1_A7000R", "Strand01");
  wifi.Join("Bujang2", "budak987");
  wifi.RcvReply(rcv, 1000); // receive a response from ESP
  pc.printf("%s", rcv);     // Print the response on screen

  wait(8); // wait for response from ESP
}

void sendAPI() {
  pc.printf("******** Guest Detected ********\r\n");
  wifi.startTCPConn("192.168.100.18", 8000); // cipstart
  wifi.RcvReply(resp, timeout);
  if (wifi.RcvReply(resp, timeout))
    pc.printf("%s", resp);
  else
    pc.printf("No response while starting TCP connection \r\n");
  wait(1);
  wifi.sendURL("/api/updatedata/?id=&visitor=Guest", command);
  if (wifi.RcvReply(resp, timeout))
    pc.printf("%s", resp);
  else
    pc.printf("No response while sending URL \r\n");
}
int main() {
  pc.baud(115200);
  ConnectToWifi();
  pc.printf("\nConnected to Wifi\n");
  wait(5);

  if (irsensor == 0) { // Object detected
    led = 1;           // Led ON
    buzzer = 1;
    visitor = "Visitor";
    sendAPI();
  } else {
    led = 0;
    buzzer = 0;
  }
  buzzer = 0;
  led = 0;
  while (1) {
  } // While loop

} // end main
